<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Model extends CI_Model {


    function __construct()
    {
        parent::__construct();
        $this->load->database();
        //$this->load->library(array('encrypt', 'session'));
    }


    function find($value = NULL, $field = 'id',$limit = NULL,$order=NULL){
    
        if($this->db->field_exists('sort_order',$this->table)):   
            $this->db->order_by('sort_order','asc');
        endif;
        
        if($this->db->field_exists('publish_date',$this->table)):   
            $this->db->order_by('publish_date','desc');
        elseif ($this->db->field_exists('created',$this->table)):
            $this->db->order_by('created','desc');  
        else:
            $this->db->order_by('id','desc');          	      	
        endif;
    
        if( ! empty($value) && !empty($field) ):
            $this->db->where($field,$value);
        endif;
        
        if( ! empty($limit) ):
            $this->db->limit($limit);
        endif;
        $query = $this->db->get($this->table);

        if ($field == 'id' && !empty($value)):
                
        $data = $query->row();
        else:
        $data = $query->result();
        endif;        
                
        return $data;  
        
    }
    
    function update($id)
    {
        foreach($_POST as $n => $v):
            if($this->db->field_exists($n, $this->table)):
            $data[$n] = $this->input->post($n,TRUE);
            endif;
        endforeach;
            
        if($this->db->field_exists('modified',$this->table)):   
            $data['modified'] = date('Y-m-d H:i:s');
        endif;
        			
		$new_password = $this->input->post('new_password', TRUE);

		if(!empty($new_password)):
			$this->load->library('encrypt');			
			$data['password'] = $this->encrypt->encode( $new_password );
        endif;
        
        if($this->db->field_exists('image_path',$this->table)): 
            $config['upload_path'] = './resources/uploads/img/';
		    $config['allowed_types'] = 'gif|jpg|png|pdf|bmp';

		    $this->load->library('upload', $config);
		    
		    if ($this->upload->do_upload('image_path')):
                $row = $this->find($id);
        		if($row->image_path):
            		if(is_file($row->image_path)){ 
            		unlink($row->image_path);
            		}
        		endif;                    	
                $upload_data = $this->upload->data();			
                $data['image_path'] = '/resources/uploads/img/'.$upload_data['file_name'];
            endif;
                      			
        endif; 
        
        if($this->db->field_exists('pdf_path',$this->table)): 
            $config['upload_path'] = './resources/uploads/pdf/';
		    $config['allowed_types'] = 'pdf';

		    $this->load->library('upload', $config);
		    
		    if ($this->upload->do_upload('pdf_path')):
                $row = $this->find($id);
        		if($row->pdf_path):
            		if(is_file($row->pdf_path)){ 
            		unlink($row->pdf_path);
            		}
        		endif;                    	
                $upload_data = $this->upload->data();			
                $data['pdf_path'] = '/resources/uploads/pdf/'.$upload_data['file_name'];
            endif;
                      			
        endif;
        
        if($this->db->field_exists('video_path',$this->table)): 
            $config['upload_path'] = './resources/uploads/videos/';
		    $config['allowed_types'] = 'avi|mov|mp4|mp3|mpeg';

		    $this->load->library('upload', $config);
		    
		    if ($this->upload->do_upload('video_path')):
                $row = $this->find($id);
        		if($row->video_path):
            		if(is_file($row->video_path)){ 
            		unlink($row->video_path);
            		}
        		endif;                    	
                $upload_data = $this->upload->data();			
                $data['video_path'] = '/resources/uploads/videos/'.$upload_data['file_name'];
            endif;
                      			
        endif;
                
        $this->db->update($this->table,$data,array('id'=>$id));
    }

    function insert()
	{
		foreach($_POST as $n => $v):
            if($this->db->field_exists($n,$this->table)):
            $data[$n] = $this->input->post($n,TRUE);
            endif;
        endforeach;
                 
        if($this->db->field_exists('created',$this->table)):   
            $data['created'] = date('Y-m-d H:i:s');
        endif;
        
       	if($this->db->field_exists('password',$this->table)):   
			$this->load->library('encrypt');
			$password = $this->input->post('password', TRUE);
			
			$data['password'] = $this->encrypt->encode( $password );
        endif;
        
        if($this->db->field_exists('image_path',$this->table)):            
            $config['upload_path'] = './resources/uploads/img/';
		    $config['allowed_types'] = 'gif|jpg|png|bmp';

		    $this->load->library('upload', $config);
		    
		    if ($this->upload->do_upload('image_path')):
		       	//show_error('Error: You must upload a file');
                //show_error($this->upload->display_errors());
            //else:
                $upload_data = $this->upload->data();			
                $data['image_path'] = 'resources/uploads/img/' .$upload_data['file_name'];
                
            endif;
                      			
        endif;

        if($this->db->field_exists('pdf_path',$this->table)):            
            $config['upload_path'] = './resources/uploads/pdf/';
		    $config['allowed_types'] = 'gif|jpg|png|bmp|pdf';

		    $this->load->library('upload', $config);
		    
		    if ($this->upload->do_upload('pdf_path')):
		       	//show_error('Error: You must upload a file');
                //show_error($this->upload->display_errors());
            //else:
                $upload_data = $this->upload->data();			
                $data['pdf_path'] = 'resources/uploads/pdf/' .$upload_data['file_name'];
                
            endif;
                      			
        endif;

        if($this->db->field_exists('video_path',$this->table)):            
            $config['upload_path'] = './resources/uploads/videos/';
		    $config['allowed_types'] = 'mpeg|mpg|mpe|qt|mov|avi|movie';

		    $this->load->library('upload', $config);
		    
		    if ($this->upload->do_upload('video_path')):
		       	//show_error('Error: You must upload a file');
                //show_error($this->upload->display_errors());
            //else:
                $upload_data = $this->upload->data();			
                $data['video_path'] = 'resources/uploads/videos/' .$upload_data['file_name'];
                $data['file_type'] = $upload_data['file_type'];                
            endif;
                      			
        endif;        
        
        $this->db->insert($this->table,$data);
    }
    
    function delete()
    {
    
        foreach($_POST as $n => $v):
            if($this->db->field_exists($n, $this->table)):
            $data[$n] = $this->input->post($n,TRUE);
            endif;
        endforeach;
        
        if($this->db->field_exists('image_path',$this->table)):
           if(is_file($table->image_path)){ unlink($table->image_path);}
        endif; 
        
        if($this->db->field_exists('pdf_path',$this->table)):
           if(is_file($table->pdf_path)){ unlink($table->pdf_path);}
        endif; 
        
        if($this->db->field_exists('video_path',$this->table)):
           if(is_file($table->video_path)){ unlink($table->video_path);}
        endif; 

        $id = $data['id'];     
    
        $this->db->limit(1);
        $this->db->delete($this->table,array('id'=>$id));

    }
    
  	function delete_image($id)
  	{
		$data = array(
               'image_path' => ''
            );

		$this->db->where('id', $id);
		$this->db->update($this->table, $data); 
    }

}
?>