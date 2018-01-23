<?php

require 'model/database.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Controller {

    public $model;

    public function __construct() {
        $this->model = new Model();
    }

    public function invoke() {

        // no special book is requested, we'll show a list of all available books  
        /* @var $emloyees type */
        $emloyees = $this->model->get_all_employee();
        require_once('../view/view_div.php');
    }

}
