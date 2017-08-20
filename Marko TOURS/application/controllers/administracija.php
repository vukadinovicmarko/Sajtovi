<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once(APPPATH."/core/backend_Controller.php");
class administracija extends backend_Controller{
    
    function __construct() {
        parent::__construct();
//        if($this->session->userdata("korisnik_uloga_id") != '1'){
//            redirect(base_url('/'));
//        }
//        $this->load->model('AdministracijaModel','a');
        echo "asd";
    }
    public function index(){
//        $views = array('administracija/administracija');
//        $title = array('title'=>'Administracija');
//        
//        $tableTemplate = array('table_open' => '<table class="table table-hover">' );
//        $this->table->set_template($tableTemplate);
//        $this->table->set_heading('#', 'Ime', 'Email', 'Uloga','Promeni','Obrisi');
//        $korisnici = $this->a->get_korisnici();
//        $result = array();
//        foreach($korisnici AS $korisnik){
//            array_push($korisnik,"<a href='promeniKorisnika/{$korisnik['id_korisnika']}'>Promeni</a>");
//            array_push($korisnik,"<a href='obrisiKorisnika/{$korisnik['id_korisnika']}'>Obrisi</a>");
//            array_push($result,$korisnik);
//        }
//        $title['korisnici'] = $this->table->generate($result);
//        $this->load_view($views,$title);
        
        echo "proba";
    }
    public function obrisiKorisnika(){
        $id = $this->uri->segment('2');
        $upit = $this->a->delete_korisnici($id);
        if($upit){
            redirect(base_url('administracija'));

        }
        echo "Hoce obrise korisnika sa id " . $this->uri->segment('2');
    }
    public function promeniKorisnika(){
        $dataView = array();
        $dataView['success_message'] = '';
        $dataView['error_message'] = '';
        if($this->input->post()){
            $email = $this->input->post('email');
            $ime = $this->input->post('ime');
            $id = $this->input->post('id');
            // update data
            $data = array(
                'korisnicko_ime' => $ime,
                'mail_korisnika' => $email
            );
            $update = $this->a->edit_korisnici($id,$data);
            if($update){
                $dataView['success_message'] = 'Uspesno ste izmenili korisnika';
            }else{
                $dataView['error_message'] = 'Doslo je do greske';
            }
        }
        $views = array('administracija/administracija');
        $dataView['title'] = 'Administracija';
        $korisnici = $this->a->get_korisnik($this->uri->segment('2'));
        
        $dataView['podaci_korisnika'] = array(
            'labels' => array(
                'id','ime','email','uloga'
            ),
            'data' => $korisnici
        );
        $this->load_view($views,$dataView);
    }
    
    public function ubaciKorisnika(){
        $ime = $this->input->post('tbImeInsert');
        $sifra = $this->input->post(('tbPassInsert'));
        $email = $this->input->post('tbEmailInsert');
        $id_uloge = $this->input->post('tbUloga');
        
        $uneseno = $this->a->insert_korisnici($ime,md5($sifra),$email,$id_uloge);
        if($uneseno){
            redirect(base_url('administracija'));
        }
    }
    public function meni(){
        $views = array('administracija/menuView');
        $title = array('title'=>'Meni');
        $tableTemplate = array('table_open' => '<table class="table table-hover">' );
        $this->table->set_template($tableTemplate);
        $this->table->set_heading('#', 'Naziv menija', 'datum dodavanja');
        $promo= $this->a->get_meni();
        $rezultat=array();
        foreach($promo AS $pro){
            array_push($pro,"<a href='promeniMeni/{$pro['id_meni']}'>Promeni</a>");
            array_push($pro,"<a href='obrisiMeni/{$pro['id_meni']}'>Obrisi</a>");
            array_push($rezultat,$pro);
        }
        // forma za dodavanje
        $forma = form_open();
        $forma .= form_label('Unesite naziv menija');
        $forma .= form_input('frm_naziv','','placeholder="Unesite naziv menija" class="form-control"');
        $forma .= form_label(' ');
        $forma .= form_submit('submit','Dodaj','class="form-control"');
        $forma .= form_close();
        $title['forma'] = $forma;
        $title['tabela_meni']= $this->table->generate($rezultat);
        $this->load_view($views,$title);
    }
    public function linkovi(){
        $views = array('administracija/linkoviView');
        $title = array('title'=>'Linkovi');
        $tableTemplate = array('table_open' => '<table class="table table-hover">' );
        $this->table->set_template($tableTemplate);
        $this->table->set_heading('#', 'Naziv linka', 'Pozicija');
        $promo= $this->a->get_linkovi();
        $rezultat=array();
        $options = array();
        $i=0;
        foreach($promo AS $pro){
            array_push($pro,"<a href='promeniLink/{$pro['id_link']}'>Promeni</a>");
            array_push($pro,"<a href='obrisiLink/{$pro['id_link']}'>Obrisi</a>");
            array_push($rezultat,$pro);
            $i++;
            $options[$i] = $i;
        }
        $i++;
        $options[$i] = $i;
        // forma za dodavanje
        $forma = form_open();
        $forma .= form_label('Unesite naziv linka');
        $forma .= form_input('frm_naziv','','placeholder="Unesite naziv linka" class="form-control"');
        $forma .= form_label('Izaberite poziciju');
        $forma .= form_dropdown('frm_pozicija',$options,array($i),' class="form-control text-center"');
        $forma .= form_label(' ');
        $forma .= form_submit('submit','Dodaj','class="form-control"');
        $forma .= form_close();
        $title['forma'] = $forma;
        $title['tabela_linkovi']= $this->table->generate($rezultat);
        $this->load_view($views,$title);
    }
    
    public function prikaziPromo(){
        $views = array('administracija/promoView');
        $title = array('title'=>'Promo');
        $tableTemplate = array('table_open' => '<table class="table table-hover">' );
        $this->table->set_template($tableTemplate);
        $this->table->set_heading('#', 'nazivPromo' ,'Pozicija', 'Datum dodavanja','Datum isteka','Promeni','Obrisi');
        $promo= $this->a->get_promo();
        $rezultat=array();
        $options = array();
        $i=0;
        foreach($promo AS $pro){
            $niz=array();
            foreach($pro AS $nazivKolone => $vrednostKolone){
                if($nazivKolone == 'datum_dodavanja' || $nazivKolone == 'datum_isteka'){
                    array_push($niz,date('d-m-Y',$vrednostKolone));
                }else {
                    array_push($niz, $vrednostKolone);
                }
            }
            $i++;
            $options[$i] = $i;
            array_push($niz,"<a href='promeniPromo/{$pro['id_promo']}'>Promeni</a>");
            array_push($niz,"<a href='obrisiKorisnika/{$pro['id_promo']}'>Obrisi</a>");
            array_push($rezultat,$niz);
        }
        $i++;
        $options[$i] = $i;
        // forma za dodavanje
        $forma = form_open();
        $forma .= form_label('Unesite naziv promocije');
        $forma .= form_input('frm_naziv','','placeholder="Unesite naziv promocije" class="form-control"');
        $forma .= form_label('Izaberite poziciju');
        $forma .= form_dropdown('frm_pozicija',$options,array($i),' class="form-control text-center"');
        $forma .= form_label(' ');
        $forma .= form_submit('submit','Dodaj','class="form-control"');
        $forma .= form_close();
        $title['forma'] = $forma;
        $title['promo']= $this->table->generate($rezultat);
        $this->load_view($views,$title);
    }
    
    public function promeniPromo(){
        $dataView = array();
        $dataView['success_message'] = '';
        $dataView['error_message'] = '';
        $views = array('administracija/promoView');
        $dataView['title'] = 'Promocije';
        $promocije = $this->a->get_promocija($this->uri->segment('3'));
        
        $dataView['promocije'] = $promocije;
        
        $this->load_view($views,$dataView);
    }

    public function anketa(){
        $views = array('administracija/anketa');
        $dataView['title'] = 'Anketa';
        $this->load_view($views,$dataView);
    }
    public function galerija(){
        $views = array('administracija/galerija');
        $dataView['title'] = 'Galerija';
        $this->load->model('galerijaModel','g');
        $dataView['galerije'] = $this->g->dohvatiGalerijeAdmin();
        $galerije = $dataView['galerije'];
        
        $tableTemplate = array('table_open' => '<table class="table table-hover">');
        $this->table->set_template($tableTemplate);
        $this->table->set_heading('#', 'Naziv','Promeni','Obrisi');
        
        $result = array();
        foreach($galerije AS $galerija){
            array_push($galerija,"<a href='promeniGaleriju/{$galerija['id_galerija']}'>Promeni</a>");
            array_push($galerija,"<a href='obrisiGaleriju/{$galerija['id_galerija']}'>Obrisi</a>");
            array_push($result,$galerija);
        }
        $dataView['table'] = $this->table->generate($result);
        
        
        $this->load_view($views,$dataView);

    }
    public function rezervacije(){
        $views = array('administracija/rezervacije');
        $dataView['title'] = 'Rezervacije';
        $this->load_view($views,$dataView);

    }
    public function sezone(){
        $views = array('administracija/sezone');
        $dataView['title'] = 'Sezone';
        $this->load_view($views,$dataView);
    }
    public function slider(){

        if($this->input->post()){
            $naziv = $this->input->post('frm_naziv');
            $slike = $this->input->post('frm_slike');
            $data = array('naziv'=>$naziv);
            $insert = $this->a->insert_slider($data);
            if(is_numeric($insert)){
                // spoji slider i slike
                foreach($slike AS $slika){
                    $dataSlike = array(
                        'id_slider' => $insert,
                        'id_slike' => $slika
                    );
                    $insertSlike = $this->a->insert_slider_slike($dataSlike);
                }
                if($insertSlike) {
                    redirect(base_url('/administracija/slider'));
                }
            }
        }
        else {
            $views = array('administracija/slider');
            $dataView['title'] = 'Slider';
            $promo = $this->a->get_meni();
            $tableTemplate = array('table_open' => '<table class="table table-hover">');
            $this->table->set_template($tableTemplate);
            $this->table->set_heading('#', 'Naziv','Promeni','Obrisi');
            $promo = $this->a->get_slider();
            $slike = $this->a->get_slike();
            $rezultat = array();
            foreach ($promo AS $pro) {
                array_push($pro, "<a href='promeniMeni/{$pro['id_slider']}'>Promeni</a>");
                array_push($pro, "<a href='obrisiMeni/{$pro['id_slider']}'>Obrisi</a>");
                array_push($rezultat, $pro);
            }
            $sliderSlike = array();
            foreach($slike AS $slika){
                $sliderSlike[$slika['id_slike']] = $slika['naslov'];
            }
            $dataView['tabela'] = $this->table->generate($rezultat);
            // forma za dodavanje
            $forma = form_open();
            $forma .= form_label('Unesite naziv slidera');
            $forma .= form_input('frm_naziv', '', 'placeholder="Unesite naziv slidera" class="form-control"');
            $forma .= form_label('Izaberite slike');
            $forma .= form_multiselect('frm_slike[]',$sliderSlike,'', 'class="form-control"');
            $forma .= form_label(' ');
            $forma .= form_submit('submit', 'Dodaj', 'class="form-control"');
            $forma .= form_close();
            $dataView['forma'] = $forma;
            $this->load_view($views, $dataView);
        }
    }

    public function slike(){
        $dataView = array();
        if($this->input->post()){
            $naziv = $this->input->post('frm_naziv');
            $opis = $this->input->post('frm_opis');
            $config['upload_path'] = 'assets/images/homePozadina/';
            $config['allowed_types'] = 'gif|jpg|png|JPG';
            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('frm_slika'))
            {
                $dataView['error'] = $this->upload->display_errors();
            }else {
                $uploadData = $this->upload->data();
                // insert to db
                $data = array(
                    'naslov' => $naziv,
                    'podnaslov' => $opis,
                    'slika' => '/'.$config['upload_path'].$uploadData['orig_name']

                );
                $insert = $this->a->insert_slike($data);
                if ($insert) {
                    redirect(base_url('/administracija/slike'));
                }
            }
        }else {
            $views = array('administracija/slike');
            $dataView['title'] = 'Slike';
            $tableTemplate = array('table_open' => '<table class="table table-hover">' );
            $this->table->set_template($tableTemplate);
            $this->table->set_heading('#', 'Naziv linka', 'Opis', 'Slika','Promeni','Obrisi');
            $slike = $this->a->get_slike();
            $rezultat=array();
            $options = array();
            $i=0;
            $rezultat = array();
            foreach ($slike AS $slika) {
                $niz = array();
                foreach ($slika AS $nazivKolone => $vrednostKolone) {
                    if ($nazivKolone == 'slika') {
                        array_push($niz, '<img src="' . $vrednostKolone . '" width="50px" height="50px"/>');
                    } else {
                        array_push($niz, $vrednostKolone);
                    }
                }
                array_push($niz, "<a href='promeniPromo/{$slika['id_slike']}'>Promeni</a>");
                array_push($niz, "<a href='obrisiKorisnika/{$slika['id_slike']}'>Obrisi</a>");
                array_push($rezultat, $niz);
            }
            // forma za dodavanje
            $forma = form_open_multipart();
            $forma .= form_label('Unesite naziv slike *');
            $forma .= form_input('frm_naziv', '', 'placeholder="Unesite naziv slike" class="form-control"');
            $forma .= form_label('Unesite opis slike');
            $forma .= form_textarea("frm_opis", "", "class='form-control'");
            $forma .= form_label('Izaberite sliku');
            $forma .= form_upload("frm_slika", "", "class='form-control'");
            $forma .= form_label(' ');
            $forma .= form_submit('submit', 'Dodaj', 'class="form-control"');
            $forma .= form_close();
            $dataView['forma'] = $forma;
            $dataView['tabela']= $this->table->generate($rezultat);
            $this->load_view($views, $dataView);
        }
    }
    public function smestaji(){
        $views = array('administracija/smestaji');
        $dataView['title'] = 'Smestaji';
        $this->load_view($views,$dataView);
    }
    
    public function prikazGalerija(){
        
    }
    
    
    
}