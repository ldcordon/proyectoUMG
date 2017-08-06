<?php include(HTML_DIR .'secciones/header.php') ; ?>
<?php  include(HTML_DIR .'secciones/top_nav.php') ; ?>

<body>
<section class="engine"><a rel="nofollow" href="#"><?php echo APP_TITLE ?></a></section>

<?php
if(isset($_GET['success_reg'])){
  echo '
  <section class="mbr-section mbr-after-navbar">
  <div class="mbr-section__container container mbr-section__container--isolated">
    <div class="alert alert-dismissible alert-success">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>Exito:</strong> Usuario Registrado exitosamente
    </div>
  </div>
  </section>';
}
?>



<?php
if(isset($_GET['success'])){
  echo '

  <section class="mbr-section mbr-after-navbar">
  <div class="mbr-section__container container mbr-section__container--isolated">
    <div class="alert alert-dismissible alert-success">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>Exito:</strong> Usuario activado exitosamente, debes loguearte para iniciar una sesion! <a data-toggle="modal" data-target="#Login">Iniciar Sesión</a>
    </div>
  </div>
  </section>';

}

?>



<?php
if(isset($_GET['error'])){
 echo var_dump($_GET);
  echo '
  <section class="mbr-section mbr-after-navbar">
  <div class="mbr-section__container container mbr-section__container--isolated">
    <div class="alert alert-dismissible alert-danger">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>Error:</strong> No se ha podido activar el usuario
    </div>
  </div>
  </section>';

}
?>


<?php
 include(HTML_DIR . '/pages/login.html');
 include(HTML_DIR . '/pages/registro.html');
?>
































    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/freelancer.min.js"></script>

</body>

</html>
