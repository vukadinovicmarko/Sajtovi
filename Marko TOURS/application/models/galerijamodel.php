<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of galerijaModel
 *
 * @author Marko
 */
class galerijaModel extends CI_Model {
    //put your code here
    
    
    public function dohvatiGalerije(){
        $upit = $this->db->get('galerija');
        return $upit->result_array();
    }
    public function dohvatiGaleriju($id){
        $upit = $this->db->select('*')
                ->from('galerija_slike')
                ->join('galerija','galerija_slike.id_galerije = galerija.id_galerija')
                ->where('galerija_slike.id_galerije',$id)
                ->get();
        return $upit->result_array();
    }
    
    public function dohvatiGalerijeAdmin(){
        $upit = $this->db->select('id_galerija,naziv')
                ->from('galerija')
                ->get();
        return $upit->result_array();
    }
    
    
    
}
