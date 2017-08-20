<?php

class AdministracijaModel extends CI_Model
{
    /*

        --------------- KORISNICI ---------------------

    */
    public function get_korisnici(){
        $upit = $this->db
            ->select('id_korisnika,korisnicko_ime,mail_korisnika,naziv_uloge')
            ->from('korisnici')
            ->join("uloge",'korisnici.id_uloge = uloge.id_uloge')
            ->get();
        $rezultat = $upit->result_array();
        return $rezultat;
    }
    public function get_korisnik($id){
        $upit = $this->db
            ->select('id_korisnika,korisnicko_ime,mail_korisnika,naziv_uloge')
            ->from('korisnici')
            ->join("uloge",'korisnici.id_uloge = uloge.id_uloge')
            ->where('korisnici.id_korisnika',$id)
            ->get();
        $rezultat = $upit->row_array();
        return $rezultat;
    }
    public function edit_korisnici($korisnikId,$data){
        $this->db->where('id_korisnika',$korisnikId);
       return $this->db->update('korisnici',$data);
    }
    public function insert_korisnici($ime,$sifra,$email,$id_uloge){
        $data = array(
            'korisnicko_ime' =>$ime,
            'sifra_korisnika' => $sifra,
            'mail_korisnika' => $email,
            'id_uloge' => $id_uloge
        );
        
        return $this->db->insert('korisnici',$data);

    }
    public function delete_korisnici($korisnikId){
        return $this->db->delete('korisnici', array('id_korisnika' => $korisnikId));

    }

    /*

        --------------- LINKOVI ---------------------

    */
    public function get_linkovi(){
        return $this->db->get('linkovi')->result_array();
    }
    public function edit_linkovi($linkId, $data){

    }
    public function insert_linkovi($data){

    }
    public function delete_linkovi($linkId){

    }

    /*

        --------------- MENI  ---------------------

    */
    public function get_meni(){
        return $this->db->get('meni')->result_array();
    }
    public function edit_meni($meniId, $data){

    }
    public function insert_meni($data){

    }
    public function delete_meni($meniId){

    }
    /*

        --------------- REZERVACIJE  ---------------------

    */
    public function get_rezervacije(){

    }
    public function edit_rezervacije($rezervacijeId, $data){

    }
    public function insert_rezervacije($data){

    }
    public function delete_rezervacije($rezervacijeId){

    }
    /*

        --------------- PROMO  ---------------------

    */
    public function get_promo(){
        $upit = $this->db
                ->select('id_promo,naziv_promo,pozicija,datum_dodavanja,datum_isteka')
                ->from('promo')
                ->get();
        $rezultat = $upit->result_array();
        if($rezultat){
            return $rezultat;
        }

    }
    public function get_promocija($id){
        $upit = $this->db
                ->select('id_promo,naziv_promo,naziv,pozicija,promo.datum_dodavanja,promo.datum_isteka')
                ->from('promo')
                ->join('slobodni_smestaji','promo.id_slobodni_smestaji = slobodni_smestaji.id_slobodni_smestaji')
                ->join('smestaj','slobodni_smestaji.id_smestaja = smestaj.id_smestaja ')
                ->where('promo.id_promo',$id)
                ->get();
        $rezultat = $upit->result_array();
        if($rezultat){
            return $rezultat;
        }

    }
    public function edit_promo($promoId, $data){
        return $this->db->get('slider')->result_array();

    }
    public function insert_promo($data){

    }
    public function delete_promo($promoId){

    }
    /*

        --------------- SLIDER  ---------------------

    */
    public function get_slider(){
        return $this->db->select("id_slider,naziv")->get('slider')->result_array();
    }
    public function edit_slider($sliderId, $data){

    }
    public function insert_slider($data){
        $this->db->insert('slider',$data);
        return $this->db->insert_id();

    }
    public function delete_slider($sliderId){

    }
    public function insert_slider_slike($data){
        return $this->db->insert('slider_slike_za_slider',$data);
    }
    /*

        --------------- SLIKE  ---------------------

    */
    public function get_slike(){
        return $this->db->select("id_slike,naslov,podnaslov,slika")->get('slike_za_slider')->result_array();
    }
    public function edit_slike($slikeId, $data){

    }
    public function insert_slike($data){
        return $this->db->insert('slike_za_slider',$data);
    }
    public function delete_slike($slikeId){

    }
    /*

        --------------- SLOBODNI SMESTAJ  ---------------------

    */
    public function get_slobodni_smestaj(){

    }
    public function edit_slobodni_smestaj($ssId, $data){

    }
    public function insert_slobodni_smestaj($data){

    }
    public function delete_slobodni_smestaj($ssId){

    }

    /*

        --------------- SMESTAJ  ---------------------

    */
    public function get_smestaj(){

    }
    public function edit_smestaj($sId, $data){

    }
    public function insert_smestaj($data){

    }
    public function delete_smestaj($sId){

    }


    /*

        --------------- TIP SMESTAJA  ---------------------

    */
    public function get_tip_smestaj(){

    }
    public function edit_tip_smestaj($tip_sId, $data){

    }
    public function insert_tip_smestaj($data){

    }
    public function delete_tip_smestaj($tip_sId){

    }
    /*

        --------------- TIP SEZONE  ---------------------

    */
    public function get_tip_sezone(){

    }
    public function edit_tip_sezone($tip_sezoneId, $data){

    }
    public function insert_tip_sezone($data){

    }
    public function delete_tip_sezone($tip_sezoneId){

    }

}