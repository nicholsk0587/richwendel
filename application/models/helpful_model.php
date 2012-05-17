<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Helpful_model extends MY_Model {
    
    var $table = 'helpful';
    
    var $hidden = array('created','modified');
 
    function __construct()
    {
        parent::__construct();

    }

}