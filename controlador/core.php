<?php

/* Este es el nucleo de la apliacion
En este modulo se definen todas las constantes  que se utilizaran dentro del sistema, así como las funciones globales
y aplicaiones de terceros*/


/*Incio de sesión, siempre y cuando se defina dentro de los controladores $_SESSION['app_id']*/
if(!isset($_SESSION['app_id'])){
    session_start();
}


#Constantes de la APP
define('HTML_DIR', 'vista/html/');
define('APP_TITLE', 'Proyecto UMG' );
define('APP_COPY', "Copyrright &copy;" .date('Y',time()). ' Software Aplication. ');
define('APP_URL','http://localhost:8080/Proyecto/');

#Constantes de PHPMailer

define('PHPMAILER_HOST','p3plcpnl0173.prod.phx3.secureserver.net');
define('PHPMAILER_USER','public@ocrend.com');
define('PHPMAILER_PASS','Prinick2016');
define('PHPMAILER_PORT',465);


#Estructura de Conexion
define ('DB_HOST', 'localhost');
define ('DB_USER', 'root');
define ('DB_PASS', '');
define ('DB_NAME', 'proyectodb');


#Estructura


require('vendor/autoload.php');
require('modelo/coreModel/classConexion.php');
require('controlador/funciones/encrypta.php');
require('controlador/funciones/users.php');
require('controlador/funciones/EmailTemplate.php');
#require('core/bin/functions/LostPassTemplate.php');

#functions
$users = users();
