<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<div  class="centar_levo col-xs-12 col-sm-4 col-md-4 col-md-offset-1 col-lg-3 col-lg-offset-1 marginTop5p">
    <div class="istaknuto ">

        <ul class="nav nav-tabs" role="tablist">
            <?php
            $i = 0;
            foreach($istaknutoNaziv AS $p){
                if($i==0){
                    $class = 'active';
                }else{
                    $class = '';
                }
                $i++;
                echo '<li role="presentation" class="'.$class.'"><a href="#istaknuto_'.$p['id_promo'].'" aria-controls="home" role="tab" data-toggle="tab">'.$p['naziv_promo'].'</a></li>';
            }
            echo "</ul><div class='tab-content'>";
                $j = 0;
                foreach($promo AS $p){
                    if($j==0){
                        $class = 'active';
                    }else{
                        $class = '';
                    }
                    $j++;
                    echo '<div role="tabpanel" class="tab-pane fade in ' . $class . '" id="istaknuto_'.$p['id_promo'].'">';
                    echo "<table class='tabela table' cellspacing='0'>";
                    foreach($p['smestaji'] AS $sm){
                        echo"<tr >
                            <td>{$sm['naziv']}</td>";
                        if($sm['popust']){
                            echo "<td align='right' class='red'>{$sm['popust']}%</td>";
                        }else{
                            echo "<td align='right' class='red'>{$sm['cena']} Eur</td>";
                        }
                        echo "</tr>";
                    }
                    echo "</table>
                        </div>
                    ";
                }
            echo "</div>";
            ?>
        </ul>

    </div>
    </br>
    <div class="anketa">
        <?php
            echo "<h5 align='center'>".$naziv_ankete."</h5>";
            
            
                
           
            
            
            $prvaSlika = $iteracijeAnkete[0]['slika_iteracije'];
            $prviOpis = $iteracijeAnkete[0]['opis_iteracije'];
//            
            $prosecnaOcena = $ocena['drugaOcena']/$ocena['brojDrugaOcena'];
                    
            
            echo "<img src='". base_url($prvaSlika)."' class='img-responsive'/>";
            echo "<h6 align='center'>".$prviOpis."</h6>";
            echo "<div class='radioDugmici'>";
        $radioBtn = array(
            'id' => 'rb1',
            'name' => 'rbOcena',
            'style'=>'margin-left:10px',
            'onClick' => 'oceni()' 
        );
        
        $radioBtn2 = array(
            'id' => 'rb2',
            'name' => 'rbOcena',
            'style'=>'margin-left:10px',
            'onClick' => 'oceni()' 
        );
        $radioBtn3 = array(
            'id' => 'rb3',
            'name' => 'rbOcena',
            'style'=>'margin-left:10px',
            'onClick' => 'oceni()' 
        );$radioBtn4 = array(
            'id' => 'rb4',
            'name' => 'rbOcena',
            'style'=>'margin-left:10px',
            'onClick' => 'oceni()' 
        );
        $radioBtn5 = array(
            'id' => 'rb5',
            'name' => 'rbOcena',
            'style'=>'margin-left:10px',
            'onClick' => 'oceni()' 
        );
        $atributi = array(
          'style' =>'text-align:center'  
        );
        
        echo form_open('',$atributi);
        
        echo "<label class='radio-inline'>";
        echo form_radio($radioBtn, '1', false);
        echo "1";
        echo "</label>";
        
        echo "<label class='radio-inline'>";
        echo form_radio($radioBtn2, '2', false);
        echo "2";
        echo "</label>";
        
        echo "<label class='radio-inline'>";
        echo form_radio($radioBtn3, '3', false);
        echo "3";
        echo "</label>";
        
        echo "<label class='radio-inline'>";
        echo form_radio($radioBtn4, '4', false);
        echo "4";
        echo "</label>";
        
        echo "<label class='radio-inline'>";
        echo form_radio($radioBtn5, '5', false);
        echo "5";
        echo "</label>";
        
        echo form_close();
        echo "</div>";
            echo "<p align='center' class='red'>Prosecna ocena : ".$prosecnaOcena."</p>";
            echo "";
            
        ?>
    </div>
</div>