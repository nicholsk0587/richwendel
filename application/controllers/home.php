<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

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
        $piece->sb_two = $this->load->view('sidebar/news',$data,true);
        $piece->sb_three = $this->load->view('sidebar/consult',null,true);

        $layout->body_class = 'home';                
    	$layout->content = $this->load->view('home/index',null,true);
    	
    	//this is loading all those "pieces" into the view "sidebar/index" so they appear in the order you wanted               
        $layout->sidebar = $this->load->view('sidebar/index',$piece,true);
        $layout->lower = $this->load->view('home/home-boxes',null,true);


		$this->load->view('layouts/html5',$layout);
	}
	
	function privacy_policy()
	{
	
    	$layout->content = $this->load->view('home/privacy',null,true);
		$this->load->view('layouts/html5',$layout);
	
	}
	
	function site_map()
	{
	
    	$layout->content = $this->load->view('home/sitemap',null,true);
		$this->load->view('layouts/html5',$layout);
	
	}
	

}
