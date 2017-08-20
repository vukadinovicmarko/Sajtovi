
    <?php

        if(isset($korisnici)){
            echo "<h3 class='green'>Prikaz korisnika</h3>";
            echo $korisnici;
        }

        if(isset($podaci_korisnika)){
            $i=0;
             
            echo form_open();
            foreach($podaci_korisnika['data'] AS $podatak){
                
                echo "
                <div class='form-group'>
                    <label for='promena_$i' class='col-sm-2 control-label text-right'>
                        {$podaci_korisnika['labels'][$i]}
                    </label>
                    <div class='col-sm-6'>
                        <input id='promena_$i' name='{$podaci_korisnika['labels'][$i]}' class='form-control' type='text' ";
                        if($i == 0 || $i == 3){
                            echo " readonly ";
                        }
                        
                        echo " value='$podatak'/>
                            
                    </div>
                <div class='clearfix'></div>
                </div>
                ";
                $i++;
            }
            
            
            echo "<div class='form-group col-sm-8 text-right'>
                    <input type='submit' value='Promeni'/>
                </div>";
            echo form_close();
            
        }
        
        
    ?>
</div>

