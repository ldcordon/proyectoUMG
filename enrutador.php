<?php
if($_POST){
  require('controlador/core.php');
  switch (isset($_GET['mode']) ? $_GET['mode'] : null) {
    case 'login':
      require('controlador/autenticacion/goLogin.php');

      break;

    case 'reg':
      require('controlador/autenticacion/goRegister.php');

      break;

    case 'lostpass':
        require('controlador/autenticacion/goLostpass.php');
        break;

    case 'chpass':
            require('controlador/autenticacion/goChangepassword.php');
            break;



    default:
     header('location: index.php');
      break;
  }

}else {
  header('location: index.php');
}
 ?>
