<?php
    if(!$this->session->userdata('user')){?>
        <div class='logo-login marginTop625p  col-md-5 col-md-offset-1 col-lg-4 col-lg-offset-2 hidden-sm hidden-xs'>
            <img src='<?php print base_url(); ?>assets/images/slika01.png' class='img-circle img-responsive'/>
        </div>
<div class='col-xs-8 col-xs-offset-2 col-sm-6 col-sm-offset-3 col-md-5 col-md-offset-0 col-lg-6'>
<div class='login_div col-sm-12 col-lg-6 col-lg-offset-0'>
    <?php
        if(isset($no_user)){
            echo $no_user;
        }
    ?>
    <legend class='green'>Login</legend>
    <?php echo form_open('home/login'); 
    
    $username=array
    (
        'name' => 'tbUser',
        'id' => 'tbUser',
        'placeholder' => 'Unesite ovde vase korisnicko ime',
        'class' => 'form-control',
        'value' => set_value('tbUser')
    );
    $pass = array
    (
        'name' => 'tbPass',
        'id' => 'tbPass',
        'placeholder' => 'Ovde ukucajte Vasu sifru',
        'class' => 'form-control'
    );
    $btnLogin = array
    (
        'type'=>'submit',
        'name'=>'btnLogin',
        'id'=>'btnLogin-1',
        'class' => 'btn btn-default text-center col-lg-12 marginTop20',
        'content'=>'Ulogujte se',
        'align'=>'right',
        'onClick' => 'login()'
    );
    
    echo '<label for="tbUser">korisnicko ime</label> '
        .form_input($username).
        form_error('tbUser').
        '<label for="tbPass">Sifra</label>'
        . form_password($pass).
        form_error('tbPass').
        form_button($btnLogin)
        . "<div class='clearfix'></div><h5><a href='/home/registracija' class='show_registration' onClick=''>Napravite nalog</a></h5>";
    echo form_close();
?>
    
</div>
</div>

<?php
    }

?>


