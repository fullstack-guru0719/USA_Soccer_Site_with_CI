<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SettingsController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Manage_model');
		$this->load->model('User_model');
		$this->load->model('Settings_model','settings');
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
		$data['menu'] = 'settings';
		
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

			$data['settings'] = $this->settings->get();
			$this->load->view('backend/header', $data);
			$this->load->view('backend/settings/default');
			$this->load->view('backend/footer');
		}	
	}

	protected function processAttachments()
	{
		$errors = [];
		$data = [];
		if (!is_dir(FCPATH .'uploads/')) {
			mkdir(FCPATH .'uploads/', 0777, TRUE);
		}

		//echo "<pre>";print_r($_FILES);die;
		if(!empty($_FILES['settings']['name']) && count(array_filter($_FILES['settings']['name'])) > 0)
		{
			$filesCount = count($_FILES['settings']['name']);

			foreach($_FILES['settings']['name'] as $key => $val)
			{
				$_FILES['file']['name']     = $_FILES['settings']['name'][$key]; 
				$_FILES['file']['type']     = $_FILES['settings']['type'][$key]; 
				$_FILES['file']['tmp_name'] = $_FILES['settings']['tmp_name'][$key]; 
				$_FILES['file']['error']     = $_FILES['settings']['error'][$key]; 
				$_FILES['file']['size']     = $_FILES['settings']['size'][$key];

				$config['upload_path']          = './uploads/';
				$config['allowed_types']        = 'gif|jpg|png|jpeg';

				$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload('file'))
				{
					$errors[] = $this->upload->display_errors();
					
				} else {
					$response = $this->upload->data();

					$data[]		=	[
						"setting_name"	=>	$key,
						"setting_value"	=>	$response['file_name']
					];
				}
			}
		}

		if(count($errors) > 0)
		{
			$this->session->set_flashdata('errors',implode(",",$errors));
		}

		return $data;
	}

	public function deleteLogo($logo)
	{
		$settings = $this->settings->get();

		if(!isset($settings[$logo]))
		{
			$msg	=	[
				'type'	=>	'error',
				'msg'	=>	'Invalid request'
			];

			$this->session->set_flashdata("notification.configuration",json_encode($msg));

			redirect(site_url("backend/settings"));
		}

		if(file_exists(FCPATH . 'uploads/'.$settings[$logo]))
		{
			unlink(FCPATH . 'uploads/'.$settings[$logo]);
		}

		$data[]		=	[
			"setting_name"	=>	$logo,
			"setting_value"	=>	''
		];

		$response 	=	$this->settings->save($data);
		if($response)
		{
			$msg	=	[
				'type'	=>	'success',
				'msg'	=>	'Logo deleted successfully'
			];
		}else{
			$msg	=	[
				'type'	=>	'error',
				'msg'	=>	'An error ocurred while deleting logo. Please contact the developer'
			];
		}

		$this->session->set_flashdata("notification.configuration",json_encode($msg));

		redirect(site_url("backend/settings"));
	}
}
