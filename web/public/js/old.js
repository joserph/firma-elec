
//Revisar Año
function revisarano(elemento) {

        var validos = "0123456789";

        var letra;
        var bien = true;
        for (var i=0; i<elemento.value.length; i++) {
        letra=elemento.value.charAt(i).toLowerCase()
        if (validos.indexOf(letra) == -1){bien=false;};
        }
        if (!bien) {
          //alert("Error. Caracteres no aceptados");
          elemento.focus();
        }
        else
        {
          if (elemento.value < 2016 && elemento.value.length > 0)
          {
            //alert("Error. Año Menor a 2016");
            elemento.focus();
          }
        }
}

//Numeros Decimales
function NumCheck(e, field) {
  key = e.keyCode ? e.keyCode : e.which
  // backspace
  if (key == 8) return true
  // 0-9
  if (key > 47 && key < 58) {
    if (field.value == "") return true
    regexp = /.[0-9]{2}$/
    return !(regexp.test(field.value))
  }
  // .
  if (key == 46) {
    if (field.value == "") return false
    regexp = /^[0-9]+$/
    return regexp.test(field.value)
  }
  // other key
  return false
 
}

//Validacion Varchar
function revisarvachar(elemento) {

        var validos = " abcdefghijklmnopqrstuvwxyz0123456789";

        var letra;
        var bien = true;
        for (var i=0; i<elemento.value.length; i++) {
        letra=elemento.value.charAt(i).toLowerCase()
        if (validos.indexOf(letra) == -1){bien=false;};
        }
        if (!bien ) {
        //alert("Error. Caracteres no aceptados");
        elemento.focus();
        }
}

//Validacion SoloLetras
function revisarletras(elemento) {

        var validos = " abcdefghijklmnopqrstuvwxyz";

        var letra;
        var bien = true;
        for (var i=0; i<elemento.value.length; i++) {
        letra=elemento.value.charAt(i).toLowerCase()
        if (validos.indexOf(letra) == -1){bien=false;};
        }
        if (!bien) {
        alert("Error. Caracteres no aceptados");
        elemento.focus();
        }
}

//Mayusculas Cedula Estudiante - Representante
function ChangeCase(elem)
{
  elem.value = elem.value.toUpperCase();
}

//Validacion Date
function validatedate(inputTextObject) {
    // matches 11/12/2011 or 11-12-2011
    var ret = true;
    var dateformat = /^(0?[1-9]|1[012])[\/\-](0?[1-9]|[12][0-9]|3[01])[\/\-]\d{4}$/;
    // Match the date format through regular expression  
    if (inputTextObject.value.trim() != "") {
        if (inputTextObject.value.trim().match(dateformat)) {
            // document.form1.text1.focus();  
            //Test which seperator is used '/' or '-'  
            var opera1 = inputTextObject.value.split('/');
            var opera2 = inputTextObject.value.split('-');
            lopera1 = opera1.length;
            lopera2 = opera2.length;
            // Extract the string into month, date and year  
            if (lopera1 > 1) {
                var pdate = inputTextObject.value.split('/');
            } else if (lopera2 > 1) {
                var pdate = inputTextObject.value.split('-');
            }
            var mm = parseInt(pdate[0]);
            var dd = parseInt(pdate[1]);
            var yy = parseInt(pdate[2]);
            // Create list of days of a month [assume there is a leap year by default]  
            var ListofDays = [31, 29, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
            if (mm == 1 || mm > 2) {
                if (dd > ListofDays[mm - 1]) {
                    //alert('Invalid date format!');
                    inputTextObject.focus();
                    ret = false;
                }
            }
            if (mm == 2) {
                var lyear = false;
                if ((!(yy % 4) && yy % 100) || !(yy % 400)) {
                    lyear = true;
                }
                if ((lyear == false) && (dd >= 29)) {
                    //alert('Invalid date format!');
                    inputTextObject.focus();
                    ret = false;
                }
                if ((lyear == true) && (dd > 29)) {
                    //alert('Invalid date format!');
                    inputTextObject.focus();
                    ret = false;
                }
            }
        } else {
            //alert("Invalid date format!");
            inputTextObject.focus();
            ret = false;
        }

        if (ret == false) {
          inputTextObject.style.color='red';
        } else {
          inputTextObject.style.color='blue';
        }
        
    }
    return ret;

}