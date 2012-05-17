<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Media_model extends MY_Model {
    
    var $table = 'media';
    
    var $hidden = array('created','modified');
 
    function __construct()
    {
        parent::__construct();

    }
    
    function find_by_type($limit = NULL, $offset = NULL)
    {
        
        if( ! empty($limit) ):
            $this->db->limit($limit,$offset);
        endif;
        
        $this->db->order_by("created", "desc");
        
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

}