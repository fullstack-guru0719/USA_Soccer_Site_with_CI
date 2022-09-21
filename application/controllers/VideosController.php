<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VideosController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Manage_model');
		$this->load->model('User_model');
		$this->load->model('Videos_model','videos');
		$this->check_login();
	}

	public function check_login()
	{
		if ($this->session->userdata('user_id'))
		{
			$result = $this->User_model->checkLogin($this->session->userdata('user_id'), $this->session->userdata('user_name'));

			if (!$result)
			{
				redirect('/login');
			}
		} else {
			redirect('/login');
		}
	}

	public function index()
	{
		$user_id = $this->session->userdata('user_id');
		$user_name = $this->session->userdata('user_name');
		$data['menu'] = 'videos';
		
		if ($user_id && $user_name)
		{
			$data['user'] = $this->User_model->get_user_by_id($user_id);
			$data['user_id'] = $user_id;
			$data['user_name'] = $user_name;
			
		}else{
			$data['user'] = '';
			$data['user_id'] = '';
			$data['user_name'] = '';
		}

		$this->load->view('backend/header', $data);
		$this->load->view('backend/videos/default');
		$this->load->view('backend/footer');
	}

	public function ajax_get_videos()
	{
		$items		=	$this->videos->getItems();
		$draw 		= 	intval($this->input->post("draw"));
		
		$total_items	=	$this->videos->get_total_records();
		$output = array(
			"draw" 				=> $draw,
			"recordsTotal" 		=> $total_items,
			"recordsFiltered" 	=> $total_items,
			"data" 				=> $items
		);
        echo json_encode($output);
        exit();
	}

	public function add_video($id = null)
	{
		$user_id = $this->session->userdata('user_id');
		$user_name = $this->session->userdata('user_name');
		$data['menu'] = 'videos';
		
		$this->form_validation->set_rules('title','Video Title','required');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
		if($this->form_validation->run() === true)
		{
			$postdata = $this->input->post();

			if($_FILES['video_link']['error'] == 0)
			{
				$postdata['link_type'] = 'internal';
				$postdata['video_link'] = $this->processAttachments($postdata);
			}else{
				$postdata['link_type'] = 'external';
			}

			if($postdata['id']){
				//update the record
				$response = $this->videos->update($postdata);
			}else{
				$postdata['status'] = 'active';
				//insert the record
				$response = $this->videos->insert($postdata);
			}

			if($response)
			{
				$type 	=	[
					"type"	=>	"success",
					"msg"	=>	"Item ".($postdata['id'] ?'saved' :'updated')." successfully.",
				];
			}else{
				$type 	=	[
					"type"	=>	"error",
					"msg"	=>	"Some error occurred, please try again later.",
				];
			}
			redirect(site_url("backend/latest_videos"));
		}else{
			if ($user_id && $user_name)
			{
				$data['user'] = $this->User_model->get_user_by_id($user_id);
				$data['user_id'] = $user_id;
				$data['user_name'] = $user_name;
				
			}else{
				$data['user'] = '';
				$data['user_id'] = '';
				$data['user_name'] = '';
			}

			$data['item'] = $this->videos->get($id);

			$this->load->view('backend/header', $data);
			$this->load->view('backend/videos/form');
			$this->load->view('backend/footer');
		}	
	}

	protected function processAttachments($postdata)
	{
		$filename = '';
		$errors = [];
		$data = [];
		$upload_path = FCPATH .'uploads/videos/';
		if (!is_dir($upload_path)) {
			mkdir($upload_path, 0777, TRUE);
		}

		if(!empty($_FILES['video_link']['name']))
		{
			$config['upload_path']          = $upload_path;
			$config['allowed_types']        = 'mp4';
			$config['encrypt_name']         = true;

			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('video_link'))
			{
				$errors[] = $this->upload->display_errors();
			} else {
				$response = $this->upload->data();
				$filename = $response['file_name'];
			}
		}

		if(count($errors) > 0)
		{
			$this->session->set_flashdata('errors',implode(",",$errors));
		}

		if($postdata['id']){
			// get the object 
			$item = $this->sponsor->get($postdata['id']);
			if($item->id){

				// check if new video link inserted
				if($filename){
					// delete old video
					if(file_exists($upload_path.$item->video_link))
					{
						@unlink($upload_path.$item->video_link);
					}
				}else{
					$filename = $item->video_link;
				}
			}
		}

		return $filename;
	}

	public function change_status($id,$status){

		$response = $this->videos->update(["id"=>$id,"status"=>$status]);

		if($response)
			{
				$type 	=	[
					"type"	=>	"success",
					"msg"	=>	"Item status changed successfully.",
				];
			}else{
				$type 	=	[
					"type"	=>	"error",
					"msg"	=>	"Failed to change status item",
				];
			}
			$this->session->set_flashdata("notification.cas",json_encode($type));
			redirect(site_url("backend/latest_videos"));
	}

	public function delete_video($id)
	{
		$item = $this->videos->get($id);

		if($item->id)
		{
			$response = $this->videos->delete($id);

			// delete the files too
			if($item->link_type == 'internal')
			{
				if(file_exists(FCPATH . 'uploads/videos/'.$item->video_link))
				{
					@unlink(FCPATH . 'uploads/videos/'.$item->video_link);
				}
			}

			if($response)
			{
				$type 	=	[
					"type"	=>	"success",
					"msg"	=>	"Item deleted successfully.",
				];
			}else{
				$type 	=	[
					"type"	=>	"error",
					"msg"	=>	"Failed to delete item",
				];
			}
		}else{
			$type 	=	[
				"type"	=>	"error",
				"msg"	=>	"Failed to delete item",
			];
		}
		
		$this->session->set_flashdata("notification.cas",json_encode($type));
		redirect(site_url("backend/latest_videos"));
	}
}
