<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of anketa
 *
 * @author Marko
 */
class anketa extends CI_Model{
    //put your code here
    
    public function dohvatiAnketu(){
        $upit = $this->db
                ->select('*')
                ->from('ankete')
                ->where('ankete.id_ankete','1')
                ->get();
        return $upit->row_array();
    }
    
    public function dohvatiIteracije(){
        $upit = $this->db
                ->select('ankete_iteracije.id_iteracije,slika_iteracije,opis_iteracije')
                ->from('ankete_iteracije')
                ->join('ankete','ankete_iteracije.id_ankete = ankete.id_ankete')
                ->where('ankete.id_ankete','1')
                ->get();
        return $upit->result_array();
    }
    
    public function dohvatiOcene($id){
        $upit = $this->db
                ->select('ocena')
                ->from('ocena_iteracije')
                ->join('ankete_iteracije','ocena_iteracije.id_iteracije = ankete_iteracije.id_iteracije')
                ->where('ankete_iteracije.id_iteracije',$id)
                ->get();
        return $upit->result_array();
    }
    
    public function dohvatiBrojOcena($id){
        $upit = $this->db
                ->select('count(*)')
                ->from('ocena_iteracije')
                ->where('id_iteracije',$id)
                ->get();
        return $upit->row_array();
    }
    
    public function unesiOcenu($data){
        return $this->db->insert('ocena_iteracije',$data);
        
    }
    
    
    
    
}
