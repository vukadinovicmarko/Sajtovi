<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of galerija
 *
 * @author Marko
 */

require_once(APPPATH."/core/frontend_Controller.php");
class Galerija extends Frontend_Controller
{
    function __construct()
    {
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

    public function index()
    {
       $centar = array('centar_levo','galerije');
        $this->load->model("Meni",'m');
        
        $this->data['title']='Marko TOURS - Galerija';
        
        $this->load->model('galerijaModel','g');
        $this->data['galerije'] = $this->g->dohvatiGalerije();
        
        
        
          
        
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
        $this->data['istaknutoNaziv'] = $istaknutoNaziv;
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
        
        
        
        
        $this->data['promo'] = $promo;
        $this->load_view($centar, $this->data);

    }
    
    public function prikaziGaleriju(){
        $centar = array('centar_levo','galerija');
        $this->load->model("Meni",'m');
        
        $this->data['title']='Marko TOURS - Galerija';
        
        $this->load->model('galerijaModel','g');
        $this->data['galerije'] = $this->g->dohvatiGaleriju($this->uri->segment(3));

          
        
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
        $this->data['istaknutoNaziv'] = $istaknutoNaziv;
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
        
        
        
        
        $this->data['promo'] = $promo;
        $this->load_view($centar, $this->data);
        
        
    }
    
    
    
    }