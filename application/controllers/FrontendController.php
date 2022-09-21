<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FrontendController extends CI_Controller {
	public $settings;
	public function __construct()
	{
		parent::__construct();
		$this->settings = config();
		$this->load->library('paypal_lib');
		$this->load->model('User_model');
		$this->load->model('Manage_model');
	}

	public function index()
	{
		$data['menu'] = 'index';
		$data['schedules'] = $this->Manage_model->get_all_schedule();
		$data['oldest_schedule'] = $this->Manage_model->get_oldest_schedule();
		$data['teams'] = $this->Manage_model->get_all_team();
		$data['sliders'] = $this->Manage_model->get_active_slider();
		$data['latest_result'] = $this->Manage_model->get_latest_result();
		$data['latest_news'] = $this->Manage_model->get_latest_news();

		$data['standings'] = $this->Manage_model->get_tournament_standings();
		
		$data['tournaments'] = $this->Manage_model->get_all_tournament();
		$data['trainings'] = $this->Manage_model->get_all_training();
		$data['products'] = $this->Manage_model->get_active_all_product();
		$data['sponsors'] = $this->Manage_model->get_active_all_sponsors();
		$data['latest_videos'] = $this->Manage_model->get_latest_videos();
		
		$user_id = $this->session->userdata('user_id');
		$user_name = $this->session->userdata('user_name');

		if ($user_id && $user_name)
		{
			$data['user'] = $this->User_model->get_user_by_id($user_id);
			$data['user_id'] = $user_id;
			$data['user_name'] = $user_name;
		}
		else
		{
			$data['user'] = '';
			$data['user_id'] = '';
			$data['user_name'] = '';
		}
		$data['hide_top_bar'] = true;

		$this->load->view('frontend/header', $data);
		if(isset($this->settings['old_home_screen']) && $this->settings['old_home_screen'])
		{
			$this->load->view('frontend/index_old_homepage.php');
		} else {
			$this->load->view('frontend/index');
		}
		$this->load->view('frontend/footer');
	}

	public function about()
	{
		$data['menu'] = 'about';
		
		$user_id = $this->session->userdata('user_id');
		$user_name = $this->session->userdata('user_name');

		if ($user_id && $user_name)
		{
			$data['user'] = $this->User_model->get_user_by_id($user_id);
			$data['user_id'] = $user_id;
			$data['user_name'] = $user_name;
		}
		else
		{
			$data['user'] = '';
			$data['user_id'] = '';
			$data['user_name'] = '';
		}

		$this->load->view('frontend/header', $data);
		$this->load->view('frontend/about');
		$this->load->view('frontend/footer');
	}

	public function sponsor()
	{
		$this->load->library('mathcaptcha');
		$config = [
            'operation' => 'addition',
            'question_format' => 'numeric',
            'answer_format' => 'numeric'
        ];
        $this->mathcaptcha->init($config);

		$data['menu'] = 'contact';
		
		$user_id = $this->session->userdata('user_id');
		$user_name = $this->session->userdata('user_name');

		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('phone', 'Phone', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('captcha', 'Math CAPTCHA', 'required|callback_check_captcha');
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        if ($this->form_validation->run() === TRUE)
        {
			$html='';
            $post = $this->input->post();
            unset($post['captcha']);
            foreach ($_POST as $key => $value) {
                $html.=ucwords(str_replace("_", " ", $key)).': '.$value."<br /><br/>";
            }

			if(isset($this->settings['support_email']) && !empty($this->settings['support_email']))
			{
				$this->load->library('email');
				// $this->email->from($this->semail,$this->webtitle);
				$this->email->to($this->settings['support_email']);
				$this->email->subject("Sponser Registration");
				$this->email->message($html);
				if($this->email->send()){

					echo "Thank you for showing your interest! We will contact you soon.";die;
					//$this->session->set_flashdata("message","Thank you for showing your interest! We will contact you soon.");
				}else{
					echo "Failed to send email. Please try again later.";die;
					//$this->session->set_flashdata("emessage","Something went wrong.");
				}
			}else{
				echo "Email server not configured on the server.";die;
				//$this->session->set_flashdata("emessage","Something went wrong.");
			}
            
            redirect(base_url("contact"));
		}else{
			if ($user_id && $user_name)
			{
				$data['user'] = $this->User_model->get_user_by_id($user_id);
				$data['user_id'] = $user_id;
				$data['user_name'] = $user_name;
			} else {
				$data['user'] = '';
				$data['user_id'] = '';
				$data['user_name'] = '';
			}
			$data['captcha'] = $this->mathcaptcha->get_question();
			$data['sponsors'] = $this->Manage_model->get_active_all_sponsors();
			$this->load->view('frontend/header', $data);
			$this->load->view('frontend/sponsor');
			$this->load->view('frontend/footer');
		}
	}

	public function academy()
	{
		$data['menu'] = 'academy';
		
		$user_id = $this->session->userdata('user_id');
		$user_name = $this->session->userdata('user_name');

		if ($user_id && $user_name)
		{
			$data['user'] = $this->User_model->get_user_by_id($user_id);
			$data['user_id'] = $user_id;
			$data['user_name'] = $user_name;
		}
		else
		{
			$data['user'] = '';
			$data['user_id'] = '';
			$data['user_name'] = '';
		}

		$this->load->view('frontend/header', $data);
		$this->load->view('frontend/academy');
		$this->load->view('frontend/footer');
	}

	public function roaster()
	{
		$data['menu'] = 'roaster';
		
		$user_id = $this->session->userdata('user_id');
		$user_name = $this->session->userdata('user_name');

		if ($user_id && $user_name)
		{
			$data['user'] = $this->User_model->get_user_by_id($user_id);
			$data['user_id'] = $user_id;
			$data['user_name'] = $user_name;
		}
		else
		{
			$data['user'] = '';
			$data['user_id'] = '';
			$data['user_name'] = '';
		}

		$data['division_1_items'] = $this->db->where(['user_group' => 4,'player_division' => 1])->get('users')->result_array();
		$data['division_2_items'] = $this->db->where(['user_group' => 4,'player_division' => 2])->get('users')->result_array();
		$data['reserve_1_items'] = $this->db->where(['user_group' => 4,'player_division' => 3])->get('users')->result_array();
		$data['reserve_2_items'] = $this->db->where(['user_group' => 4,'player_division' => 4])->get('users')->result_array();
		

		$this->load->view('frontend/header', $data);
		$this->load->view('frontend/roaster');
		$this->load->view('frontend/footer');
	}

	public function viewPlayer()
	{
		$player_id = $this->input->post('filter_player');
		$player = $this->db->where(['id' => (int)$player_id])->get('users')->row();
		if(!$player)
		{
			show_404();
		}

		return redirect(site_url('player/'.$player->alias));
	}

	public function player($slug = null)
	{
		if(empty($slug))
		{
			show_404();
		}

		
		// check if record exists in the system or not
		$item = $this->db->where(['alias' => $slug])->get('users')->row_array();

		if(!is_array($item) || count($item) == 0)
		{
			show_404();
		}

		$data['menu'] = 'Player Details';
		
		$user_id = $this->session->userdata('user_id');
		$user_name = $this->session->userdata('user_name');

		if ($user_id && $user_name)
		{
			$data['user'] = $this->User_model->get_user_by_id($user_id);
			$data['user_id'] = $user_id;
			$data['user_name'] = $user_name;
		}
		else
		{
			$data['user'] = '';
			$data['user_id'] = '';
			$data['user_name'] = '';
		}

		$data['item'] = $item;

		if($data['item']['nationality'])
		{
			$country = $this->db->where(['id'=>$data['item']['nationality']])->get('country')->row();
			$data['item']['nationality'] = $country->name;
		}
		$data['players_dropdown'] = $this->Manage_model->get_player_dropdown();
		$data['player_career'] = $this->db->where(['player_id' => $item['id']])->get('player_career')->result_array();

		$this->load->view('frontend/header', $data);
		$this->load->view('frontend/player');
		$this->load->view('frontend/footer');
	}

	public function donate()
	{
		$data['menu'] = 'donate';
		
		$user_id = $this->session->userdata('user_id');
		$user_name = $this->session->userdata('user_name');

		if ($user_id && $user_name)
		{
			$data['user'] = $this->User_model->get_user_by_id($user_id);
			$data['user_id'] = $user_id;
			$data['user_name'] = $user_name;
		}
		else
		{
			$data['user'] = '';
			$data['user_id'] = '';
			$data['user_name'] = '';
		}

		$this->load->view('frontend/header', $data);
		$this->load->view('frontend/donate');
		$this->load->view('frontend/footer');
	}

	public function shop($id = null)
	{
		$data['menu'] = 'shop';
		$data['products'] = $this->Manage_model->get_active_all_products($id);
		$data['categories'] = $this->Manage_model->get_all_categories();
		$data['colors'] = $this->Manage_model->get_all_colors();
		$data['sizes'] = $this->Manage_model->get_all_sizes();
		
		$user_id = $this->session->userdata('user_id');
		$user_name = $this->session->userdata('user_name');

		if ($user_id && $user_name)
		{
			$data['user'] = $this->User_model->get_user_by_id($user_id);
			$data['user_id'] = $user_id;
			$data['user_name'] = $user_name;
		}
		else
		{
			$data['user'] = '';
			$data['user_id'] = '';
			$data['user_name'] = '';
		}

		$this->load->view('frontend/header', $data);
		$this->load->view('frontend/shop',$data);
		$this->load->view('frontend/footer');
	}
	public function shop_attr($id = null)
	{
		$data['menu'] = 'shop';
		$data['products'] = $this->Manage_model->get_active_all_products_attr($id);
		$data['categories'] = $this->Manage_model->get_all_categories();
		$data['colors'] = $this->Manage_model->get_all_colors();
		$data['sizes'] = $this->Manage_model->get_all_sizes();
		
		$user_id = $this->session->userdata('user_id');
		$user_name = $this->session->userdata('user_name');

		if ($user_id && $user_name)
		{
			$data['user'] = $this->User_model->get_user_by_id($user_id);
			$data['user_id'] = $user_id;
			$data['user_name'] = $user_name;
		}
		else
		{
			$data['user'] = '';
			$data['user_id'] = '';
			$data['user_name'] = '';
		}

		$this->load->view('frontend/header', $data);
		$this->load->view('frontend/shop',$data);
		$this->load->view('frontend/footer');
	}
	public function shop_colour($id = null)
	{
		$data['menu'] = 'shop';
		$data['products'] = $this->Manage_model->get_active_all_products_colour($id);
		$data['categories'] = $this->Manage_model->get_all_categories();
		$data['colors'] = $this->Manage_model->get_all_colors();
		$data['sizes'] = $this->Manage_model->get_all_sizes();
		
		$user_id = $this->session->userdata('user_id');
		$user_name = $this->session->userdata('user_name');

		if ($user_id && $user_name)
		{
			$data['user'] = $this->User_model->get_user_by_id($user_id);
			$data['user_id'] = $user_id;
			$data['user_name'] = $user_name;
		}
		else
		{
			$data['user'] = '';
			$data['user_id'] = '';
			$data['user_name'] = '';
		}

		$this->load->view('frontend/header', $data);
		$this->load->view('frontend/shop',$data);
		$this->load->view('frontend/footer');
	}

	public function product_details($id = null)
	{
		$data['menu'] = 'product-details';
		$data['product'] = $this->Manage_model->get_product_by_id($id);
		$user_id = $this->session->userdata('user_id');
		$user_name = $this->session->userdata('user_name');

		if ($user_id && $user_name)
		{
			$data['user'] = $this->User_model->get_user_by_id($user_id);
			$data['user_id'] = $user_id;
			$data['user_name'] = $user_name;
		}
		else
		{
			$data['user'] = '';
			$data['user_id'] = '';
			$data['user_name'] = '';
		}

		$this->load->view('frontend/header', $data);
		$this->load->view('frontend/product-details', $data);
		$this->load->view('frontend/footer');
	}

	public function shopcart()
	{
		$data['menu'] = 'shopcart';
		$data['deliveries'] = $this->Manage_model->get_all_active_delivery();
		
		$user_id = $this->session->userdata('user_id');
		$user_name = $this->session->userdata('user_name');

		if ($user_id && $user_name)
		{
			$data['user'] = $this->User_model->get_user_by_id($user_id);
			$data['user_id'] = $user_id;
			$data['user_name'] = $user_name;
		}
		else
		{
			$data['user'] = '';
			$data['user_id'] = '';
			$data['user_name'] = '';
		}

		$this->load->view('frontend/header', $data);
		$this->load->view('frontend/shopcart');
		$this->load->view('frontend/footer');
	}

	public function contact()
	{
		$this->load->library('mathcaptcha');
		$config = [
            'operation' => 'addition',
            'question_format' => 'numeric',
            'answer_format' => 'numeric'
        ];
        $this->mathcaptcha->init($config);

		$data['menu'] = 'contact';
		
		$user_id = $this->session->userdata('user_id');
		$user_name = $this->session->userdata('user_name');

		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('phone', 'Phone', 'required');
		$this->form_validation->set_rules('subject', 'subject', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('comment', 'Message', 'required');
		$this->form_validation->set_rules('captcha', 'Math CAPTCHA', 'required|callback_check_captcha');
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        if ($this->form_validation->run() === TRUE)
        {
			$html='';
            $post = $this->input->post();
            unset($post['captcha']);
            foreach ($_POST as $key => $value) {
                $html.=ucwords(str_replace("_", " ", $key)).': '.$value."<br /><br/>";
            }

			if(isset($this->settings['support_email']) && !empty($this->settings['support_email']))
			{
				$this->load->library('email');
				// $this->email->from($this->semail,$this->webtitle);
				$this->email->to($this->settings['support_email']);
				$this->email->subject("Player Enquiry");
				$this->email->message($html);
				if($this->email->send()){

					echo "Thank you for showing your interest! We will contact you soon.";die;
					//$this->session->set_flashdata("message","Thank you for showing your interest! We will contact you soon.");
				}else{
					echo "Failed to send email. Please try again later.";die;
					//$this->session->set_flashdata("emessage","Something went wrong.");
				}
			}else{
				echo "Email server not configured on the server.";die;
				//$this->session->set_flashdata("emessage","Something went wrong.");
			}
            
            redirect(base_url("contact"));
		}else{
			if ($user_id && $user_name)
			{
				$data['user'] = $this->User_model->get_user_by_id($user_id);
				$data['user_id'] = $user_id;
				$data['user_name'] = $user_name;
			} else {
				$data['user'] = '';
				$data['user_id'] = '';
				$data['user_name'] = '';
			}
			$data['captcha'] = $this->mathcaptcha->get_question();
			$this->load->view('frontend/header', $data);
			$this->load->view('frontend/contact');
			$this->load->view('frontend/footer');
		}
	}

	function check_captcha($str)
    {
        if ($this->mathcaptcha->check_answer($str))
        {
            return TRUE;
        }else{
            $this->form_validation->set_message('check_captcha', 'Enter a valid captcha response.');
            return FALSE;
        }
    }

	public function pay()
	{
        // Set variables for paypal form
        $returnURL = base_url().'shop/pay_success';
        $cancelURL = base_url().'shop/pay_cancel';
        $notifyURL = base_url().'shop/pay_ipn';
        
        // Get product data from the database
        // $product = $this->product->getRows($id);
        
        $product['id'] = $_GET["product_id"];
        $product['name'] = $_GET["product_name"];
        $product['price'] = $_GET["product_price"];
        
        // Get current user ID from the session
        $userID = $this->session->userdata('user_id');
        
        // Add fields to paypal form
        $this->paypal_lib->add_field('return', $returnURL);
        $this->paypal_lib->add_field('cancel_return', $cancelURL);
        $this->paypal_lib->add_field('notify_url', $notifyURL);
        $this->paypal_lib->add_field('item_name', $product['name']);
        $this->paypal_lib->add_field('custom', $userID);
        $this->paypal_lib->add_field('item_number',  $product['id']);
        $this->paypal_lib->add_field('amount',  $product['price']);
        
        // Render paypal form
        $this->paypal_lib->paypal_auto_form();
    }

    function pay_success()
    {
        // Get the transaction data
        $paypalInfo = $this->input->get();

        $data['item_name']      = $paypalInfo['item_name'];
        $data['item_number']    = $paypalInfo['item_number'];
        $data['txn_id']         = $paypalInfo["tx"];
        $data['payment_amt']    = $paypalInfo["amt"];
        $data['currency_code']  = $paypalInfo["cc"];
        $data['status']         = $paypalInfo["st"];
        
        // Pass the transaction data to view
        $this->load->view('frontend/success', $data);
    }
     
    function pay_cancel()
    {
        // Load payment failed view
        $this->load->view('frontend/cancel');
     }
     
    function pay_ipn()
    {
        // Paypal posts the transaction data
        $paypalInfo = $this->input->post();
        
        if (!empty($paypalInfo))
        {
            // Validate and get the ipn response
            $ipnCheck = $this->paypal_lib->validate_ipn($paypalInfo);

            // Check whether the transaction is valid
            if ($ipnCheck)
            {
                // Insert the transaction data in the database
                $data['user_id']        = $paypalInfo["custom"];
                $data['product_id']     = $paypalInfo["item_number"];
                $data['txn_id']         = $paypalInfo["txn_id"];
                $data['payment_gross']  = $paypalInfo["mc_gross"];
                $data['currency_code']  = $paypalInfo["mc_currency"];
                $data['buyer_email']    = $paypalInfo["payer_email"];
                $data['payment_status'] = $paypalInfo["payment_status"];

                $this->Manage_model->insertTransactionProduct($data);
            }
        }
    }

	public function videos()
	{
		$data['menu'] = 'index';
		
		$user_id = $this->session->userdata('user_id');
		$user_name = $this->session->userdata('user_name');

		if ($user_id && $user_name)
		{
			$data['user'] = $this->User_model->get_user_by_id($user_id);
			$data['user_id'] = $user_id;
			$data['user_name'] = $user_name;
		}
		else
		{
			$data['user'] = '';
			$data['user_id'] = '';
			$data['user_name'] = '';
		}

		$filter_videos = $this->input->get('filter_videos');
		// get all the videos
		if($filter_videos)
		{
			$data['videos'] = $this->db->where(['status'=>'active'])->like('title',$filter_videos)->order_by('id','desc')->limit(10)->get('latest_videos')->result_array();
		}else{
			$data['videos'] = $this->db->where(['status'=>'active'])->order_by('id','desc')->limit(10)->get('latest_videos')->result_array();
		}
		

		$this->load->library('pagination');

		$config['base_url'] = site_url('videos');
		$config['total_rows'] = $this->db->where(['status'=>'active'])->count_all_results('latest_videos');
		$config['per_page'] = 10;
		$config['full_tag_open'] = "<ul class='pagination'>";
		$config['full_tag_close'] ="</ul>";
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] = "<li>";
		$config['last_tagl_close'] = "</li>";

		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();

		$this->load->view('frontend/header', $data);
		$this->load->view('frontend/videos');
		$this->load->view('frontend/footer');
	}

	public function news()
	{
		$data['menu'] = 'index';
		
		$user_id = $this->session->userdata('user_id');
		$user_name = $this->session->userdata('user_name');

		if ($user_id && $user_name)
		{
			$data['user'] = $this->User_model->get_user_by_id($user_id);
			$data['user_id'] = $user_id;
			$data['user_name'] = $user_name;
		}
		else
		{
			$data['user'] = '';
			$data['user_id'] = '';
			$data['user_name'] = '';
		}

		$limit = 10;

		// get all the videos
		$filter_search = $this->input->get('filter_search');
		if($filter_search){
			$data['news'] = $this->db->or_like(['news_title' => $filter_search,'news_content' => $filter_search])->order_by('id','desc')->limit($limit)->get('news')->result_array();
			$total_records = $this->db->or_like(['news_title' => $filter_search,'news_content' => $filter_search])->count_all_results('news');
		}else{
			$data['news'] = $this->db->order_by('id','desc')->limit($limit)->get('news')->result_array();
			$total_records = $this->db->count_all_results('news');
		}
		

		$this->load->library('pagination');

		$config['base_url'] = site_url('news');
		$config['total_rows'] = $total_records;
		$config['per_page'] = $limit;
		$config['full_tag_open'] = "<ul class='pagination'>";
		$config['full_tag_close'] ="</ul>";
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] = "<li>";
		$config['last_tagl_close'] = "</li>";

		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();

		$this->load->view('frontend/header', $data);
		$this->load->view('frontend/news');
		$this->load->view('frontend/footer');
	}

	public function news_detail($slug)
	{
		$data['menu'] = 'index';
		
		$user_id = $this->session->userdata('user_id');
		$user_name = $this->session->userdata('user_name');

		if ($user_id && $user_name)
		{
			$data['user'] = $this->User_model->get_user_by_id($user_id);
			$data['user_id'] = $user_id;
			$data['user_name'] = $user_name;
		}
		else
		{
			$data['user'] = '';
			$data['user_id'] = '';
			$data['user_name'] = '';
		}

		// get all the videos
		$data['item'] = $this->db->where(['slug' => $slug])->get('news')->row_array();

		$this->load->view('frontend/header', $data);
		$this->load->view('frontend/news_detail');
		$this->load->view('frontend/footer');
	}

	public function schedules($page = 0)
	{
		$data['menu'] = 'index';
		
		$user_id = $this->session->userdata('user_id');
		$user_name = $this->session->userdata('user_name');

		if ($user_id && $user_name)
		{
			$data['user'] = $this->User_model->get_user_by_id($user_id);
			$data['user_id'] = $user_id;
			$data['user_name'] = $user_name;
		}
		else
		{
			$data['user'] = '';
			$data['user_id'] = '';
			$data['user_name'] = '';
		}

		$limit = 10;

		$q = "SELECT s.id,t.team_logo,t.team_name,t.stadium_name,s.match_type,s.match_location,s.match_time,s.team_id FROM schedules AS s LEFT JOIN teams as t ON t.id = s.team_id";
		$t = "SELECT COUNT(s.id) AS total_records FROM schedules AS s LEFT JOIN teams as t ON t.id = s.team_id";
		
		$filter_search = $this->input->get('filter_search');
		if($filter_search){
			$q .= " WHERE t.team_name LIKE '%".$filter_search."%' OR t.stadium_name LIKE '".$filter_search."'";
			$t .= " WHERE t.team_name LIKE '%".$filter_search."%' OR t.stadium_name LIKE '".$filter_search."'";
		}

		$q .= " ORDER BY s.match_time DESC LIMIT ".$page.",".$limit;
		$data['schedules'] = $this->db->query($q)->result_array();

		$total_records = $this->db->query($t)->result_array();
		
		$this->load->library('pagination');

		$config['base_url'] = site_url('schedules');
		$config['total_rows'] = $total_records[0]['total_records'];
		$config['per_page'] = $limit;
		$config['full_tag_open'] = "<ul class='pagination'>";
		$config['full_tag_close'] ="</ul>";
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] = "<li>";
		$config['last_tagl_close'] = "</li>";

		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();

		$data['tournaments'] = $this->Manage_model->get_all_tournament();
		$data['trainings'] = $this->Manage_model->get_all_training();
		$data['teams'] = $this->Manage_model->get_all_team();

		$data['uploaded_schedules'] = $this->Manage_model->get_uploaded_schedules();

		$this->load->view('frontend/header', $data);
		$this->load->view('frontend/schedules');
		$this->load->view('frontend/footer');
	}

	public function tournaments($page = 0)
	{
		$data['menu'] = 'index';
		
		$user_id = $this->session->userdata('user_id');
		$user_name = $this->session->userdata('user_name');

		if ($user_id && $user_name)
		{
			$data['user'] = $this->User_model->get_user_by_id($user_id);
			$data['user_id'] = $user_id;
			$data['user_name'] = $user_name;
		}
		else
		{
			$data['user'] = '';
			$data['user_id'] = '';
			$data['user_name'] = '';
		}

		$limit = 10;

		$filter_search = $this->input->get('filter_search');
		// get all the videos
		if($filter_search)
		{
			$data['tournaments'] = $this->db->or_like('tournament_name',$filter_search)->or_like('tournament_location',$filter_search)->order_by('id','desc')->limit($limit)->get('tournaments')->result_array();
			$total_records = $this->db->or_like('tournament_name',$filter_search)->or_like('tournament_location',$filter_search)->count_all_results('tournaments');
		}else{
			$data['tournaments'] = $this->db->order_by('id','desc')->limit($limit)->get('tournaments')->result_array();
			$total_records = $this->db->count_all_results('tournaments');
		}
		
		$this->load->library('pagination');

		$config['base_url'] = site_url('tournaments');
		$config['total_rows'] = $total_records;
		$config['per_page'] = $limit;
		$config['full_tag_open'] = "<ul class='pagination'>";
		$config['full_tag_close'] ="</ul>";
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] = "<li>";
		$config['last_tagl_close'] = "</li>";

		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();

		$this->load->view('frontend/header', $data);
		$this->load->view('frontend/tournaments');
		$this->load->view('frontend/footer');
	}

	public function trainings($page = 0)
	{
		$data['menu'] = 'index';
		
		$user_id = $this->session->userdata('user_id');
		$user_name = $this->session->userdata('user_name');

		if ($user_id && $user_name)
		{
			$data['user'] = $this->User_model->get_user_by_id($user_id);
			$data['user_id'] = $user_id;
			$data['user_name'] = $user_name;
		}
		else
		{
			$data['user'] = '';
			$data['user_id'] = '';
			$data['user_name'] = '';
		}

		$limit = 10;

		$filter_search = $this->input->get('filter_search');
		// get all the videos
		if($filter_search)
		{
			$data['trainings'] = $this->db->or_like('training_name',$filter_search)->or_like('training_location',$filter_search)->order_by('id','desc')->limit($limit)->get('trainings')->result_array();
			$total_records = $this->db->or_like('training_name',$filter_search)->or_like('training_location',$filter_search)->count_all_results('trainings');
		}else{
			$data['trainings'] = $this->db->order_by('id','desc')->limit($limit)->get('trainings')->result_array();
			$total_records = $this->db->count_all_results('trainings');
		}
		
		$this->load->library('pagination');

		$config['base_url'] = site_url('trainings');
		$config['total_rows'] = $total_records;
		$config['per_page'] = $limit;
		$config['full_tag_open'] = "<ul class='pagination'>";
		$config['full_tag_close'] ="</ul>";
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] = "<li>";
		$config['last_tagl_close'] = "</li>";

		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();

		$this->load->view('frontend/header', $data);
		$this->load->view('frontend/trainings');
		$this->load->view('frontend/footer');
	}

	public function partners()
	{
		$data['menu'] = 'index';
		
		$user_id = $this->session->userdata('user_id');
		$user_name = $this->session->userdata('user_name');

		if ($user_id && $user_name)
		{
			$data['user'] = $this->User_model->get_user_by_id($user_id);
			$data['user_id'] = $user_id;
			$data['user_name'] = $user_name;
		}
		else
		{
			$data['user'] = '';
			$data['user_id'] = '';
			$data['user_name'] = '';
		}

		$data['sponsors'] = $this->Manage_model->get_active_all_sponsors();

		$this->load->view('frontend/header', $data);
		$this->load->view('frontend/page_sponsors');
		$this->load->view('frontend/footer');
	}
}
