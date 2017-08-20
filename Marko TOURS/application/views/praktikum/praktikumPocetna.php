<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD7qDDc9oor8Z7HtkhArzLGtsup76usU30&callback=initialize" async defer></script>
<script>
    var fl;
    var initialLocation;
    var browserSupportFlag =  new Boolean();
    var latitude, longitude;
    var l,ln;
    function initialize() {
        // Try W3C Geolocation (Preferred)
        if(navigator.geolocation) {
            browserSupportFlag = true;
            navigator.geolocation.getCurrentPosition(function(position) {
                 latitude = position.coords.latitude;
                 longitude = position.coords.longitude;
                var tip = "restaurant";
                pozoviNajblize(longitude,latitude,tip);
            }, function() {
                handleNoGeolocation(browserSupportFlag);
            });
        }
        // Browser doesn't support Geolocation
        else {
            browserSupportFlag = false;
            handleNoGeolocation(browserSupportFlag);
        }
        function handleNoGeolocation(errorFlag) {
            if (errorFlag == true) {
                $("#message").html("Geolokacija nije prihvacena, ukoliko zelite da pregledate objekte u blizini, morate da dozvolite da vidimo vasu lokaciju.");
            } else {
                alert("Your browser doesn't support geolocation. We've placed you in Siberia.");
            }
        }
    }
    function izaberi() {
        //$('#btn_izaberi').attr('disabled','');
        var city_name = $('#select_grad :selected').text();
        var city_name_short = $('#select_grad').val();
        var tip = $('#select_tip').val().toLowerCase();
        pozoviCentarGrada(city_name,city_name_short,tip);
    }
    function pozoviNajblize(longitude,latitude,tip){
        var data = {
            longitude : longitude,
            latitude : latitude,
            tip : tip
        };
        $("#foursquare-data-sve").html("");
            $("#praktikum-sve").append('<div id="awesomeSpinner" class="col-md-12 text-center"><i class="fa fa-spinner fa-spin" style="font-size:5em; color:#128689;"></i></div>');
            $("#awesomeSpinner").fadeIn(300);
        
        $.ajax({
                method: "POST",
                url: "<?php echo base_url("index.php/praktikum");?>",
                data: data,
                cache : false
            })
            .done(function( response ) {
                    $('#btn_izaberi').removeAttr('disabled');

                    $("#foursquare-data-sve").html(response);

                    $("#foursquare-data-sve .foursquare-data-parent:odd").find(".foursquare-data").addClass("box-desno col-xs-12 col-md-12 col-lg-11 col-lg-offset-1 small");
                    $("#foursquare-data-sve .foursquare-data-parent:even").find(".foursquare-data").addClass("box-levo col-xs-12 col-md-12  col-lg-11 small");
                    $("#awesomeSpinner").fadeOut(1500);
                    $("#foursquare-data-sve").fadeIn(1500);
                    $("#awesomeSpinner").remove();
            });
    }
    function pozoviCentarGrada(city_name,city_name_short,tip){
        var address = city_name+","+city_name_short;
        var geocoder = new google.maps.Geocoder();
        geocoder.geocode({
            'address': address
        }, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                var Lat = results[0].geometry.location.lat();
                var Lng = results[0].geometry.location.lng();
                var posalji = {
                    requestName : "izabraniGrad",
                    city : city_name.trim(),
                    longitude : Lng,
                    latitude : Lat,
                    tip : tip.trim()
                };
                $("#foursquare-data-sve").fadeOut(500,function(){
                $("#praktikum-sve").append('<div id="awesomeSpinner" class="col-md-12 text-center"><i class="fa fa-spinner fa-spin" style="font-size:5em; color:#128689;"></i></div>');
                $("#awesomeSpinner").fadeIn(1000);
        });
                $.ajax({
                    method: "POST",
                    url: "<?php echo base_url("index.php/praktikum");?>",
                    data: posalji
                }).done(function( response ) {
                    $('#btn_izaberi').removeAttr('disabled');

                    $("#foursquare-data-sve").html("");
                    $("#foursquare-data-sve").html(response);

                    $("#foursquare-data-sve .foursquare-data-parent:odd").find(".foursquare-data").addClass("box-desno col-xs-12 col-md-12 col-lg-11 col-lg-offset-1 small");
                    $("#foursquare-data-sve .foursquare-data-parent:even").find(".foursquare-data").addClass("box-levo col-xs-12 col-md-12  col-lg-11 small");
                    $("#awesomeSpinner").fadeOut(1500,function(){
                        $("#foursquare-data-sve").fadeIn(1500);
                    });
                    $("#awesomeSpinner").remove();
            });
                
            } else {
              alert("Something got wrong " + status);
            }
        });
              
        
    }
    
      var map;
      var markers = [];
      function initMap() {
          var myLatLng = {lat: latitude, lng: longitude};
            var map = new google.maps.Map(document.getElementById('map'), {
              zoom: 16,
              center: myLatLng
            });

            var marker = new google.maps.Marker({
              position: myLatLng,
              map: map,
              title: 'You are here'
            });
            markers.push(marker);
            map.addListener("click",function(e){
                l = e.latLng.lat();
                ln = e.latLng.lng();
                if( markers.length > 1){
                    markers[1].setMap(null);
                }
                var newMarker = new google.maps.Marker({
                    position : { lat : l , lng : ln },
                    map : map,
                    title : "Ovde si kliknuo"
                });
                markers[1] = newMarker;
                $("#continue").removeClass("hide");
            })     
      }
     $(function(){
         $('#myModal').on('shown.bs.modal', function (e) {
                initMap(); 
          });
          $("#formInsert").click(function(e){
            e.preventDefault();
            submitForm();
        });
     });
//     function serializeObject(form) 
//        {
//            var o = {};
//            var a = form.serializeArray();
//            $.each(a, function() {
//                if (o[this.name] !== undefined) {
//                    if (!o[this.name].push) {
//                        o[this.name] = [o[this.name]];
//                    }
//                    o[this.name].push(this.value || '');
//                } else {
//                    o[this.name] = this.value || '';
//                }
//            });
//            return o;
//        };
        
     function submitForm(){
//         var form = JSON.stringify(serializeObject($("form[name='forma']")));
//         form = JSON.parse(form);
        $("#formaInsert").find("input[name*='latitude']").val(l);        
        $("#formaInsert").find("input[name*='longitude']").val(ln);

        var formData = new FormData($("#formaInsert")[0]);
        $.ajax({
                method: "POST",
                url: "<?php echo base_url("index.php/praktikum");?>/dodavanje",
                data: formData,
                cache: false,
                contentType: false,
                processData: false
            })
            .done(function( response ) {
                response = JSON.parse(response);
                $("#myModal").modal('hide');
                    $("#message").parent().removeClass('hidden');
                if(response.error != undefined ){
                    $("#message").text(response.error);
                }else{
                    $("#message").text(response.success);
                    setTimeout(function(){
                        $("#message").parent().addClass('hidden');
                        //$("#message").text("");
                        window.location.reload();
                    },4000);
                }
            });
//        var form = {
//            "latitude" : l,
//            "longitude" : ln,
//            "name" : $("#place_name").val(),
//            "type" : $("#formaInsert").find("select").val(),
//            "contact" : $("#contact_number").val(),
//            "image" : $("#image")[0]['files'][0]
//        };
//        var formToSend = new FormData(form);
//        console.log(form);
    } 
     function nextStep(step){ 
        $("#continue").addClass("hide");
        var nextStep = parseInt(step)+1;
        $("#step-"+step).toggleClass(function(){
            $(this).fadeOut(50);
            $("#step-"+nextStep).fadeIn(500 ,function(){
                $("#step-"+nextStep).removeClass('hide');
            });
        },function(){
            $(this).fadeIn(500);
            $("#step-"+nextStep).fadeOut(50 ,function(){
                $("#step-"+nextStep).removeClass('hide');
            });
        });
        if(nextStep < 5){
            $("#next").attr('onClick',"nextStep("+nextStep+")");
        }else{
               $("#next").attr('onClick',"submit()");
        }
     }
     
     function prevStep(step){ 
        $("#continue").addClass("hide");
        var prevStep = parseInt(step)-1;
        $("#step-"+step).toggleClass(function(){
            $(this).fadeOut(50);
            $("#step-"+prevStep).fadeIn(500 ,function(){
                $("#step-"+prevStep).removeClass('hide');
            });
        },function(){
            $(this).fadeIn(500);
            $("#step-"+prevStep).fadeOut(50 ,function(){
                $("#step-"+prevStep).removeClass('hide');
            });
        });
        
        $("#next").attr('onClick',"nextStep("+prevStep+")");
        initMap();
    }
</script> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<div id="praktikum-sve" class="container">
<?php
    $tipovi = array(
        'coffee' => 'Coffee',
        'food' => 'Food',
        'drinks' => 'Drinks',
        'shops' => 'Shops',
        'restaurant' => 'Restaurant'
    );
//    $gradovi = array(
//        '39.625275,19.924536' => "Krf",
//        '35.125459,25.752661' => 'Krit',
//        '40.6212524,22.9110077' => 'Solun',
//        '39.9891154,23.6047481' => 'Pefkohori',
//        '39.9994514,23.5722228' => 'Hanioti',
//        '43.9474799,12.1457217' => 'Rim',
//        '43.4801898,12.9220829' => 'Ankona',
//        '40.960401,16.2406379' => 'Bari',
//        '40.7058316,-74.2581971' => 'New York'
//    );
    
   $gradovi = array();
   foreach($list_cities as $key => $city)
   {
       $koordinate = $city['city_name_short'];
       $gradovi[$koordinate] = $city['city_name'];
   }
   ?>
   <div class="alert alert-success hidden">
      <strong>Success!</strong> 
      <p id="message"></p>
   </div>
     
     <div id="gornjiDeo" >
         <div class="levo">
             <h4>izaberite kriterijume za pretragu :</h4>
    <?php
    echo form_open('','class="form-inline col-lg-8 col-lg-offset-2"');
    echo form_dropdown("tip",$tipovi,"","class='form-control' id='select_tip' ");
    
    echo form_dropdown("grad",$gradovi,"", "class='form-control' id='select_grad'");
    
    echo form_button('btn','Izaberi','onClick="izaberi()" class="form-control" id="btn_izaberi"');
    echo form_close();
?>
             </div>
<!-- Button trigger modal -->
<div class="desno">
<button type="button" class="btn btn-primary btn-lg dugmeUnesi"data-toggle="modal" data-target="#myModal">
   Unesite novi objekat
</button>
 </div>
</div>
<div class="ocisti"></div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modalDialog" role="document">
      <div class="modal-content " id="modal-content">
      <div class="modal-header modalHeader">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Izaberite Lokaciju</h4>
      </div>
      <div class="modal-body" id="myModalContent">
         <div id="step-1">
            <div id="map"></div>
         </div>
          <div id="step-2" class="hide">
            <?php
                echo form_open_multipart('','name="formInsert" class="form-group" id="formaInsert"');
                echo "<table class='tableInsert'><tr>";
                echo "<td>".form_label('Name of the new place', 'name')."</td></tr>";
                $dataName = array(
                    'name' => 'name',
                    'type' => 'text',
                    'id' => 'place_name',
                    'class' => 'form-control',
                );
                echo "<tr><td>".form_input($dataName)."</td></tr>";
                echo "<td>".form_label('Set a image', 'image')."</td></tr>";
                $dataImage = array(
                    'name' => 'image',
                    'id' => 'image',
                );
                echo "<tr><td>".form_upload($dataImage)."</td></tr>";
                echo "<tr><td>".form_label('Facebook page', 'facebook_page')."</td></tr>";
                $dataFacePage = array(
                    'name' => 'facebook_page',
                    'type' => 'text',
                    'id' => 'facebook_page',
                    'class' => 'form-control',
                );
                echo "<tr><td>".form_input($dataFacePage)."</td></tr>";
//                echo form_label('Facebook page', 'facebook_page');
//                $dataFacePage = array(
//                    'name' => 'facebook_page',
//                    'type' => 'text',
//                    'id' => 'facebook_page',
//                    'class' => 'form-control',
//                );
//                echo form_input($dataFacePage);
                echo "<tr><td>".form_label('Contact number', 'contact_number')."</td></tr>";
                $dataContactNumber = array(
                    'name' => 'contact_number',
                    'type' => 'text',
                    'id' => 'contact_number',
                    'class' => 'form-control',
                );
                echo "<tr><td>".form_input($dataContactNumber)."</td></tr>";
                echo "<tr><td>".  form_hidden('latitude')."</td></tr>";
                echo "<tr><td>".form_hidden('longitude')."</td></tr>";
                echo "<tr><td>".form_label('Choose category', 'tip')."</td></tr>";
                echo "<tr><td>".form_dropdown("tip",$tipovi,array(),"class='form-control col-md-4' id='select_tip' ")."</td></tr>";
                $backButton = array(
                    'name' => 'back',
                    'content' => 'Back',
                    'id' => 'back',
                    'class' => 'btn btn-primary',
                    "type" => 'button',
                    'onClick'=> 'prevStep(2)'
                );
                $dataButton = array(
                    'name' => 'formInsert',
                    'content' => 'Insert',
                    'id' => 'formInsert',
                    'class' => 'btn btn-primary',
                    "type" => 'submit'
                );
                echo "<tr><td colspan='2' id='formButtons'>".form_button($backButton).form_button($dataButton)."</td></tr>";
                echo "</table>".form_close();
            ?>
              
          </div>
      </div>
      <div class="modal-footer hide" id="continue">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onClick="nextStep(1)" id="next">Save changes</button>
      </div>
    </div>
  </div>
</div>
<div id="foursquare-data-sve" >