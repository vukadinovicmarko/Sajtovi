
    <h4>Objekti:</h4>
<?php
$clientId = 'U1FQZV0EOQQSP0UMO1YKBXJFSGMCBKPPI3L3YFCBIPYBXB5J';
$clientSecret = 'O0U2AVV3NSYCSGCANCY2YH102WINXGZFYMZG0Z2FCAGDDLNL';
$venues  = $prikazi;
if(count($venues) > 0) {
    foreach ($venues as $venue) {
        $formatted_address = "No address";
        $contact = "No contact";
        if( !isset( $venue['fromDb'] ) ){
            $this->curl->create("https://api.foursquare.com/v2/venues/{$venue['id']}/photos?client_id=" . $clientId . "&client_secret=" . $clientSecret . "&v=20130815");
            $this->curl->option(CURLOPT_SSL_VERIFYPEER, false);
            $curl = $this->curl->execute();
            $slike = json_decode($curl, TRUE);
            $ukupnoSlika = $slike['response']['photos']['count'];
            if ($ukupnoSlika > 0) {
                if ($ukupnoSlika > 1) {
                    $randImage = rand(0, $ukupnoSlika - 1);
                } else {
                    $randImage = 0;
                }
                $nizSlika = $slike['response']['photos']['items'];
                $izabranaSlika = $nizSlika[$randImage];
                $ispisSlike = "<img src='" . $izabranaSlika['prefix'] . '128x128' . $izabranaSlika['suffix'] . "' class='img-circle' />";
                $address = @$venue['location']['address'] ? $venue['location']['address'] : "No address";
                $city = @$venue['location']['city'] ? $venue['location']['city'] : "No city";
                $state = @$venue['location']['cc'] ? $venue['location']['cc'] : "No state";
                $contact = @$venue['contact']['phone'] ? $venue['contact']['phone'] : "No contact";
                $formatted_address = $address.",".$city.",".$state;
            } else {
                $ispisSlike = "<img src='".base_url('assets/images/no_img.png')."' class='img-circle' />";
            }
            $facebook = @$venue['contact']['facebookUsername'] ? $venue['contact']['facebookUsername'] : 'No facebook page';
            $facebookLink = @$venue['contact']['facebook'] != "" ? "<a href='https://www.facebook.com/{$venue['contact']['facebook']}' target='_blank'> $facebook </a>" : $facebook;
        }else{
            if($venue['image_url']==""){
                $ispisSlike = "<img src='".base_url('assets/images/no_img.png')."' class='img-circle' width='128px' height='128'/>";
            }
            else{
                $ispisSlike = "<img src='".base_url($venue['image_url'])."' '128x128'  class='img-circle' width='128px' height='128'/>";
            }
            $formatted_address = $venue['formatted_address'] ? $venue['formatted_address'] : "No address";
            $contact = $venue['contact'] ? $venue['contact'] : "No contact";
            
            $facebook = @$venue['facebookUsername'] ? $venue['facebookUsername'] : 'No facebook page';
            $facebookLink = @$venue['facebook'] != "" ? "<a href='https://www.facebook.com/{$venue['facebook']}' target='_blank'> $facebook </a>" : $facebook;
        }
        
        
        
        $checkin = @$venue['stats']['checkinsCount'] ? $venue['stats']['checkinsCount'] : "0";
        $users = @$venue['stats']['usersCount'] ? $venue['stats']['usersCount'] : "0";
        $tip = @$venue['stats']['tipCount'] ? $venue['stats']['tipCount'] : "0";
        echo "<div class='col-md-6 foursquare-data-parent '>
                
                <div class='foursquare-data'>
                    <div class='col-md-2'>
                        {$ispisSlike}
                    </div>
                    <div class='col-md-8 col-md-offset-2'>
                        <address>
                          <h5><strong>{$venue['name']}</strong></h5>
                          <p> <i class='fa fa-facebook fa-1' ></i> $facebookLink</p>
                          <p> <i class='fa fa-map-marker fa-1' ></i> $formatted_address</p>
                          <i class='fa fa-phone fa-1' ></i> <phone>$contact</phone>
                        </address>
                        <div class='row'>
                            <div class='col-md-4'>
                                <i class='fa fa-thumb-tack fa-1' ></i> Check ins :<p class='text-center'> <b>$checkin</b></p>
                            </div>
                            <div class='col-md-4 text-center'>
                                <i class='fa fa-users fa-1' ></i> Users : <p class='text-center'><b>$users</b></p>
                            </div>
                            <div class='col-md-4 text-center'>
                               <i class='fa fa-foursquare fa-1' ></i> Tips : <p class='text-center'><b>$tip</b></p>
                            </div>
                        </div>
                    </div>
                </div>
        </div>";
    }
}else{
    print "Nije pronadjeno nijedno mesto sa izabranim kriterijumima";
}
?>
<div class="ocisti"></div>
</div>
<!-- closes the container -->



