<html>
    <head>
        <title><?php echo $title; ?></title>
        <link rel="stylesheet" type="text/css" href="<?php print base_url(); ?>assets/style/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?php print base_url(); ?>assets/style/style.css">
        <script type="text/javascript" src="<?php print base_url(); ?>assets/scripts/jquery-2.2.1.min.js"></script>
        <script type="text/javascript" src="<?php print base_url(); ?>assets/style/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/scripts/skripta.js" type="text/javascript"></script>
    </head>
    <body>
    <div class="container-fluid">
    <nav class='navbar'>
        <div class='container-fluid header'>
            <div class='navbar-header'>
                <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#mainNavBar'>
                    <span class='icon-bar'></span>
                    <span class='icon-bar'></span>
                    <span class='icon-bar'></span>
                </button>
                <div class='logo'><a href='<?php print base_url(); ?>home' class='navbar-brand'></a></div>
            </div>
            <div class='collapse navbar-collapse' id='mainNavBar'>
                <ul class=' nav navbar-nav ul_menu'>
                    <?php
                        $activeUrl = basename($_SERVER['PHP_SELF']);
                    ?>
                    <li><a <?php if($activeUrl == 'home') {echo "class='active'";} ?>href='<?php echo base_url(); ?>'>Home</a></li>
                    <li ><a <?php if($activeUrl == 'onama') {echo "class='active'";} ?> href='<?php echo base_url('/home/about'); ?>'>O nama</a></li>
                    <li ><a <?php if($activeUrl == 'kontakt') {echo "class='active'";} ?> href='<?php echo base_url('/home/contact'); ?>'>Kontakt</a></li>
                    <li ><a <?php if($activeUrl == 'galerija') {echo "class='active'";} ?> href='<?php echo base_url(); ?>'>Galerija</a></li>
                </ul>
                <ul class='nav navbar-nav navbar-right ul_menu'>
                    <li  <?php if($this->uri->segment(1) == 'administracija') {echo "class='active'";} ?> class='login'><a href='<?php echo base_url('administracija'); ?> '>Administracija</li></a>
                    <li class='login'><a href='logovanje/logout'>logout</li></a>
                </ul>
                </div>
            </div>
        </nav>
    <div id="centar-admin" class="row">
        <?php
        if(isset($success_message) && $success_message != "" ){
            echo '<div class="alert alert-success alert-dismissible" role="alert"><strong>'.$success_message.'</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>';
        }
        ?>
        <?php
        if(isset($error_message) && $error_message != "" ){
            echo '<div class="alert alert-danger alert-dismissible" role="alert"><strong>' . $error_message . '</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>';
        }
        ?>
        <div id="levo_admin" class="col-xs-12 col-sm-4 col-md-2 col-lg-2 marginTop5p">
            <ul class="list-group">
                <li class="list-group-item"><a href='<?php echo base_url('administracija'); ?>'>Korisnici</a></li>
                <li class="list-group-item"><a href='<?php echo base_url('administracija/meni'); ?>'>Meni</a></li>
                <li class="list-group-item"><a href='<?php echo base_url('administracija/linkovi'); ?>'>Linkovi</a></li>
                <li class="list-group-item"><a href='<?php echo base_url('administracija/prikaziPromo'); ?>'>Promo</a></li>
                <li class="list-group-item"><a href='<?php echo base_url('/administracija/slike'); ?>'>Slike</a></li>
                <li class="list-group-item"><a href='<?php echo base_url('administracija/slider'); ?>'>Slider</a></li>
                <li class="list-group-item"><a href='<?php echo base_url('administracija/galerija'); ?>'>Galerija</a></li>
                <li class="list-group-item"><a href='<?php echo base_url('administracija/anketa'); ?>'>Ankete</a></li>
                <li class="list-group-item"><a href='<?php echo base_url('administracija/rezervacije'); ?>'>Rezervacije</a></li>
                <li class="list-group-item"><a href='<?php echo base_url('administracija/smestaji'); ?>'>Smestaji</a></li>
                <li class="list-group-item"><a href='<?php echo base_url('administracija/sezone'); ?>'>Sezone</a></li>
            </ul>
        </div>
        <div id="desno_admin" class="col-xs-12 col-sm-8 col-md-10 col-lg-10 marginTop5p">