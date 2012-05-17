<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

    var $list_id = 'f593c26de7'; // Mailchimp List

    function __construct()
       {
            parent::__construct();
            $this->request = $_SERVER['REQUEST_METHOD'];
            $this->load->model('Users_model','users');
       }
       
    function index()
    {
    	$layout->content = $this->load->view('users/index',null,true);
		$this->load->view('layouts/html5',$layout);    
    }

	function login()
	{
		
		if($this->request == 'GET'):
            
    	$layout->content = $this->load->view('users/login',null,true);
		$this->load->view('layouts/html5',$layout);
		            
        else:
        
    		if( $this->users->login() == FALSE ):
				$this->session->set_flashdata('message', '<p class="message">You have provided an incorrect username or password. Please try again. <a href="/users/forgot">Retrieve Password</a></p>');
                redirect('/users/login');
    		endif;
            
            if( $this->session->userdata('level') == "admin" ):
                redirect('/admin');
            endif;    		
    		
        endif;
	}
	
	function forgot()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required|valid_email');
		
		if( $this->form_validation->run() == FALSE )
		{
    		$layout->content = $this->load->view('users/forgot',null,true);
			$this->load->view('layouts/html5',$layout);   
		}
		else
		{

			$username = $this->input->post('username', TRUE);
			$user_info = $this->users->find_password($username);
			
			if( empty( $user_info ) )
			{
				$this->session->set_flashdata('forgot', 'Email not found');
				redirect('users/forgot');
			}
  
            $uniqid = sha1(uniqid());
            $first_8 = substr($uniqid,0,8);
            $password = strtoupper($first_8);
            
            $update_user['password'] = $this->encrypt->encode( $password );
            
            $this->db->update('users',$update_user,array('id'=> $user_info->id));
			
			$data->body = "Richard G. Wendel - Forgotten Password
			Your password for ". $username ." is:
			" . $password ."
			Please use this password to access account at richwendel.com
			Thank you,
			Law Offices of Richard G. Wendel";
			$data->title = "Richard G. Wendel - Forgotten Password";
			$message = $this->load->view('users/email', $data, TRUE);
			
			
			$this->email->from('admin@richwendel.com', 'Law Offices of Richard G Wendel');
			$this->email->to( $user_info->username );
			$this->email->subject('Password Request');
			$this->email->message( $data->body );
			
			$this->email->send();

			$this->session->set_flashdata('message', '<p class="message">Your password has been emailed to you.</p>');
			redirect('users/forgot');
		}
	
	}

	function logout()
	{
		$array_items = array('level' => '', 'username' => '', 'user_id' => '');
		$this->session->unset_userdata($array_items);

        $this->session->sess_destroy();
		redirect('/users/login');
	}
    
}
