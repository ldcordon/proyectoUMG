<?php

function users(){
$db = new Conexion();

$sql = $db->query("SELECT * FROM users;");
if($db->rows($sql) > 0){
  while($d = $db->recorrer($sql)){
  $users[$d['id']] = array(
    'id' => $d['id'],
    'user' => $d['usuario'],
    'pass' => $d['pass'],
    'email' => $d['email'],
    'permisos' => $d['permisos'],
    'new_pass' => $d['new_pass']

  );
}
}else{
  $users = false;

}


$db->liberar($sql);
$db->close();

return $users;

}


 ?>
