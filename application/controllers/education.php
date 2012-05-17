<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Education extends CI_Controller {

    function __construct()
    {
        parent::__construct();
    }
       
	function index()
	{
    	$layout->content = $this->load->view('education/index',null,true);
		$this->load->view('layouts/html5',$layout);
	}
	
	function cincinnati()
	{
    	$layout->content = $this->load->view('education/cincinnati',null,true);
		$this->load->view('layouts/html5',$layout);
	}
	
	function kentucky()
	{
    	$layout->content = $this->load->view('education/kentucky',null,true);
		$this->load->view('layouts/html5',$layout);
	}

	function personal_injury()
	{
    	$layout->content = $this->load->view('education/personal_injury',null,true);
		$this->load->view('layouts/html5',$layout);
	}	
	
	function criminal_law()
	{
    	$layout->content = $this->load->view('education/criminal_law',null,true);
		$this->load->view('layouts/html5',$layout);
	}
	
	function civil_litgation()
	{
    	$layout->content = $this->load->view('education/civil_litigation',null,true);
		$this->load->view('layouts/html5',$layout);
	}

}
