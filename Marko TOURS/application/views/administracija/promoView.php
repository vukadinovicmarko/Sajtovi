<?php
if(isset($promo)){
            echo "<h3 class='green'>Prikaz promocija</h3>";
            ?>
                <div class="row col-lg-6 col-md-6 col-sm-6">
                    <button type="button" class="btn btn-default showAdd">Dodaj <?php echo $title;?></button>
                    <div class="clearfix"></div>
                    <br/>
                    <div class="row col-lg-12 col-md-12 col-sm-12 hiddenDiv">
                        <?php
                        echo $forma;
                        ?>
                    </div>
                </div>
            <?php
            echo $promo;
        }
        
        if(isset($promocije)){
           
           
           $naziv_promocije = array(
               'id' => 'naziv_promocije',
               'name' => 'naziv_promocije',
               'value' => $promocije[0]['naziv_promo'],
               'class' => 'form-control'
               
           );
           $pozicija = array(
               'id' => 'pozicija_promocije',
               'name' => 'pozicija_promocije',
               'value' => $promocije[0]['pozicija'],
               'class' => 'form-control'
               
           );
           
           $datumPostavljanja = unix_to_human($promocije[0]['datum_dodavanja']);
           
           
           $datumObjave = array(
               'id' => 'datumObjave',
               'name' => 'datumObjave',
               'value' => $datumPostavljanja,
               'class' => 'form-control',
               'readonly' => 'true'
               
           );
           $datumIstice = unix_to_human($promocije[0]['datum_isteka']);
           
           $datumIsteka = array(
               'id' => 'datumIsteka',
               'name' => 'datumIsteka',
               'value' => $datumIstice,
               'class' => 'form-control '
           );
           
           $dugmePromeni = array(
               'type' => 'submit',
               'id' => 'dugmePromeni',
               'name' => 'dugmePromeni',
               'content' => 'Promeni',
               'class' => 'btn btn-default text-center col-lg-4'
           );
           
           
           
           $atributiForme = array(
               'class' => 'col-lg-6'
           );
           
           echo form_open('',$atributiForme);
           echo "<label for='naziv_promocije'>Naziv Promocije</label>";
           echo form_input($naziv_promocije);
           echo "<label for='pozicija_promocije'>Pozicija</label>";
           echo form_input($pozicija);
           echo "<label for='datumObjave'>Datum dodavanja</label>";
           echo form_input($datumObjave);
           echo "<label for='datumIsteka'>Datum isteka</label>";
           echo form_input($datumIsteka);
           echo "<br>";
           echo form_button($dugmePromeni);
           echo form_close();
           
           
        }
        
?>

</div>