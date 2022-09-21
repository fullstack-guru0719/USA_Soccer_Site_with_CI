<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SponsorsController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Manage_model');
		$this->load->model('User_model');
		$this->load->model('Sponsors_model','sponsor');
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
		$data['menu'] = 'sponsors';
		
		$this->form_validation->set_rules('site_settings','Site settings','required');
		$this->form_validation->set_error_delimiters('<br/><div class="alert alert-danger">', '</div>');
		if($this->form_validation->run() === true)
		{
			
			$sform		=	$this->input->post("settings");
			$data		=	[];	

			

			// check if any file uploaded or not
			$files_data = $this->processAttachments();
			if(count($files_data) > 0)
			{
				$data = array_merge($data,$files_data);
			}


			foreach($sform as $key=>$val)
			{
				$data[]		=	[
					"setting_name"	=>	$key,
					"setting_value"	=>	$val
				];
			}
			$response 	=	$this->settings->save($data);
			
			if($response)
			{
				$msg	=	[
					'type'	=>	'success',
					'msg'	=>	'Settings have been saved successfully'
				];
			}else{
				$msg	=	[
					'type'	=>	'error',
					'msg'	=>	'An error ocurred while saving the settings. Please contact the developer'
				];
			}
			
			$this->session->set_flashdata("notification.configuration",json_encode($msg));

			redirect(site_url("backend/settings"));
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

			$this->load->view('backend/header', $data);
			$this->load->view('backend/sponsors/default');
			$this->load->view('backend/footer');
		}	
	}

	public function ajax_get_sponsors()
	{
		$items		=	$this->sponsor->getItems();
		$draw 		= 	intval($this->input->post("draw"));
		
		$total_items	=	$this->sponsor->get_total_records();
		$output = array(
			"draw" 				=> $draw,
			"recordsTotal" 		=> $total_items,
			"recordsFiltered" 	=> $total_items,
			"data" 				=> $items
		);
        echo json_encode($output);
        exit();
	}

	public function add_sponsor($id = null)
	{
		$user_id = $this->session->userdata('user_id');
		$user_name = $this->session->userdata('user_name');
		$data['menu'] = 'sponsors';
		
		$this->form_validation->set_rules('name','Sponsor Name','required');
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('business_name','Business Name','required');
		$this->form_validation->set_rules('contact_number','Contact Number','required');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
		if($this->form_validation->run() === true)
		{
			$postdata = $this->input->post();

			$postdata['logo'] = $this->processAttachments($postdata);

			if($postdata['id']){
				//update the record
				$response = $this->sponsor->update($postdata);
			}else{
				$postdata['status'] = 'active';
				//insert the record
				$response = $this->sponsor->insert($postdata);
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

			redirect(site_url("backend/sponsors"));
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

			$data['item'] = $this->sponsor->get($id);

			$this->load->view('backend/header', $data);
			$this->load->view('backend/sponsors/form');
			$this->load->view('backend/footer');
		}	
	}

	protected function processAttachments($postdata)
	{
		$filename = '';
		$errors = [];
		$data = [];
		if (!is_dir(FCPATH .'uploads/')) {
			mkdir(FCPATH .'uploads/', 0777, TRUE);
		}

		if(!empty($_FILES['logo']['name']))
		{
			$config['upload_path']          = './uploads/';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';

			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('logo'))
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

				// check if new logo inserted
				if($filename){
					// delete old logo
					if(file_exists(FCPATH.'uploads/'.$item->logo))
					{
						@unlink(FCPATH.'uploads/'.$item->logo);
					}
				}else{
					$filename = $item->name;
				}
			}
		}

		return $filename;
	}

	public function change_status($id,$status){

		$response = $this->sponsor->update(["id"=>$id,"status"=>$status]);

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
			redirect(site_url("backend/sponsors"));
	}

	public function delete_sponsor($id)
	{
		$item = $this->sponsor->get($id);

		if($item->id)
		{
			$response = $this->sponsor->delete($id);

			// delete the files too
			if($item->logo)
			{
				if(file_exists(FCPATH . 'uploads/'.$item->logo))
				{
					@unlink(FCPATH . 'uploads/'.$item->logo);
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
		redirect(site_url("backend/sponsors"));
	}
}
