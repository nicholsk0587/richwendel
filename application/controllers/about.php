<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('Blog_model','blog');
    }
       
	function index()
	{
		$blogs = $this->blog->find_by_type($type=NULL,$limit='2',$offset=NULL);

	    foreach ($blogs as $b):
	    	$d = explode('-', $b->published_date);
			$b->published_date = date("F d, Y", mktime(0,0,0,$d[1],substr($d[2],0,2),$d[0]));
		endforeach;
		
		$data->blogs = $blogs;
		//these are the "pieces" of the sidebar you want to load  
		$piece->sb_one = $this->load->view('sidebar/social',null,true);
		$piece->sb_two = $this->load->view('about/facts',null,true);    
        $piece->sb_three = $this->load->view('sidebar/consult',null,true);
        $piece->sb_four = $this->load->view('sidebar/news',$data,true);
        
        $layout->body_class = 'about';                
    	$layout->content = $this->load->view('about/index',null,true);
    	
    	//this is loading all those "pieces" into the view "sidebar/index" so they appear in the order you wanted        
        $layout->sidebar = $this->load->view('sidebar/index',$piece,true);

		$this->load->view('layouts/html5',$layout);
	}
	

}
