function goReg() {
  var connect, form, response,  result, user, pass, email, tyc, pass_dos, long;
  user = __('user_reg').value;
  pass = __('pass_reg').value;
  email = __('email_reg').value;
  pass_dos = __('pass_reg_dos').value;
  tyc = __('tyc_reg').checked ? true : false;

  if(true == tyc) {
    if(user != '' && pass != '' && pass_dos != '' && email != '') {
      if(pass == pass_dos && pass >= 8 && pass_dos >= 8 ) {
        form = 'user=' + user + '&pass=' + pass + '&email=' + email;

        if (window.XMLHttpRequest) {  /*En esta parte se valida el objeto XMLHTTP para Chorme, mozillla, IE y versiones viejitas*/
          // code for modern browsers
          connect = new XMLHttpRequest();
       } else {
          // code for old IE browsers
          connect= new ActiveXObject("Microsoft.XMLHTTP");
      }



        connect.onreadystatechange = function() {
          if(connect.readyState == 4 && connect.status == 200) {
                      if(connect.responseText === 1) {

                            __('_AJAX_REG_').innerHTML = connect.responseText;


                            } else {
                                /*alert('Exito');*/

                              result = '<div class="alert alert-dismissible alert-success"><p><strong>El usuario se ha registrado existosamente, revisa tu correo para activar tu cuenta! </p></div>';
                              __('_AJAX_REG_').innerHTML = result;

                              setInterval('window.location.reload()', 4000);
                            }

            } else if(connect.readyState != 4) {
            result = '<div class="alert alert-dismissible alert-warning">';
            result += '<button type="button" class="close" data-dismiss="alert">x</button>';

            result += '<p><strong>Estamos procesando tu registro...</strong></p>';
            result += '</div>';
            __('_AJAX_REG_').innerHTML = result;


          }
        }

        connect.open('POST','enrutador.php?mode=reg',true);
        connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
        connect.send(form);
      } else {
        result = '<div class="alert alert-dismissible alert-danger">';
        result += '<button type="button" class="close" data-dismiss="alert">x</button>';

        result += '<p><strong>Las contraseñas deben ser iguales y tener como mínimo 8 caracteres.</strong></p>';
        result += '</div>';
        __('_AJAX_REG_').innerHTML = result;
      }
    } else {
      result = '<div class="alert alert-dismissible alert-danger">';
      result += '<button type="button" class="close" data-dismiss="alert">x</button>';

      result += '<p><strong>Todos los campos deben estar llenos.</strong></p>';
      result += '</div>';
      __('_AJAX_REG_').innerHTML = result;
    }
  } else {
    result = '<div class="alert alert-dismissible alert-danger">';
    result += '<button type="button" class="close" data-dismiss="alert">x</button>';

    result += '<p><strong>Los términos y condiciones deben ser aceptados.</strong></p>';
    result += '</div>';
    __('_AJAX_REG_').innerHTML = result;
  }

}

function runScriptReg(e) {
  if(e.keyCode == 13) { /*Se acciona al presionar enter desde el formulario */
    goReg();
  }
}
