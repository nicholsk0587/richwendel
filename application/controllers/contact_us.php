<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact_us extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->helper('captcha');
    }

	public function index()
	{
		$vals = array(
    		'img_path' => './resources/captcha/',
    		'img_url' => base_url().'/resources/captcha/'
    		);

		$data->cap = create_captcha($vals);

		$captcha = array(
    		'captcha_time' => $data->cap['time'],
    		'ip_address' => $this->input->ip_address(),
    		'word' => $data->cap['word'],
    		);

		$query = $this->db->insert_string('captcha', $captcha);
		$this->db->query($query);
        
		$this->load->view('/validation/contact_us');
		
        if( $this->form_validation->run() == TRUE ):
        
        // First, delete old captchas
        $expiration = time()-7200; // Two hour limit
        $this->db->query("DELETE FROM captcha WHERE captcha_time < ".$expiration);

        // Then see if a captcha exists:
        $sql = "SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?";
        $binds = array($_POST['captcha'], $this->input->ip_address(), $expiration);
        $query = $this->db->query($sql, $binds);
        $row = $query->row();

        if ($row->count != 0):
        	$name = $this->input->post('name',TRUE);
        	$sender = $this->input->post('sender',TRUE);
        	$phone = $this->input->post('phone',TRUE);
        	$subject = $this->input->post('subject',TRUE);
        	$message = $this->input->post('message',TRUE);
                        
            $this->email->from('info@richwendel.com', 'Contact Us Form');
            //$this->email->to('info@richwendel.com');
            $this->email->to('steph@signalus.com');

            $this->email->subject('Contact Form Submitted: '.$subject);
            $this->email->message('Contact: '.$name.'
            Message : ' .$message. '
            Phone : ' .$phone. '
            Email: '.$sender
            );

            $this->email->send();
            
            $this->email->from('info@richwendel.com', 'The Law Offices of Richard G. Wendel');
            $this->email->to($sender);

            $this->email->subject('Thank you for contacting us.');
            $this->email->message('Dear '.$name.',
			Thank you for contacting us. We will be in touch with you shortly to address your needs.
			Sincerley,
			The Law Offices of Richard G. Wendel'
            );

            $this->email->send();
            
         	$this->session->set_flashdata('message', '<p style="color:green;">Your form has been submitted, a representative will contact you shortly!</p>'); 
        	redirect('/contact_us/');
		else:
         	$this->session->set_flashdata('message', '<p style="color:red;">Please try again.</p>'); 
        	redirect('/contact_us/'); 
		endif; 

        else:
		
	    $layout->body_class = 'contact';
    	$layout->content = $this->load->view('contact_us/index',$data,true);

		//these are the "pieces" of the sidebar you want to load  
		$piece->sb_one = $this->load->view('contact_us/office',null,true);
		$piece->sb_two = $this->load->view('sidebar/social',null,true); 
		
		//this is loading all those "pieces" into the view "sidebar/index" so they appear in the order you wanted        
        $layout->sidebar = $this->load->view('sidebar/index',$piece,true);
   

		$this->load->view('layouts/html5',$layout);
		
        endif;
	}	

}
