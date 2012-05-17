<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {


    function __construct()
       {
            parent::__construct();
            $this->request = $_SERVER['REQUEST_METHOD'];
            $this->load->model('Category_model','category');
            //$this->output->enable_profiler(TRUE);
            $this->debug = FALSE;
        
       }
    

	function _remap($method)
    {
    	//echo '<pre>' . print_r($this->session->userdata('level'),1) . '</pre>';
        if ($this->session->userdata('level') != 'admin'):
            redirect('users/login');
        endif;
                                
        if($method == 'index'):

            $data->tables = $this->db->list_tables();
            $this->load->view('admin/index',$data);
            
        else:

            switch($this->request): 
            
                case 'POST':
                
                    $id = $this->input->post('id',TRUE);
                    $delete = $this->input->post('delete',TRUE);
                    $this->load->model( $method . '_model',$method);
                    $data->debug = $this->debug;
                    
                    if($id):
                        if($delete == 'DELETE'):
                            $this->$method->delete($id);
                        else:
                            $this->load->view('validation/admin/' . $method );
                            if( $this->form_validation->run() == TRUE ):
                                $this->$method->update($id);
                            endif;
                        endif;
                        redirect('/admin/' . $method . '/' );
                    else:
                        $search = $this->input->post('search',TRUE);
                        if($search):
                            
                            $data->method = $method;
                            $data->page_title = $method . ' administration';
                            
                            $data->tables = $this->db->list_tables(); 

                            $data->search_value = $this->input->post($search,TRUE);
                            $data->search = $this->load->view('admin/' . $method . '/search',$data,true);
                            $data->records = $this->$method->search($data->search_value,$search);
                            
                            $this->load->view('layouts/admin_header',$data);
                            $this->load->view('admin/'.$method.'/table',$data);
                            $this->load->view('layouts/admin_footer',$data); 
                            
                        else:
                            $data->method = $method;
                            $data->tables = $this->db->list_tables();
                    
                            $this->load->view('validation/admin/' . $method );                         
                            if( $this->form_validation->run() == TRUE ):
                                $this->$method->insert();
                                redirect('/admin/' . $method . '/' ); 
                            else:
                                
                                $data->page_title = $method;
                                $data->page_action = 'Add';
          
                                $this->load->view('layouts/admin_header',$data);
                                $this->load->view('validation/admin/' . $method );
                        		$this->load->view('admin/' . $method . '/form',$data); 
                                $this->load->view('layouts/admin_footer',$data);                                    
                            endif;
                        endif;           
                    endif;
                                                                                            
                break;
                
                case 'GET':
    
                    $id = $this->uri->segment(4);
                    $action = $this->uri->segment(3);
                    $data->debug = $this->debug;
                    $this->load->model( $method . '_model',$method);
                     
                    $data->method = $method;
                    $data->tables = $this->db->list_tables();
                    $data->fields = $this->db->list_fields($method);
                    $data->category = $this->category->find();
                    
                    if($action == 'edit'):
                        $data->record = $this->$method->find($id);
                        $data->page_title = $method;
                        $data->page_action = 'Edit';
  
                        $this->load->view('layouts/admin_header',$data);
                        $this->load->view('validation/admin/' . $method );                          
                        $this->load->view('admin/' . $method . '/form',$data); 
                        $this->load->view('layouts/admin_footer',$data); 
                        
                    elseif($action == 'add'):
                        $data->record = $this->$method->find();
                        $data->page_title = $method;
                        $data->page_action = 'Add';
  
                        $this->load->view('layouts/admin_header',$data);
                        $this->load->view('validation/admin/' . $method );
                        $this->load->view('admin/' . $method . '/form',$data); 
                        $this->load->view('layouts/admin_footer',$data); 

                    else:
                        
                        $data->search_value = NULL;
                        $data->search = $this->load->view('admin/' . $method . '/search',$data,true);
                                        
                        $data->records = $this->$method->find();
                        
                        $this->load->view('layouts/admin_header',$data);
                        $this->load->view('admin/'.$method.'/table',$data);
                        $this->load->view('layouts/admin_footer',$data); 
                    endif;
    
                break;
                default:
            
            endswitch;
            


        endif;    
    }
      	
}
