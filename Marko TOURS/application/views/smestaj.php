
<div class="centar_desno_promo col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-lg-10 col-lg-offset-1 marginTop5p">
    <div class='sadrzaj_desno_promo col-sm-10 col-sm-offset-1   col-lg-12 col-lg-offset-0'>
   
<?php

    
       foreach($smestaj as $sm){
          
           echo "<h2 class='red'>".$sm['naziv']."</h2>";
           echo "<br>";
           echo "<br>";
           $slike = json_decode($sm['slike']);
           
          echo "<h3>Opis smeštaja</h3>"; 
          echo $sm['opis'];
          echo "<br>";
          echo "<br>";
           echo $tabela;
           echo "<br>";
           echo "<div class='col-lg-12'>";
           foreach($slike as $slika){
           
           $putanja = "/assets/images/galerija/".$slika; 
                echo "<a  href='".base_url($putanja)."'><img class='img-responsive col-sm-6 col-md-4 col-lg-4' src='".base_url($putanja)."'  alt=''/></a>";
                
           }
           echo "</div>";
       }
       
            
    
    
?>
        </div>
    </div>