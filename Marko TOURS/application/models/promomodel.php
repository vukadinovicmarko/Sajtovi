<?php

class promoModel extends CI_Model
{
    public function dohvatiPonude($promoId){
        $promoSmestaji = $this->db->select('*')
            ->from('linkovi_slobodni_smestaji')
            ->join('slobodni_smestaji','linkovi_slobodni_smestaji.id_slobodni_smestaji	 = slobodni_smestaji.id_slobodni_smestaji')
            ->join('smestaj','slobodni_smestaji.id_smestaja = smestaj.id_smestaja')
            ->join('linkovi','linkovi_slobodni_smestaji.id_link = linkovi.id_link')
            ->where("linkovi_slobodni_smestaji.id_link", $promoId)
            ->order_by("slobodni_smestaji.kraj_sezone asc , slobodni_smestaji.datum_dodavanja desc")
            ->get();
        $res = $promoSmestaji->result_array();
        return  $res;
    }
}	