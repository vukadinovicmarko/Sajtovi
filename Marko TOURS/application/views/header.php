<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $title; ?></title>
        <link rel="stylesheet" type="text/css" href="<?php print base_url('assets/style/bootstrap/css/bootstrap.min.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php print base_url(); ?>assets/style/style.css">
        
        <script type="text/javascript" src="<?php print base_url(); ?>assets/scripts/jquery-2.2.1.min.js"></script>
        <script type="text/javascript" src="<?php print base_url(); ?>assets/style/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/scripts/skripta.js" type="text/javascript"></script>
        
        <script>
            
            

            
            
            $(document).ready(function(){
                $(".ul_istaknuto li").addClass("kliknuto");
                    $(".login_div").animate(1000,function(){
                        $(".login_div").animate({"left":"0px"},1500);
                    });
                   $(".centar_desno_promo").animate(1000,function(){
                        $(this).animate({"left":"0px"},1500);
                    }); 
                    
                $(".praktikum_dugme").on("click",function(){
                    
                });
            })
    <?php
        if(isset($slike)){
    ?>
            $(document).ready(function () {
                var slike = [];
                var naslov = [];

                <?php

                foreach ($slike as $slika) {
                    echo "slike.push('{$slika['slika']}');";
                    echo "naslov.push('{$slika['naslov']}');";
                }
                
                ?>
                        
                brojac = 0;
                function timer() {
                    brojac += 1;
                    if (brojac == slike.length) {
                        brojac = 0;
                    }
                    $(".home_slideshow img").attr('src', slike[brojac]);
                    $(".home_slideshow h2").html(naslov[brojac]);
                    
                    
                }

                setInterval(function () {
                    timer();
                }, 5000);
            });
            
            
            
            
            <?php
            
            
            
            
            
            
            
            
            
            }
    ?>
    <?php
        if(isset($iteracijeAnkete)){
    ?>
        
         
        
            
                var slikee = [];
                var opis = [];
                var idIteracije = [];
                var ocenaIteracije = [];
                    
                    

                <?php
                $prosecnaPrvaOcena = $ocena['prvaOcena']/$ocena['brojPrvaOcena'];
                $prosecnaDrugaOcena = $ocena['drugaOcena']/$ocena['brojDrugaOcena'];
                
                echo "  ocenaIteracije.push('{$prosecnaPrvaOcena}');
                        ocenaIteracije.push('{$prosecnaDrugaOcena}');";
                
                foreach ($iteracijeAnkete as $slikaa) {
                    echo "slikee.push('{$slikaa['slika_iteracije']}');";
                    echo "opis.push('{$slikaa['opis_iteracije']}');";
                    echo "idIteracije.push('{$slikaa['id_iteracije']}');";
                    
                    
                    
                
                }
                
                
                ?>
                   
                brojacc = 0;
                function timerr() {
                    brojacc += 1;
                    if (brojacc == slikee.length) {
                        brojacc = 0;
                    }
                    $(".anketa img").attr('src', '<?php echo base_url();?>'+slikee[brojacc] ) ;
                    $(".anketa h6").html(opis[brojacc]);
                    
                    $(".anketa p").html("Prosecna ocena : "+ocenaIteracije[brojacc]);
                    
                    
                }
               
                function oceni(){
                    
                    var rbutton1 = document.getElementById('rb1');
                    var rbutton2 = document.getElementById('rb2');
                    var rbutton3 = document.getElementById('rb3');
                    var rbutton4 = document.getElementById('rb4');
                    var rbutton5 = document.getElementById('rb5');

                    if (rbutton1.checked){
                        $radio = rbutton1.value;
                        $id = idIteracije[brojacc];
                        ubaciOcenu($id,$radio);
                    }
                    else if(rbutton2.checked){
                        $radio = rbutton2.value;
                        $id = idIteracije[brojacc];
                        ubaciOcenu($id,$radio);
                    }
                    else if(rbutton3.checked){
                        $radio = rbutton3.value;
                        $id = idIteracije[brojacc];
                        ubaciOcenu($id,$radio);
                    }
                    else if(rbutton4.checked){
                        $radio = rbutton4.value;
                        $id = idIteracije[brojacc];
                        ubaciOcenu($id,$radio);
                    }
                    else if(rbutton5.checked){
                        $radio = rbutton5.value;
                        $id = idIteracije[brojacc];
                        ubaciOcenu($id,$radio);
                    }

                    timerr();
                }    
                    
                function ubaciOcenu(id,radio){
                    $.ajax({
                        method:"POST",
                        url:"home/ubaciOcenu",
                        data:"id="+id+";"+radio
        }).done(function(data) {
           
            location.reload();
                           
                           
                        });
                    }
                   
                    
               
        
                


               setInterval(function () {
                    timerr();
                }, 15000);
            
            
            
            
            
            
            
            
            <?php
            }
            
    ?>
    
    
    
       
    
        </script>
    </head>
    <body>
         <div class="container-fluid">
            <div id="centar" class="row">
        <nav class='navbar'>
            <div class='container-fluid header'>
                <div class='navbar-header'>
                    <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#mainNavBar'>
                        <span class='icon-bar'></span>
                        <span class='icon-bar'></span>
                        <span class='icon-bar'></span>
                    </button>
                    <div class='logo'><a href='<?php print base_url(); ?>' class='navbar-brand'></a></div>
                </div>
                <?php
                    $activeUrl = basename($_SERVER['PHP_SELF']);
                ?>
                <div class='collapse navbar-collapse' id='mainNavBar'>
                    <ul class=' nav navbar-nav ul_menu'>
                        <li <?php if($activeUrl == 'home' || $activeUrl == 'index.php') {echo "class='active'";} ?>><a href='<?php  echo base_url() ?>' >Pocetna</a></li>
                        <li <?php if($activeUrl == 'about') {echo "class='active'";} ?>><a  href='<?php  echo base_url('about') ?>' >O autoru</a></li>
                        <li <?php if($activeUrl == 'contact') {echo "class='active'";} ?>><a  href='<?php  echo base_url('contact') ?>'>Kontakt</a></li>
                        <li <?php if($activeUrl == 'galerija') {echo "class='active'";} ?>><a href='<?php  echo base_url('galerija') ?>'>Galerija</a></li>

                        <?php
                        foreach( $menu AS $menuData) {
                            echo '<li class="dropdown">
                                <a href="#" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
                            ' . $menuData['naziv_menija'] . '
                            <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                            ';
                            foreach($menuData['linkovi'] AS $link) {
                                echo "
                                <li>
                                    <a href='".base_url("promo/".$link['id'])."'>
                                        {$link['naziv']}
                                    </a >
                                </li>";
                            }
                            echo '
                            </ul>
                        </li>';
                        }
                        ?>
                        
                        <li ><a href="<?php echo base_url('praktikum'); ?>">Praktikum</a></li>
                    </ul>
                    <ul class='nav navbar-nav navbar-right ul_menu'>
                        <?php if(!$this->session->userdata("korisnik_uloga_id")){?>
                        <li <?php if($activeUrl == 'login') {echo "class='active'";} ?> class='login'><a href='<?php  echo base_url('login') ?>'>Login/Register</a></li>
                    </ul>
                    <?php }
                    else{
                        if($this->session->userdata("korisnik_uloga_id") == '1') {
                            print "<li class='login'><a href='" . base_url('administracija') . "'>Administracija</li></a>";
                        }
                        
                        print "<li class='login'><a href='logovanje/logout'>logout</li></a>";
                    }
?>
                       
                </div>
                    
                    
                </div>
                
            
        </nav>
        
        
        
        
       
                