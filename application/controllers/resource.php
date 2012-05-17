<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Resource extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('Blog_model','blog');
        $this->load->model('Helpful_model','help');
        $this->load->model('Documents_model','docs');
        $this->load->model('Media_model','media');
        $this->load->model('Category_model','category');
        $this->load->model('Comments_model','comments');
    }
       
	
	function news_and_blog( $offset = NULL )
	{
		//needed for sidenav
		$data->all_blogs = $this->blog->find_by_type(NULL,$limit='5',NULL);
		
		//setup pagination
	    $this->load->library('pagination');        
        $config['base_url'] = base_url() .'/resource/news_and_blog';
        $config['total_rows'] = ($this->blog->count_all());
        $config['per_page'] = 2;
        $this->pagination->initialize($config);

		//pull our data for prepping                
	    $blogs = $this->blog->find_by_type($category=NULL,$config['per_page'],$offset);
        $links = $this->pagination->create_links();
	    $categories = $this->category->find();
        	    		    
	    //let's format the date and the category id names here
	    foreach ($blogs as $b):
	    	$d = explode('-', $b->published_date);
			$b->published_date = date("F d, Y", mktime(0,0,0,$d[1],substr($d[2],0,2),$d[0]));
			foreach ($categories as $c):
				if($b->category_id == $c->id):
					$b->category_title = $c->title;
				endif;
			endforeach;
		endforeach;
				
		//load data into objects for view
		$data->links = $links;				    		
	    $data->blogs = $blogs;
	    $data->categories = $categories;
	    $data->archived = $this->blog->archived_blogs();
	    $data->comments = $this->comments->find();

		//load the main content	    
    	$layout->content = $this->load->view('resources/news_and_blog',$data,true);

    	//load the sidebar pieces for the sidebar
    	//these are the "pieces" of the sidebar you want to load  
		$piece->sb_one = $this->load->view('sidebar/consult',null,true);
		$piece->sb_two = $this->load->view('resources/subnav',null,true);
        $piece->sb_three = $this->load->view('sidebar/categories',null,true);
        $piece->sb_four = $this->load->view('sidebar/archive',null,true);
        $piece->sb_five = $this->load->view('sidebar/articles',null,true);

		//load the sidebar        
        //this is loading all those "pieces" into the view "sidebar/index" so they appear in the order you wanted        
        $layout->sidebar = $this->load->view('sidebar/index',$piece,true);

		//now take all that and load into the main layout    	
		$this->load->view('layouts/html5',$layout);
	}

	function article($id=NULL){
		//needed for the sidebar
		$data->all_blogs = $this->blog->find_by_type(NULL,$limit='5',NULL);
	
	    $categories = $this->category->find();
		$blog = $this->blog->find($id);
		$archived = $this->blog->archived_blogs();

	    //let's format the date and the category id names here
	    	$d = explode('-', $blog->published_date);
			$blog->published_date = date("F d, Y", mktime(0,0,0,$d[1],substr($d[2],0,2),$d[0]));
			foreach ($categories as $c):
				if($blog->category_id == $c->id):
					$blog->category_title = $c->title;
				endif;
			endforeach;
			    
	    $data->blog = $blog;
	    $data->comments = $this->comments->find_blog_comments($id);
	    $data->categories = $categories;
	   	$data->archived = $archived;
	   	
    	$layout->content = $this->load->view('resources/news_and_blog_single',$data,true);

    	//these are the "pieces" of the sidebar you want to load  
		$piece->sb_one = $this->load->view('sidebar/consult',null,true);
		$piece->sb_two = $this->load->view('resources/subnav',null,true);
        $piece->sb_three = $this->load->view('sidebar/categories',null,true);
        $piece->sb_four = $this->load->view('sidebar/archive',null,true);
        $piece->sb_five = $this->load->view('sidebar/articles',null,true);
        
        //this is loading all those "pieces" into the view "sidebar/index" so they appear in the order you wanted        
        $layout->sidebar = $this->load->view('sidebar/index',$piece,true);
    	
		$this->load->view('layouts/html5',$layout);
	}
	
	function category($id=NULL)
	{   
		//needed for the sidebar
		$data->all_blogs = $this->blog->find_by_type(NULL,$limit='5',NULL);
		    
	    $blogs = $this->blog->find_by_type($id);
	    $categories = $this->category->find();
        	    		    
	    //let's format the date and the category id names here
	    foreach ($blogs as $b):
	    	$d = explode('-', $b->published_date);
			$b->published_date = date("F d, Y", mktime(0,0,0,$d[1],substr($d[2],0,2),$d[0]));
			foreach ($categories as $c):
				if($b->category_id == $c->id):
					$b->category_title = $c->title;
				endif;
			endforeach;
		endforeach;
		
	    $data->blogs = $blogs;
	    $data->categories = $categories;
	    $data->comments = $this->comments->find();
	    $data->archived = $this->blog->archived_blogs();
	    
    	$layout->content = $this->load->view('resources/news_and_blog',$data,true);

    	//these are the "pieces" of the sidebar you want to load  
		$piece->sb_one = $this->load->view('sidebar/consult',null,true);
		$piece->sb_two = $this->load->view('resources/subnav',null,true);
        $piece->sb_three = $this->load->view('sidebar/categories',null,true);
        $piece->sb_four = $this->load->view('sidebar/archive',null,true);
        $piece->sb_five = $this->load->view('sidebar/articles',null,true);
        
        //this is loading all those "pieces" into the view "sidebar/index" so they appear in the order you wanted        
        $layout->sidebar = $this->load->view('sidebar/index',$piece,true);
    	
		$this->load->view('layouts/html5',$layout);	
	}
	
	function archive($month=NULL, $year=NULL)
	{
		$blogs = $this->blog->find();
		$categories = $this->category->find();

		$archived = $this->blog->archived_blogs();	    
	    foreach ($blogs as $b):
	    	$d = explode('-', $b->published_date);
			$b->published_date = date("F d, Y", mktime(0,0,0,$d[1],substr($d[2],0,2),$d[0]));
			foreach ($categories as $c):
				if($b->category_id == $c->id):
					$b->category_title = $c->title;
				endif;
			endforeach;
		endforeach;
		
		$data->all_blogs = $this->blog->find();
	    $data->blogs = $blogs;
	    $data->categories = $categories;
	    $data->comments = $this->blog->find();
	    $data->archived = $archived;

    	$layout->content = $this->load->view('resources/archived',$data,true);
    	
    	//these are the "pieces" of the sidebar you want to load  
		$piece->sb_one = $this->load->view('sidebar/consult',null,true);
		$piece->sb_two = $this->load->view('resources/subnav',null,true);
        $piece->sb_three = $this->load->view('sidebar/categories',null,true);
        $piece->sb_four = $this->load->view('sidebar/archive',null,true);
        $piece->sb_five = $this->load->view('sidebar/articles',null,true);
        
        //this is loading all those "pieces" into the view "sidebar/index" so they appear in the order you wanted        
        $layout->sidebar = $this->load->view('sidebar/index',$piece,true);
    	
		$this->load->view('layouts/html5',$layout);		
	}
	function helpful_links()
	{
	    $data->links = $this->help->find();
	    $blogs = $this->blog->find_by_type();
	    $categories = $this->category->find();
        	    		    
	    //let's format the date and the category id names here
	    foreach ($blogs as $b):
	    	$d = explode('-', $b->published_date);
			$b->published_date = date("F d, Y", mktime(0,0,0,$d[1],substr($d[2],0,2),$d[0]));
			foreach ($categories as $c):
				if($b->category_id == $c->id):
					$b->category_title = $c->title;
				endif;
			endforeach;
		endforeach;
		
	    $data->blogs = $blogs;

    	$layout->content = $this->load->view('resources/helpful_links',$data,true);
    	
    	//these are the "pieces" of the sidebar you want to load  
        $piece->sb_one = $this->load->view('sidebar/consult',null,true);
        $piece->sb_two = $this->load->view('resources/subnav',null,true);
        $piece->sb_three = $this->load->view('sidebar/news',$data,true);
        
        //this is loading all those "pieces" into the view "sidebar/index" so they appear in the order you wanted        
        $layout->sidebar = $this->load->view('sidebar/index',$piece,true);
    	
		$this->load->view('layouts/html5',$layout);
	}

	function documents()
	{
	    $data->docs = $this->docs->find();
	    $blogs = $this->blog->find_by_type();
	    $categories = $this->category->find();
        	    		    
	    //let's format the date and the category id names here
	    foreach ($blogs as $b):
	    	$d = explode('-', $b->published_date);
			$b->published_date = date("F d, Y", mktime(0,0,0,$d[1],substr($d[2],0,2),$d[0]));
			foreach ($categories as $c):
				if($b->category_id == $c->id):
					$b->category_title = $c->title;
				endif;
			endforeach;
		endforeach;
		
	    $data->blogs = $blogs;    	$layout->content = $this->load->view('resources/documents',$data,true);
    	
    	//these are the "pieces" of the sidebar you want to load  
        $piece->sb_one = $this->load->view('sidebar/consult',null,true);
        $piece->sb_two = $this->load->view('resources/subnav',null,true);
        $piece->sb_three = $this->load->view('sidebar/news',$data,true);
        
        //this is loading all those "pieces" into the view "sidebar/index" so they appear in the order you wanted        
        $layout->sidebar = $this->load->view('sidebar/index',$piece,true);
    	
		$this->load->view('layouts/html5',$layout);
	}	
	
	function videos_and_media( $offset = NULL )
	{
		//needed for the sidebar
		$data->all_videos = $this->media->find_by_type(NULL,$limit='5',NULL);
			
		//setup pagination
	    $this->load->library('pagination');        
        $config['base_url'] = base_url() .'/resource/videos_and_media';
        $config['total_rows'] = ($this->media->count_all());
        $config['per_page'] = 2;
        $this->pagination->initialize($config);

		//pull our data for prepping                
	    $videos = $this->media->find_by_type($config['per_page'],$offset);
        $links = $this->pagination->create_links();
	    $blogs = $this->blog->find_by_type();
        	    		    
	    //let's format the date
	    foreach ($videos as $v):
	    	$d = explode('-', $v->created);
			$v->created = date("F d, Y", mktime(0,0,0,$d[1],substr($d[2],0,2),$d[0]));
		endforeach;
					           	    		    
	    //let's format the date
	    foreach ($blogs as $b):
	    	$d = explode('-', $b->published_date);
			$b->published_date = date("F d, Y", mktime(0,0,0,$d[1],substr($d[2],0,2),$d[0]));
		endforeach;
		
	    $data->blogs = $blogs;
		$data->links = $links;				    		
		$data->videos = $videos;
    	$layout->content = $this->load->view('resources/videos_and_media',$data,true);
    	
    	//these are the "pieces" of the sidebar you want to load  
		$piece->sb_one = $this->load->view('sidebar/consult',null,true);
		$piece->sb_two = $this->load->view('resources/subnav',null,true);
        $piece->sb_three = $this->load->view('sidebar/videos',null,true);
        $piece->sb_four = $this->load->view('sidebar/news',null,true);
        
        //this is loading all those "pieces" into the view "sidebar/index" so they appear in the order you wanted        
        $layout->sidebar = $this->load->view('sidebar/index',$piece,true);
    	
		$this->load->view('layouts/html5',$layout);
	}
	
	function video($id=NULL)
	{
	    $blogs = $this->blog->find_by_type();
        	    		    
	    //let's format the date
	    foreach ($blogs as $b):
	    	$d = explode('-', $b->published_date);
			$b->published_date = date("F d, Y", mktime(0,0,0,$d[1],substr($d[2],0,2),$d[0]));
		endforeach;
		
	    $data->blogs = $blogs;
	    
		//needed for the sidebar
		$data->all_videos = $this->media->find_by_type(NULL,$limit='5',NULL);
	
		$video = $this->media->find($id);

	    //let's format the date
	    	$d = explode('-', $video->created);
			$video->created = date("F d, Y", mktime(0,0,0,$d[1],substr($d[2],0,2),$d[0]));
			    
	    $data->video = $video;

    	$layout->content = $this->load->view('resources/video',$data,true);
    	
    	//these are the "pieces" of the sidebar you want to load  
		$piece->sb_one = $this->load->view('sidebar/consult',null,true);
		$piece->sb_two = $this->load->view('resources/subnav',null,true);
        $piece->sb_three = $this->load->view('sidebar/videos',null,true);
        $piece->sb_four = $this->load->view('sidebar/news',null,true);
        
        //this is loading all those "pieces" into the view "sidebar/index" so they appear in the order you wanted        
        $layout->sidebar = $this->load->view('sidebar/index',$piece,true);
    	
		$this->load->view('layouts/html5',$layout);	   		
	}

}
