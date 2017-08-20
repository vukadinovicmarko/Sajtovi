
<div class="centar_desno_promo col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-1 col-md-5 col-lg-6 col-lg-offset-1 marginTop5p">
    <div class='sadrzaj_desno_promo col-sm-10 col-sm-offset-1 col-md-12 col-md-offset-0 col-lg-12 col-lg-offset-0'>
   
<?php

    foreach($galerije AS $galerija){
       
        echo "<div class='fild col-sm-12 col-md-12 col-md-offset-0 col-lg-6'>";
          echo "<br><h5 class='red h5'>{$galerija['naziv_slike']}</h5><br>";
            
                $putanja = "/assets/images/galerija/".$galerija['putanja_slike']; 
                echo "<a  href='".base_url($putanja)."'><img class='img-responsive' src='".base_url($putanja)."'  alt=''/></a>";
            
         

        echo "</div>";
            
    }
    
?>
        </div>
    </div>