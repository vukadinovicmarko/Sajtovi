<?php
    if(!$this->session->userdata('user')){?>
        <div class='logo-login marginTop625p col-md-5 col-md-offset-1 col-lg-4 col-lg-offset-2 hidden-sm hidden-xs'>
            <img src='<?php print base_url(); ?>assets/images/slika01.png' class='img-circle img-responsive'/>
        </div>

<div class='reg_div col-sm-6 col-sm-offset-3 col-md-5 col-lg-6 col-lg-offset-0'>
<div class='reg_div_okvir col-lg-6 col-lg-offset-0'>
    <legend class='red'>Register</legend>
    <?php
        echo form_open("home/registracija");
        $usernameReg=array
        (
            'name' => 'reg_tbUser',
            'id' => 'reg_tbUser',
            'placeholder' => 'Unesite ovde vase korisnicko ime',
            'class' => 'form-control ',
            'value' => set_value('reg_tbUser')
        );
        $email=array
        (
            'name' => 'reg_tbEmail',
            'id' => 'reg_tbEmail',
            'placeholder' => 'Unesite ovde vase email',
            'class' => 'form-control validate-email ',
            'value' => set_value('reg_tbEmail')
        );
        $passReg = array
        (
            'name' => 'reg_tbPass',
            'id' => 'reg_tbPass',
            'placeholder' => 'Ovde ukucajte Vasu sifru',
            'class' => 'form-control'
        );
        $passReg2 = array
        (
            'name' => 'reg_tbPass2',
            'id' => 'reg_tbPass2',
            'placeholder' => 'Ovde ponovite Vasu sifru',
            'class' => 'form-control'
        );
        $btnReg = array
        (
            'type'=>'submit',
            'name'=>'reg_btnLogin',
            'id'=>'reg_btnLogin',
            'class' => 'btn btn-default text-center col-lg-12 marginTop20',
            'content'=>'Kreirajte nalog',
            'align'=>'right',
            'onClick' => 'login()'
        );
        echo '<label for="reg_tbUser">Korisničko ime</label>'
        .form_input($usernameReg).
                form_error('reg_tbUser').
                '<label for="reg_tbEmail">Email</label>'.
                form_input($email).
                form_error('reg_tbEmail').
                '<label for="reg_tbPass">Šifra</label>'.
                form_password($passReg).
                form_error('reg_tbPass').
                '<label for="reg_tbPass2">Ponovite šifru</label>'.
                form_password($passReg2).
                form_error('reg_tbPass2').
                form_button($btnReg).
                "<div class='clearfix'></div><h5><a href='/home/login' class='show_login' onClick=''>Ulogujte se</a></h5>";
        echo form_close();

                        
    ?>
</div>
    </div>

<?php
    }

?>

