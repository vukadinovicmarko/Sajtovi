<?php
    echo "<h3 class='green'>Prikaz $title</h3>";
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
    echo $tabela_meni;
?>
</div>