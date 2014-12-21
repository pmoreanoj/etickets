
	
    <!-- footerTopSection -->
        <div class="footerTopSection">
            <div class="container">
                <div class="row">
                    <div class="col-md-2">
                        <h4>¡Síguenos!</h4>
                        <a href="#">Facebook</a><br>
                        <a href="#">Twitter</a><br>
                         
                    </div>
                    <div class="col-md-2">
                        <h4>Quiénes Somos</h4>
                        <a href="#">Trabaja con Nosotros</a><br>
                        <a href="#">Contáctanos</a><br>
                        <a href="#">Puntos de Distribución</a><br>
                    </div>
                    <div class="col-md-2">
                        <h4>Nuestros Eventos</h4>
                        <a href="#">Conciertos</a><br>
                        <a href="#">Partidos de Fútbol</a><br>
                    </div>
                    <div class="col-md-2">
                        <h4>Nuestros Socios</h4>
                        <a href="#">Conócelos</a><br>
                        <a href="#">Conviértete en uno</a><br>
                    </div>
                    <div class="col-md-2">
                        <h4>Términos y Condiciones</h4>
                        <a href="terms_conditions.php">Compras en línea</a><br>
                        <a href="#">Preguntas Frecuentes</a><br>
                    </div>
                </div>
            </div>
        </div>
    <!-- footerBottomSection -->	
	<div class="footerBottomSection">
            <div class="container">&copy; 2014, Todos los derechos reservados. 
                <a href="#">Políticas de privacidad</a> 
                <div class="pull-right"> <a href="index.php"><img src="<?php echo base_url(); ?>assets/custom/img/eLogo.png" alt="My web solution" /></a></div>
            </div>
	</div>
	
<!-- JS Global Compulsory -->			
<script type="text/javascript" src="<?php echo base_url(); ?>assets/custom/js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/custom/js/modernizr.custom.js"></script>		
<script type="text/javascript" src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>	
	
<!-- JS Implementing Plugins -->           
<script type="text/javascript" src="<?php echo base_url(); ?>assets/custom/js/jquery.flexslider-min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/custom/js/modernizr.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/custom/js/jquery.cslider.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>assets/custom/js/back-to-top.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/custom/js/jquery.sticky.js"></script>

<!-- JS Page Level -->           
<script type="text/javascript" src="<?php echo base_url(); ?>assets/custom/js/app.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/custom/js/index.js"></script>


<script type="text/javascript">
    jQuery(document).ready(function() {
      	App.init();
        App.initSliders();
        Index.initParallaxSlider();
    });
</script>

<script>
    $("#btnPagoPaypal").submit(function(event) {
        $.post( "<?php echo base_url(); ?>payments/buy" , { localidad: $( "#localidad option:selected" ).text() } );
    });
</script>
</body>
</html>
