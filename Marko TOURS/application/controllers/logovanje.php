<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of logovanje
 *
 * @author Marko
 */

require(APPPATH."/core/backend_Controller.php");

class Logovanje extends Backend_Controller{
    
    public function login(){
        $is_post=$this->input->server("REQUEST_METHOD")=="POST";
        if($is_post){
        $user = $this->input->post('korisnickoIme');
        $pass = $this->input->post('korisnickiPass');
        
        $this->load->model('korisnici');
        $korisnici = $this->korisnici->dohvatiKorisnike($user,$pass);
        if($korisnici){
            $this->session->set_userdata(array("user"=>$user,"uloga"=>$korisnici));
            echo $korisnici;
        
        }
        else{
            echo "pogresno podaci";
        }
    }}
    
    public function logout(){
     $this->session->sess_destroy();
     redirect(base_url());
    }
    
    
    //put your code here
}
