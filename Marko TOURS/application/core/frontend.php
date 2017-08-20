<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Frontend_Controller extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function load_view($views, $title){
        $this->load->view('header', $title);
        foreach ($views as $view) {$this->load->view($view);}
        $this->load->view('footer');
    }
    
}