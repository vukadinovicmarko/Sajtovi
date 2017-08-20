<?php

class Meni extends CI_Model
{
    public function dohvatiGlavniMeni(){
        return $this->db->get('meni')->result_array();
    }
    public function dohvatiLinkoveOdMenija($meniId){
        $meniLinkovi = $this->db->select('*')
            ->from('meni_linkovi')
            ->join('linkovi','meni_linkovi.id_link = linkovi.id_link')
            ->where("meni_linkovi.id_meni", $meniId)
            ->order_by("linkovi.pozicija", "asc")
            ->get();
        $res = $meniLinkovi->result_array();
        return  $res;
    }
    public function dohvatiIstaknuto(){
        $istaktnuto = $this->db->select('naziv_promo,id_promo')
            ->from('promo')
                ->group_by('naziv_promo')
            ->get();
            
        $res = $istaktnuto->result_array();
        return $res;
    }
    public function dohvatiIstaknutoSve(){
        $istaktnuto = $this->db->select("*")
            ->from('promo')
            ->order_by('pozicija ASC')
            ->where('datum_isteka > '.time())
            
            ->get();
        $res = $istaktnuto->result_array();
        return $res;
    }
    public function dohvatiSmestaje($nazivProvera){
        $smestaji = $this->db->select("*")
            ->from('slobodni_smestaji AS ss')
            ->join('smestaj AS s','ss.id_smestaja = s.id_smestaja')
            ->join('promo','ss.id_slobodni_smestaji = promo.id_slobodni_smestaji')
            ->where("promo.naziv_promo = '$nazivProvera'")
            ->get();
        
        $res = $smestaji->result_array();
        return $res;
    }


}