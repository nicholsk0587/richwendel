<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Practice_areas extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('Blog_model','blog');
    }
       

	
	function ohio()
	{
		$blogs = $this->blog->find_by_type($type=NULL,$limit='2',$offset=NULL);

	    foreach ($blogs as $b):
	    	$d = explode('-', $b->published_date);
			$b->published_date = date("F d, Y", mktime(0,0,0,$d[1],substr($d[2],0,2),$d[0]));
		endforeach;
		
		$data->blogs = $blogs;
		$data->all_blogs = $this->blog->find();
    	$layout->content = $this->load->view('practice_areas/ohio',$data,true);
    	
    	//these are the "pieces" of the sidebar you want to load  
		$piece->sb_one = $this->load->view('sidebar/consult',null,true);
		$piece->sb_two = $this->load->view('practice_areas/subnav',null,true);    
        $piece->sb_four = $this->load->view('sidebar/articles',null,true);
        
        //this is loading all those "pieces" into the view "sidebar/index" so they appear in the order you wanted        
        $layout->sidebar = $this->load->view('sidebar/index',$piece,true);
        
		$this->load->view('layouts/html5',$layout);

	}
	
	function kentucky()
	{
		$blogs = $this->blog->find_by_type($type=NULL,$limit='2',$offset=NULL);

	    foreach ($blogs as $b):
	    	$d = explode('-', $b->published_date);
			$b->published_date = date("F d, Y", mktime(0,0,0,$d[1],substr($d[2],0,2),$d[0]));
		endforeach;
		
		$data->blogs = $blogs;
		$data->all_blogs = $this->blog->find();
		
    	$layout->content = $this->load->view('practice_areas/kentucky',$data,true);
    	
    	//these are the "pieces" of the sidebar you want to load  
		$piece->sb_one = $this->load->view('sidebar/consult',null,true);
		$piece->sb_two = $this->load->view('practice_areas/subnav',null,true);    
        $piece->sb_four = $this->load->view('sidebar/articles',null,true);
        
        //this is loading all those "pieces" into the view "sidebar/index" so they appear in the order you wanted        
        $layout->sidebar = $this->load->view('sidebar/index',$piece,true);
    	
		$this->load->view('layouts/html5',$layout);
	}

	function personal_injury()
	{
		$data->all_blogs = $this->blog->find();
    	$layout->content = $this->load->view('practice_areas/personal_injury',$data,true);
    	//these are the "pieces" of the sidebar you want to load  
		$piece->sb_one = $this->load->view('sidebar/consult',null,true);
		$piece->sb_two = $this->load->view('practice_areas/subnav',null,true);    
        $piece->sb_four = $this->load->view('sidebar/articles',null,true);
        
        //this is loading all those "pieces" into the view "sidebar/index" so they appear in the order you wanted        
        $layout->sidebar = $this->load->view('sidebar/index',$piece,true);
    	
		$this->load->view('layouts/html5',$layout);
	}	
	
	function criminal_law()
	{
		$blogs = $this->blog->find_by_type($type=NULL,$limit='2',$offset=NULL);

	    foreach ($blogs as $b):
	    	$d = explode('-', $b->published_date);
			$b->published_date = date("F d, Y", mktime(0,0,0,$d[1],substr($d[2],0,2),$d[0]));
		endforeach;
		
		$data->blogs = $blogs;
		$data->all_blogs = $this->blog->find();
		
    	$layout->content = $this->load->view('practice_areas/criminal_law',$data,true);
    	//these are the "pieces" of the sidebar you want to load  
		$piece->sb_one = $this->load->view('sidebar/consult',null,true);
		$piece->sb_two = $this->load->view('practice_areas/subnav',null,true);    
        $piece->sb_four = $this->load->view('sidebar/articles',null,true);
        
        //this is loading all those "pieces" into the view "sidebar/index" so they appear in the order you wanted        
        $layout->sidebar = $this->load->view('sidebar/index',$piece,true);

		$this->load->view('layouts/html5',$layout);
	}
	
	function civil_litigation()
	{
		$blogs = $this->blog->find_by_type($type=NULL,$limit='2',$offset=NULL);

	    foreach ($blogs as $b):
	    	$d = explode('-', $b->published_date);
			$b->published_date = date("F d, Y", mktime(0,0,0,$d[1],substr($d[2],0,2),$d[0]));
		endforeach;
		
		$data->blogs = $blogs;
		$data->all_blogs = $this->blog->find();
		
    	$layout->content = $this->load->view('practice_areas/civil_litigation',$data,true);
    	//these are the "pieces" of the sidebar you want to load  
		$piece->sb_one = $this->load->view('sidebar/consult',null,true);
		$piece->sb_two = $this->load->view('practice_areas/subnav',null,true);    
        $piece->sb_four = $this->load->view('sidebar/articles',null,true);
        
        //this is loading all those "pieces" into the view "sidebar/index" so they appear in the order you wanted        
        $layout->sidebar = $this->load->view('sidebar/index',$piece,true);

		$this->load->view('layouts/html5',$layout);
	}

}
