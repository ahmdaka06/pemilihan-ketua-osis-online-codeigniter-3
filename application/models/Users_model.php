<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {

    private $table = 'data';
    public $id = 'id';
    public $order = 'DESC';

    function __construct(){
        parent::__construct();
    }


}