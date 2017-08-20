<?php


class Backend_Controller extends CI_Controller{

    public function __construct(){
        parent::__construct();
        
    }
    public function load_view($views,$title){
        $this->load->view('/administracija/header_admin', $title);
        foreach($views as $view) $this->load->view($view);
        $this->load->view('footer');
    }
    
}

