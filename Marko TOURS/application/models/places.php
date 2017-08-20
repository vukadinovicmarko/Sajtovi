<?php

class Places extends CI_Model{
    /*

        --------------- PLACES  ---------------------

    */
    public function getPlaces($city,$tip="coffee"){ 
        $upit = $this->db->select('*')
                ->from('places')
                ->where('type',$tip)
                ->where('place',$city)
                ->get();
        return $upit->result_array();
    }
    public function insertPlaces($form){
        return $this->db->insert('places',$form);
    }
    public function insertCity($cityInsert){
        return $this->db->insert('list_cities',$cityInsert);
    }
    public function getAllCities(){ 
        return $this->db->get('list_cities')->result_array();
    }
     public function getCityWhere($city){ 
        return $this->db->get_where('list_cities',array('city_name' => $city))->result_array();
    }
    public function getByCoordinates($latitude,$longitude)
    {
        $upit = $this->db->select('city_name')
                ->from('list_cities')
                ->where('city_latitude',$latitude)
                ->where('city_longitude',$longitude)
                ->get();
        return $upit->result_array();
    }
}
