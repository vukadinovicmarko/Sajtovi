<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of praktikum
 *
 * @author Marko
 */

require_once(APPPATH."/core/frontend_Controller.php");
class Praktikum extends Frontend_Controller{
    private $data = array();
    
    //put your code here
    function __construct() {
        parent::__construct();
        if(!$this->input->post()) {
            $this->load->model("Meni", 'm');
            $this->data['menu'] = array();
            foreach ($this->m->dohvatiGlavniMeni() AS $glavniMeniLink) {
                $idMeni = $glavniMeniLink['id_meni'];
                $meniNiz = array();
                $meniNiz['naziv_menija'] = $glavniMeniLink['naziv_menija'];
                $meniNiz['linkovi'] = array();
                foreach ($this->m->dohvatiLinkoveOdMenija($idMeni) AS $linkovi) {
                    $linkoviNiz = array();
                    $linkoviNiz['id'] = $linkovi['id_link'];
                    $linkoviNiz['naziv'] = $linkovi['naziv_link'];
                    array_push($meniNiz['linkovi'], $linkoviNiz);
                }
                array_push($this->data['menu'], $meniNiz);
            }
        }
        
        $this->load->model('places','p');
    }
    public function index(){
        if($this->input->post()){
            if($this->input->post('requestName')){
                $city = $this->input->post('city');
            }
            else{
                $getCity = $this->getCoordinatesOfCity($this->input->post('latitude'),$this->input->post('longitude'));
                $city = explode(",",$getCity)[0];
            }
            
            
            $izvrsavanjeFoursqaurea = $this->searchFoursquare();
            //$city = $this->input->post('city') ;
            $query = $this->input->post('tip');
//            print_r($city);
//            print_r($query);
            $forsquare = json_decode($izvrsavanjeFoursqaurea, TRUE);
            $places = $this->p->getPlaces($city,$query);
//            print_r($places);
            $this->data['prikazi'] = $places + $forsquare['response']['venues'];
            $centar = 'praktikum/lista';
            $this->load->view($centar, $this->data);
        }
        else {
            $city = "Beograd";
            $this->data['title'] = 'Praktikum';
            $izvrsavanjeFoursqaurea = $this->searchFoursquare();
            $forsquare = json_decode($izvrsavanjeFoursqaurea, TRUE);
            $places = $this->p->getPlaces($city);
            $this->data['prikazi'] = $places + $forsquare['response']['venues'];
            
            $this->data['list_cities'] = $this->p->getAllCities();
            
            $centar = array('praktikum/praktikumPocetna', 'praktikum/lista');
            $this->load_view($centar, $this->data);
        }
    }
    public function searchFoursquare(){
        $clientId = 'U1FQZV0EOQQSP0UMO1YKBXJFSGMCBKPPI3L3YFCBIPYBXB5J';
        $clientSecret = 'O0U2AVV3NSYCSGCANCY2YH102WINXGZFYMZG0Z2FCAGDDLNL';
        if($this->input->post()){
            $latitude = substr($this->input->post('latitude'),0,5);
            $longitude = substr($this->input->post('longitude'),0,5);
            $query = $this->input->post('tip');
        }else{
            $latitude = '44.8';
            $longitude = '20.4';
            $query = 'Restaurant';
        }
        $this->curl->option(CURLOPT_SSL_VERIFYPEER, false );
        $this->curl->create("https://api.foursquare.com/v2/venues/search?client_id=".$clientId."&client_secret="
                . "".$clientSecret."&v=20130815&ll=$latitude,$longitude&query=$query");
        $curl =  $this->curl->execute();
        if(!$curl){
        }
        return $curl;
    }
    
    public function dodavanje(){
        
        $form = $this->input->post();
        $this->curl->option(CURLOPT_SSL_VERIFYPEER, false );
        $this->curl->create("http://maps.googleapis.com/maps/api/geocode/json?latlng={$form['latitude']},{$form['longitude']}&sensor=true");
        $getPlace = json_decode($this->curl->execute(),TRUE);
//        print_r($getPlace);die;
        for($x=0;$x < $getPlace['results']; $x++){
            if(in_array("locality",$getPlace['results'][0]['address_components'][$x]['types'])){
                break;
            }
        }
        $city_long_name = $getPlace['results'][0]['address_components'][$x]['long_name'];
        $city_short_name = $getPlace['results'][0]['address_components'][$x]['short_name'];
        $address = $getPlace['results'][0]['formatted_address'];
        $explode = explode(",",$address);
        $city = $explode[1];
        
        $ifCityExists = $this->p->getCityWhere($city_long_name);
        if((empty($ifCityExists))){
            $cityInsert = array(
            'city_name' => $city_long_name,
            'city_name_short' => $city_short_name
            );
            $this->p->insertCity($cityInsert);
        }
        
        $config['upload_path'] = 'assets/images/uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $this->load->library('upload',$config);
        if ( ! $this->upload->do_upload('image'))
        {
                echo json_encode( array('error' => $this->upload->display_errors()) );
        }
//       var_dump( $this->upload->initialize($config) ) ;
        $formInsert = array(
            'name' => $form['name'],
            'lat' => $form['latitude'],
            'long' => $form['longitude'],
            'place' => $city_long_name,
            'formatted_address' => $address,
            'contact' => $form['contact_number'],
            'image_url' => "/assets/images/uploads/".$_FILES['image']['name'],
            'type' => $form['tip']
        );
        if( $this->p->insertPlaces($formInsert)){
            echo json_encode(
                    array(
                        "success" => "You have successfully added new place"
                    )
                );
        }else{
            echo json_encode(
                    array(
                        "error" =>  "Error !!! There was a mistake adding new place"
                    )
                );
        }
    }
    
    public function getCoordinatesOfCity(){
        $lat = $this->input->post('latitude');
        $long = $this->input->post('longitude');
        $this->curl->option(CURLOPT_SSL_VERIFYPEER, false );
        $this->curl->create("http://maps.googleapis.com/maps/api/geocode/json?latlng={$lat},{$long}&sensor=true");
        $getPlace = json_decode($this->curl->execute(),TRUE);
        
         for($x=0;$x < $getPlace['results']; $x++){
            if(in_array("locality",$getPlace['results'][0]['address_components'][$x]['types'])){
                break;
            }
        }
        $city_long_name = $getPlace['results'][0]['address_components'][$x]['long_name'];
        //return $city_long_name;
        $city_short_name = $getPlace['results'][0]['address_components'][$x]['short_name'];
//        for($i=0; $i < $getPlace['results'];$i++){
//            
//            if(in_array("administrative_area_level_2",$getPlace['results'][$i]['types'])){
//               break;   
//            }
//        }
//        $cityLocation = $getPlace['results'][0]['geometry']['location'];
        return $city_long_name.", ".$city_short_name;
        //return $this->p->getByCoordinates($cityLocation['lat'],$cityLocation['lng']);
    }
}
