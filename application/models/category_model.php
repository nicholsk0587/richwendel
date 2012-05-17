<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category_model extends MY_Model {
    
    var $table = 'category';
    
    var $hidden = array('created','modified');
 
    function __construct()
    {
        parent::__construct();

    }

}