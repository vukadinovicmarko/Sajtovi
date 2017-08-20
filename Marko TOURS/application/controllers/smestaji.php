<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of smestaji
 *
 * @author Marko
 */
require(APPPATH."/core/frontend_Controller.php");
class Smestaji extends Frontend_Controller{
    //put your code here
    
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
        $id = $this->uri->segment('2');
        $centar = array('smestaj');
        $this->load->model("Meni",'m');
        
        $this->data['title']='Marko TOURS - Smestaji';
        
        $this->load->model('smestajmodel','s');
        $this->data['smestaj'] = $this->s->dohvatiSmestaj($id);
        $smestaj = $this->data['smestaj'];
        
        $tableTemplate = array('table_open' => '<table class="table table-hover">');
        $this->table->set_template($tableTemplate);
        $this->table->set_heading('Drzava','Pocetak sezone', 'Kraj sezone','Putovanje traje (dana)', 'Broj soba', 'Max ljudi po sobi', 'Cena');
        $datestring = "%d-%M %Y";
        $datum = mdate($datestring,$smestaj[0]['pocetak_sezone']);
        $datum2 = mdate($datestring,$smestaj[0]['kraj_sezone']);
        
        $this->table->add_row($smestaj[0]['naziv_drzave'],$datum,$datum2 ,$smestaj[0]['dani'],$smestaj[0]['broj_soba'],$smestaj[0]['max_broj_ljudi_po_sobi'],$smestaj[0]['cena_po_sobi']);
        $this->data['tabela'] = $this->table->generate();
        
        
        
        
        
        
        
          
        
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
