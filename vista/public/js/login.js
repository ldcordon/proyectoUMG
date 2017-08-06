function gologin(){

var connect, form, response, result, user, pass, sesion; /*Se definen las variables a utilizar en la función*/

user = __('user_login').value; /*Se reciben los valores de los campos del formulario html #Login*/
pass = __('pass_login').value;
/*sesion = __('session_login').checked ? true : false;*/

if(user != '' && pass != ''){
  form = 'user=' + user + '&pass=' + pass /*+ '&sesion=' + sesion*/;  /*Se concatenan los parametros de esta funcion con los parametros a enviar al formulario*/
    /*connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');*/
    if (window.XMLHttpRequest) {  /*En esta parte se valida el objeto XMLHTTP para Chorme, mozillla, IE y versiones viejitas*/
      // code for modern browsers
      connect = new XMLHttpRequest();
   } else {
      // code for old IE browsers
      connect= new ActiveXObject("Microsoft.XMLHTTP");
  }
  connect.onreadystatechange = function() {
  if(connect.readyState == 4 && connect.status == 200) { /*Evalua los mensajes del servidor para verificar que exista respuesta y que la peticion se ha procesado*/
    if(connect.responseText == 1){  /**/
        __('_LOGIN_').innerHTML = connect.responseText; /*Se pasa el mensaje del servidor por medio de innerHTML al encabezado del formulario html con nombre _LOGIN_*/

    /*  setInterval('window.location.reload()', 3000);*/
              }else {

              result = '<div class="alert alert-dismissible alert-success">';
                result += '<p><strong>Accediendo...</strong></p>';
                result += '</div>';
                __('_LOGIN_').innerHTML = result;
                setInterval('location.href ="http://localhost:8080/proyecto/";', 3000)
              }

            }else if(connect.readyState != 4){
              result = '<div class="alert alert-dismissible alert-warning">';
              result += '<button type="button" class="close" data-dismiss="alert">x</button>';
              result += '<h4>Procesando...</h4>';
              result += '<p><strong>Intentando loguear....</strong></p>';
              result += '</div>';
              __('_LOGIN_').innerHTML = result;

      }
  }

}else{
  result = '<div class="alert alert-dismissible alert-warning">';
  result += '<button type="button" class="close" data-dismiss="alert">x</button>';
  /*result += '<h4>Procesando...</h4>';*/
  result += '<p><strong>Los campos se encuentran vacios</strong></p>';
  result += '</div>';
  __('_LOGIN_').innerHTML = result;

}







connect.open('POST','enrutador.php?mode=login',true); /*Se envia por medio de post el parametro 'login' al archivo ajax.php, para que sea redireccionado a goLogin.php*/
connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
connect.send(form);

}

function runScriptLogin(e){
  if(e.keyCode == 13){ /*Al momento de presionar la tecla Enter en el formulario, se activa la función runScriptLogin, */
    gologin();
  }

}
