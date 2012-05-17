<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Documents_model extends MY_Model {
    
    var $table = 'documents';
    
    var $hidden = array('created','modified');
 
    function __construct()
    {
        parent::__construct();

    }

}