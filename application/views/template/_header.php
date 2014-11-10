<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>E-Tickets - El entretenimiento nunca fue tan fácil y seguro</title>
        <!-- Bootstrap core CSS -->
        <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- CSS Implementing Plugins -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/custom/css/flexslider.css" type="text/css" media="screen">    	
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/custom/css/parallax-slider.css" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/font-awesome-4.0.3/css/font-awesome.min.css" type="text/css">

        <!-- Custom styles for this template -->
	
        <link href="<?php echo base_url(); ?>assets/custom/css/business-plate.css" rel="stylesheet">
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/custom/ico/favicon.ico">
    </head>
    <!-- NAVBAR
================================================== -->
<style>
/* imagen en forma de miniatura */
.figure {
background-color: #FFF;
border: 10px solid #FFF;
left:25%; /* la posición en la pantalla es la parte engorrosa del asunto */
position: relative;
width:120px; /* el tamaño de la miniatura */
-moz-box-shadow: 0 3px 10px #CCC; /* algo de sombra en Mozilla y Chorme */
-webkit-box-shadow:  0 3px 10px #CCC;
-moz-transform: rotate(3deg); /* lo rotamos levemente en Mozilla y Chorme */
-webkit-transform: rotate(3deg);
}
/* la imagen */
.figure img { width:100%; }
/* el texto */
.figure span {
display: block;
text-align: center;
/* cualquier otra propeidad, color, tamaño y tipo de fuente, etc */
}
/* el efecto al poner el cursor encima */
.figure:hover {
z-index: 9999;
/* eliminamos la rotación y ampliamos la imagen */
-webkit-transform: rotate(0deg) scale(2.2);
-moz-transform: rotate(0deg) scale(2);
}
</style>
    <body>
        <div class="top">
            <div class="container">
                <div class="row-fluid">
                    <ul class="phone-mail">
                        <li><i class="fa fa-phone"></i><span>0984506085</span></li>
                        <li><i class="fa fa-envelope"></i><span>etickets@gmail.com</span></li>
                    </ul>
                    <ul class="loginbar">
                        <li><a href="<?php echo base_url(); ?>nosotros" class="login-btn">Ayuda</a></li>
                        <li class="devider">&nbsp;</li>
                        <li><a href="<?php echo base_url(); ?>login" class="login-btn">Iniciar Sesión</a></li>
                    </ul>
                </div>
            </div>
        </div>
    <!-- topHeaderSection -->	
        <div class="topHeaderSection">		
            <div class="header">			
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/custom/img/eLogo.png" alt="My web solution" /></a>
                    </div>
                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">           
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown active">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Eventos<b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?php echo base_url(); ?>futbol">Partidos de futbol</a></li>
                                    <li><a href="<?php echo base_url(); ?>conciertos">Conciertos</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Nuestros Socios<b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?php echo base_url(); ?>socios">Organizadores</a></li>
                                    <li><a href="<?php echo base_url(); ?>socios">Clubs</a></li>
                                </ul>
                            </li>
                            <li><a href="<?php echo base_url(); ?>nosotros">Quiénes Somos</a></li>
                            <li><a href="<?php echo base_url(); ?>contacto">Contacto</a></li>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>