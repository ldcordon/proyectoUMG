<?php



require('modelo/classModel/personClass.php');



switch (isset($_GET['mode']) ? $_GET['mode'] : null) {
  case 'add':
    if($_POST) {
      $idu = $_POST['idusuario'];
      $nom = $_POST['nombre'];
      $pass = encrypta($_POST['pass1']);
      $cor = $_POST['email'];

      $vPersona = new doPersona($idu, $nom, $pass, $cor);

      $vPersona->add();

    } else {
      include(HTML_DIR . 'forms/formPerson.php');
    }
  break;

header('location: ?view=error');
}
?>
