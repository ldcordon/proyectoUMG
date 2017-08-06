<?php

if(isset($_GET['key'])){
  $db = new Conexion();
  #$id = $_SESSION['app_id'];
  $id = $_GET["user"];
  $key = $db->real_escape_string($_GET['key']);
  $sql = $db->query("SELECT id FROM users WHERE usuario='$id' AND keyreg = '$key' LIMIT 1;");

  if($db->rows($sql)>0){
    $db->query("UPDATE users set activo = '1', keyreg = '' where usuario='$id';");
    header('location: ?view=index&success=true');
  }else{
    header('location: ?view=index&error=true');
  }
    $db->liberar($sql);
  $db->close();
}else{

include('vista/html/forms/formRequireLogin.php');
}

/*echo $key;
echo '</br>';
echo $id;*/

 ?>
