<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once(APPPATH."/core/frontend_Controller.php");

class Home extends Frontend_Controller{
    private $data = array();
    function __construct() {
        parent::__construct();
        $this->load->model("Meni",'m');
        $this->data['menu'] = array();
        foreach( $this->m->dohvatiGlavniMeni() AS $glavniMeniLink){
            $idMeni = $glavniMeniLink['id_meni'];
            $meniNiz = array();
            $meniNiz['naziv_menija'] = $glavniMeniLink['naziv_menija'];
            $meniNiz['linkovi'] = array();
            foreach($this->m->dohvatiLinkoveOdMenija($idMeni) AS $linkovi){
                $linkoviNiz = array();
                $linkoviNiz['id'] = $linkovi['id_link'];
                $linkoviNiz['naziv'] = $linkovi['naziv_link'];
                array_push( $meniNiz['linkovi'] ,$linkoviNiz);
            }
            array_push($this->data['menu'],$meniNiz);
        }
    }
    public function index(){
        $centar = array('centar_levo','centar_desno');
        $istaknutoNaziv = $this->m->dohvatiIstaknuto();
        $istaknuto = $this->m->dohvatiIstaknutoSve();
        $promo = array();
        foreach($istaknuto AS $istaknuce){
            $niz = array();
            $niz['naziv_promo'] = $istaknuce['naziv_promo'];
            $niz['id_promo'] = $istaknuce['id_promo'];
            $niz['smestaji'] = array();
            $nazivProvera = $istaknuce['naziv_promo'];
                $smestaji = $this->m->dohvatiSmestaje($nazivProvera);
                foreach ($smestaji AS $smetaj) {
                    array_push($niz['smestaji'], array(
                        'naziv' => $smetaj['naziv'],
                        'cena' => $smetaj['cena_po_sobi'],
                        'popust' => $smetaj['popust']
                    ));
               
            }
            array_push($promo,$niz);
        }
        $this->load->model('AdministracijaModel','a');
        $this->data['slike'] = $this->a->get_slike();
        $this->data['istaknutoNaziv'] = $istaknutoNaziv;
        $this->data['promo'] = $promo;
        $this->data['title']='Marko TOURS - Pocetna stranica';
        
        
        
        
        //anketa
        $this->load->model('anketa');
        $ankete = $this->anketa->dohvatiAnketu();
        $this->data['naziv_ankete'] = $ankete['naziv_ankete'];
        $iteracijeAnkete = $this->anketa->dohvatiIteracije();
        $ocenePrveIteracije = $this->anketa->dohvatiOcene(1);
        $oceneDrugeIteracije = $this->anketa->dohvatiOcene(2);
        $prvaOcena = 0;
        foreach($ocenePrveIteracije AS $ocenee){
            
            $prvaOcena += $ocenee['ocena'];
        }
        $drugaOcena = 0;
        foreach($oceneDrugeIteracije AS $ocenee){
            
            $drugaOcena += $ocenee['ocena'];
        }
        
        $ocene = array();
        $ocene['prvaOcena'] = $prvaOcena;
        $ocene['drugaOcena'] = $drugaOcena;
        
//        $drugaOcena = $iteracijeAnkete[1]['ocena'];
        
        $brojPrvaOcenaIzBaze= $this->anketa->dohvatiBrojOcena("1");
        $brojPrva="";
        foreach($brojPrvaOcenaIzBaze AS $broj){
            $brojPrva = $broj;
        }
        $brojDruga="";
        $brojDrugaOcenaIzBaze = $this->anketa->dohvatiBrojOcena("2");
        foreach($brojDrugaOcenaIzBaze AS $broj){
            $brojDruga = $broj;
        }
        $ocene['brojPrvaOcena'] = $brojPrva;
        $ocene['brojDrugaOcena'] = $brojDruga;
        
        $glavnaOcena = $ocene;
        
        $this->data['ocena'] = $glavnaOcena;
        $this->data['iteracijeAnkete'] = $iteracijeAnkete;    
       
        
                
        //kraj ankete
        $this->load_view($centar, $this->data);
        
    }
    public function login(){
        if($this->session->userdata('korisnik_uloga_id')){
            redirect(base_url('/'));
        }
        $centar = array('login');
		
        $this->data['title']='Marko Tours - Login';
        $this->form_validation->set_rules('tbUser', 'Username', 'required' );
        $this->form_validation->set_rules('tbPass', 'Password', 'required');
        $this->form_validation->set_message('required', '%s field is required');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		if ($this->form_validation->run() != FALSE)
        {
            $this->load->model('korisnici','k');
            $user = $this->input->post('tbUser');
            $pass = $this->input->post('tbPass');
            $proveraLogin = $this->k->dohvatiKorisnike($user,md5($pass));
            if($proveraLogin != false){
                // success login redirect here
                $this->session->set_userdata('korisnik_ime',$proveraLogin['korisnicko_ime']);
                $this->session->set_userdata('korisnik_email',$proveraLogin['mail_korisnika']);
                $this->session->set_userdata('korisnik_uloga_id',$proveraLogin['id_uloge']);
                if($this->session->userdata("korisnik_uloga_id") == '1'){
                    redirect(base_url('administracija'));
                }else{
                    redirect(base_url('/'));
                }
            }else{
                $this->data['no_user'] = "<div class='error'>Ne postoji korisnik sa unetim parametrima!</div>";
            }
        }
        else
        {
        }
        $this->load_view($centar, $this->data);
    }
    
    
    public function registracija(){
        if($this->session->userdata('korisnik_uloga_id')){
            redirect(base_url('/'));
        }
        $centar = array('registracija');
		
        $this->data['title']='Marko Tours - Registracija';
        $this->form_validation->set_rules('reg_tbUser', 'Username', 'required' );
        $this->form_validation->set_rules('reg_tbPass', 'Password', 'required');
        $this->form_validation->set_rules('reg_tbPass2', 'Password Confirmation', 'required');
        $this->form_validation->set_rules('reg_tbEmail', 'Email', 'required|valid_email');
        $this->form_validation->set_message('required', '%s field is required');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        if ($this->form_validation->run() != FALSE)
        {
            $this->load->model('korisnici', 'k');
            
            $kor_ime = $this->input->post('reg_tbUser');
            $sifra = $this->input->post(('reg_tbPass'));
            $email = $this->input->post('reg_tbEmail');
            $id_uloge = '2';
            $data = array(
                'korisnicko_ime' =>$kor_ime,
                'sifra_korisnika' => $sifra,
                'mail_korisnika' => $email,
                'id_uloge' => $id_uloge
            );
        
            $uneseno = $this->k->registracija_korisnika($data);
            var_dump($uneseno);
            if($uneseno){
                redirect(base_url());
            }
        }
        else{
            $this->load_view($centar, $this->data);
        }
        
    }
    
    
    public function about(){
        $view = array('oAutoru');
        $this->data['title'] = "O autoru";
        $this->load_view($view,$this->data);
    }
    
    public function contact(){
        $view = array('kontakt');
        $this->data['title'] = "Kontakt";
        $tmpl = array ( 'table_open'  => '<table class="table">' );
        $this->table->set_template($tmpl);
        $this->table->set_heading('Ostavite komentar');
        
        $ime = array(
            'name' => 'tbImeKorisnika',
            'id' => 'tbImeKorisnika',
            'placeholder' => 'Unesite Vase ime',
            'class' => 'form-control',
            'value' => set_value('tbImeKorisnika')
        );
        
        $email = array(
            'name' => 'tbEmail',
            'id' => 'tbEmail',
            'class' => 'form-control',
            'value' => set_value('tbEmail'),
            'placeholder' => 'Unesite Vase Email'
        );
        
        $komentar = array(
            'name' => 'tKomentar',
            'id' => 'tKomentar',
            'rows' => '8',
            
            'style' => 'resize:none;width:100%;'
            
        );
        $btnKomentar = array(
            'type' => 'button',
            'name' =>'brnKomentar',
            'id' =>'brnKomentar',
            'content'=>'Ostavite komnetar',
            'class' => 'btn btn-default text-center col-lg-12 marginTop20'
        );
        
        $this->form_validation->set_rules('tbImeKorisnika', 'Username', 'required' );
        $this->form_validation->set_rules('tbEmail', 'Email', 'required|valid_email');
        
        
        
        $this->table->add_row('ime : '. form_input($ime). form_error('tbUser'));
        
        $this->table->add_row('email : '.form_input($email). form_error('tbUser'));
        
        $celija = array(
            'data' => 'komentar:',
            'colspan' => '2'
        );
        $jedanred = array('colspan' => '2');
        $this->table->add_row($celija);
        $this->table->add_row(form_textarea($komentar));
        $this->table->add_row(form_button($btnKomentar));
        $this->data['table'] = $this->table->generate();
        if ($this->form_validation->run() != FALSE){
            redirect(base_url());
        }
        else{
             }
       
        $this->load_view($view,$this->data);
       
        
    }
    
    
    
    public function ubaciOcenu(){
        $ajaxovano = $this->input->post('id');
        $provera = explode(";", $ajaxovano);
        $id = $provera[0];
        $ocena = $provera[1];
        $this->load->model('anketa');
        $data = array(
            'ocena' => $ocena,
            'id_iteracije' => $id
        );
        
        $uneseno = $this->anketa->unesiOcenu($data);
        if($uneseno){
            redirect(base_url());
        }
    }
    
    public function galerija(){
        $views = array('centar_levo', 'galerija');
        $dataView['title'] = 'Galerija';
        
        
        
        $this->load_view($views,$dataView);
        
        
    }
    
    
}

?>