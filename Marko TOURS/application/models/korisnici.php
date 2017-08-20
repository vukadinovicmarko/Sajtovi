<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of korisnici
 *
 * @author Marko
 */
class Korisnici extends CI_Model{
    
    public function dohvatiKorisnike($user,$pass){
        
        $korisnici = $this->db->get_where('korisnici',array('korisnicko_ime' => $user, 'sifra_korisnika'=>$pass));
        $rez = $korisnici->row_array();
        if($rez){
            return $rez;
        }
        else{
            return false;
        }
    }
    public function registracija_korisnika($data){
        
        
        return $this->db->insert('korisnici',$data);

    }
    
    
    //put your code here
}
