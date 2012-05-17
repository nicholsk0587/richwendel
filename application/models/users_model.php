<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_model extends MY_Model {
    
    var $table = 'users';
 
    var $hidden = array('created','modified','password');
    
     
    function __construct()
    {
        parent::__construct();

    }

	function login()
	{	
	
	    $decrypted_password =   NULL;
        $username	        =   $this->input->post('username', TRUE);
        $password           =   $this->input->post('password', TRUE);
        
        if(empty($username)):
            return FALSE;
        endif;
        
        if(empty($password)):
            return FALSE;
        endif;
        
        $user = $this->db->get_where($this->table,array('username'=> $username))->row();
			
		if(!empty($user->password)):
		      $encrypted_password = $user->password;
		      $decrypted_password = $this->encrypt->decode( $encrypted_password );
		endif;
		
		if( !empty($password) &&  $password == $decrypted_password ):

			$this->session->set_userdata('username', $user->username);
			$this->session->set_userdata('level', $user->level);
			$this->session->set_userdata('user_id', $user->id);
		
			return TRUE;
		
		else:
			
			return FALSE;
			
        endif;
	
	}

    function update_password()
    {        
        foreach($_POST as $n => $v):
            if($this->db->field_exists($n, $this->table)):
            $data[$n] = $this->input->post($n,TRUE);
            endif;
        endforeach;
            
        if($this->db->field_exists('modified',$this->table)):   
            $data['modified'] = date('Y-m-d H:i:s');
        endif;
        
        if($this->db->field_exists('password',$this->table)):   
			$password = $this->input->post('password', TRUE);
            if(!empty($password)):
                $data['password'] = $this->encrypt->encode( $password );
            else:
                unset($data['password']);
            endif;
        endif;
        
        $id = $data['id'];
        
        $this->db->update($this->table,$data,array('id'=>$id));
    }
    
    function find_password($username)
    {
        $this->db->select('*');
        $this->db->from($this->table);
                        

        $this->db->where('username', $username);
        $query = $this->db->get();
                
        $data = $query->row();
        
        
        return $data;    
    }
    
    function valid_email($email_address)
    {
        $this->db->select('*');
        $this->db->from($this->table);
                        
        if (isset ($email_address)):
            $this->db->where('username', $email_address);
		endif;
        
        $query = $this->db->get();
                
        $data = $query->row();
        
        
        return $data;    
    }    

}