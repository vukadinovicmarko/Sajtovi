<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of smestajModel
 *
 * @author Marko
 */
class smestajModel extends CI_Model {
    //put your code here
    
    
    public function dohvatiSmestaj($id){
        $upit = $this->db->select('*')
                ->from('smestaj')
                ->join('slobodni_smestaji','smestaj.id_smestaja = slobodni_smestaji.id_smestaja')
                ->join('drzava','smestaj.id_drzave = drzava.id_drzave')
                ->where('smestaj.id_smestaja',$id)
                ->get();
        return $upit->result_array();
    }
}
