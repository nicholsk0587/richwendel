<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog_model extends MY_Model {
    
    var $table = 'blog';
    
    var $hidden = array('created','modified');
 
    function __construct()
    {
        parent::__construct();

    }


    function find_by_type($category = NULL, $limit = NULL, $offset = NULL)
    {
         if( ! empty($category) ):
            $this->db->where('category_id',$category);
        endif;
        
        if( ! empty($limit) ):
            $this->db->limit($limit,$offset);
        endif;
        
        $this->db->order_by("published_date", "desc");
        
        $query = $this->db->get($this->table);
                
        $data = $query->result();
        
        
        return $data;  
        
    }
    
    function count_all()
    {
        $this->db->select('*');
        $this->db->from($this->table);
        
        $data = $this->db->count_all_results();
        
        return $data;       
    }
    
	function archived_blogs()
	{        
        $query = $this->db->get($this->table);
                
        $result = $query->result();
		$new_array = array();
		
		foreach ($result as $r):
			$d = explode('-', $r->published_date);
			$month = date("F Y", mktime(0,0,0,$d[1],substr($d[2],0,2),$d[0]));
			$year = date("Y", mktime(0,0,0,$d[1],substr($d[2],0,2),$d[0]));
			$day = date("d", mktime(0,0,0,$d[1],substr($d[2],0,2),$d[0]));
			
			$new_array[$month][$r->id]['id'] = $r->id;
			$new_array[$month][$r->id]['title'] = $r->title;
			$new_array[$month][$r->id]['published_date'] = $r->published_date;
			$new_array[$month][$r->id]['author'] = $r->author;
			$new_array[$month][$r->id]['body'] = $r->body;
			$new_array[$month][$r->id]['category_id'] = $r->category_id;
			$new_array[$month][$r->id]['image_path'] = $r->image_path;

		endforeach;        
        return $new_array;  	
	}

}