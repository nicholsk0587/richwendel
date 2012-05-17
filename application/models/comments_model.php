<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comments_model extends MY_Model {
    
    var $table = 'comments';
    
    var $hidden = array('created','modified');
 
    function __construct()
    {
        parent::__construct();

    }
    
    function find_blog_comments($blog_id,$limit=NULL,$offset=NULL)
    {
        if( ! empty($blog_id) ):
            $this->db->where('blog_id',$blog_id);
        endif;
        
        if( ! empty($limit) ):
            $this->db->limit($limit,$offset);
        endif;
        
        $this->db->order_by("created", "desc");
        
        $query = $this->db->get($this->table);
                
        $data = $query->result();
        
        
        return $data;  
        
    }

}