// PERSONA NATUTRAL
const persona_natural = document.getElementById('persona_natutal');
const inputs_persona_natutal = document.querySelectorAll('#persona_natutal input');
const selects_persona_natural = document.querySelectorAll('#persona_natutal select');
const siguiente_persona_natural = document.getElementById('nestBtm');

// VALIDATIONS
const expresiones = {
	//usuario: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo
	nombres: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
	//password: /^.{4,12}$/, // 4 a 12 digitos.
	correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	telefono: /^\d{7,10}$/, // 7 a 17 numeros.
   fecha: /^\d{4}([\-/.])(0?[1-9]|1[1-2])\1(3[01]|[12][0-9]|0?[1-9])$/,
   direccion: /^[a-zA-ZÀ-ÿ-z0-9'\.\-\s\,]+$/,
}

const fieldsRequireStep1 = {
   contenedor: false,
   nombres: false,
   apellido1: false,
   tipodocumento: false,
   numerodocumento: false,
   sexo: false,
   fecha_nacimiento: false,
   nacionalidad: false,
   telfCelular: false,
   telfCelular2: false,
   eMail: false,
   cm3: false,
   provincia: false,
   ciudad: false,
   direccion: false,
   vigenciafirma: false
}

const validarFormsFirma = (e) => {
   switch (e.target.name){
      case "nombres":
         validateField(expresiones.nombres, e.target, 'nombres');
      break;
      case "apellido1":
         validateField(expresiones.nombres, e.target, 'apellido1');
      break;
      case "apellido2":
         validateField(expresiones.nombres, e.target, 'apellido2');
      break;
      case "fecha_nacimiento":
         validateField(expresiones.fecha, e.target, 'fecha_nacimiento');
      break;
      case "nacionalidad":
         validateField(expresiones.nombres, e.target, 'nacionalidad');
      break;
      case "telfCelular":
         validateField(expresiones.telefono, e.target, 'telfCelular');
      break;
      case "telfCelular2":
         validateField(expresiones.telefono, e.target, 'telfCelular2');
      break;
      case "telfFijo":
         validateField(expresiones.telefono, e.target, 'telfFijo');
      break;
      case "eMail":
         validateField(expresiones.correo, e.target, 'eMail');
      break;
      case "cm3":
         validateField(expresiones.correo, e.target, 'cm3');
      break;
      case "ciudad":
         validateField(expresiones.nombres, e.target, 'ciudad');
      break;
      case "contenedor":
         validateSelect(e.target, 'contenedor');
      break;
      case "tipodocumento":
         validateSelect(e.target, 'tipodocumento');
      break;
      case "sexo":
         validateSelect(e.target, 'sexo');
      break;
      case "provincia":
         validateSelect(e.target, 'provincia');
      break;
      case "vigenciafirma":
         validateSelect(e.target, 'vigenciafirma');
      break;
      case "direccion":
         validateField(expresiones.direccion, e.target, 'direccion');
      break;
      case "cm4":
         validateField(expresiones.direccion, e.target, 'cm4');
      break;
      case "forma_pago":
         validateSelect(e.target, 'forma_pago');
      break;
      case "nombres_fact":
         validateField(expresiones.nombres, e.target, 'nombres_fact');
      break;
      case "correo_fact":
         validateField(expresiones.correo, e.target, 'correo_fact');
      break;
      case "direccion_fact":
         validateField(expresiones.direccion, e.target, 'direccion_fact');
      break;
      case "telef_fact":
         validateField(expresiones.telefono, e.target, 'telef_fact');
      break;
      case "empresa":
         validateField(expresiones.direccion, e.target, 'empresa');
      break;
      case "cargo":
         validateField(expresiones.nombres, e.target, 'cargo');
      break;
      case "nombresRL":
         validateField(expresiones.nombres, e.target, 'nombresRL');
      break;
      case "apellidosRL":
         validateField(expresiones.nombres, e.target, 'apellidosRL');
      break;
      case "tipodocumentoRL":
         validateSelect(e.target, 'tipodocumentoRL');
      break;
      case "xxxx":
         
      break;
   }
}

const validateField = (expresion, input, campo) => {
   if(expresion.test(input.value)){
      document.getElementById(`g_${campo}`).classList.remove('has-error');
      document.getElementById(`g_${campo}`).classList.add('has-success');
      document.getElementById(`error_${campo}`).classList.add('ocultar');
      fieldsRequireStep1[campo] = true;
   }else{
      document.getElementById(`g_${campo}`).classList.add('has-error');
      document.getElementById(`g_${campo}`).classList.remove('has-success');
      document.getElementById(`error_${campo}`).classList.remove('ocultar');
      fieldsRequireStep1[campo] = false;
   }
}

const validateSelect = (select, campo) => {
   if(select.value != ""){
      document.getElementById(`g_${campo}`).classList.remove('has-error');
      document.getElementById(`g_${campo}`).classList.add('has-success');
      document.getElementById(`error_${campo}`).classList.add('ocultar');
      fieldsRequireStep1[campo] = true;
   }else{
      document.getElementById(`g_${campo}`).classList.add('has-error');
      document.getElementById(`g_${campo}`).classList.remove('has-success');
      document.getElementById(`error_${campo}`).classList.remove('ocultar');
      fieldsRequireStep1[campo] = false;
   }
}

function ruc(x){
   
   if(x == 1){
      document.getElementById('g_ruc_personal').classList.remove('ocultar');
      document.getElementById('ruc_personal').setAttribute('required', 'required');

      document.getElementById('g_f_copiaruc').classList.remove('ocultar');
      document.getElementById('f_copiaruc').setAttribute('required', 'required');
      
   }else{
      document.getElementById('g_ruc_personal').classList.add('ocultar');
      document.getElementById('ruc_personal').removeAttribute('required');

      document.getElementById('g_f_copiaruc').classList.add('ocultar');
      document.getElementById('f_copiaruc').removeAttribute('required');
      
   }
}

function token(){
   var container = document.getElementById('contenedor').value;
   if(container == 1){
      document.getElementById('g_cm4').classList.remove('ocultar');
      document.getElementById('cm4').setAttribute('required', 'required');

      document.getElementById('g_cm2').classList.remove('ocultar');
      document.getElementById('cm2').setAttribute('required', 'required');
   }else{
      document.getElementById('g_cm4').classList.add('ocultar');
      document.getElementById('cm4').removeAttribute('required');

      document.getElementById('g_cm2').classList.add('ocultar');
      document.getElementById('cm2').removeAttribute('required');
   }
}

function factElec(x){
   if(x == 0){
      document.getElementById('g_ruc_ced_fact').classList.remove('ocultar');
      document.getElementById('ruc_ced_fact').setAttribute('required', 'required');

      document.getElementById('g_nombres_fact').classList.remove('ocultar');
      document.getElementById('nombres_fact').setAttribute('required', 'required');

      document.getElementById('g_correo_fact').classList.remove('ocultar');
      document.getElementById('correo_fact').setAttribute('required', 'required');

      document.getElementById('g_direccion_fact').classList.remove('ocultar');
      document.getElementById('direccion_fact').setAttribute('required', 'required');

      document.getElementById('g_telef_fact').classList.remove('ocultar');
      document.getElementById('telef_fact').setAttribute('required', 'required');

      

   }else{
      document.getElementById('g_ruc_ced_fact').classList.add('ocultar');
      document.getElementById('ruc_ced_fact').removeAttribute('required');

      document.getElementById('g_nombres_fact').classList.add('ocultar');
      document.getElementById('nombres_fact').removeAttribute('required');

      document.getElementById('g_correo_fact').classList.add('ocultar');
      document.getElementById('correo_fact').removeAttribute('required');

      document.getElementById('g_direccion_fact').classList.add('ocultar');
      document.getElementById('direccion_fact').removeAttribute('required');

      document.getElementById('g_telef_fact').classList.add('ocultar');
      document.getElementById('telef_fact').removeAttribute('required');

      
   }
}

// VALIDATE INPUTS FILES
function validateInputFilePhoto(fileName)
{
   var filePhoto = document.getElementById(`${fileName}`);
   var fileRoute = filePhoto.value;
   var validExpression = /(.JPG|.jpg|.jpeg|.JPEG)$/i;
   if(!validExpression.exec(fileRoute)){
      alert('Asegurese de haber seleccionado un JPG');
      filePhoto.value = '';
      return false;
   }else{
      if (filePhoto.files && filePhoto.files[0]) 
      {
            var visor = new FileReader();
            visor.onload = function(e) 
            {
               document.getElementById(`visor_${fileName}`).innerHTML = 
               '<embed src="'+e.target.result+'" width="350" />';
            };
            visor.readAsDataURL(filePhoto.files[0]);
      }
   }
}

function validateInputFilePdf(fileName)
{
   var filePhoto = document.getElementById(`${fileName}`);
   var fileRoute = filePhoto.value;
   var validExpression = /(.PDF|.pdf)$/i;
   if(!validExpression.exec(fileRoute)){
      alert('Asegurese de haber seleccionado un PDF');
      filePhoto.value = '';
      return false;
   }else{
      if (filePhoto.files && filePhoto.files[0]) 
      {
            var visor = new FileReader();
            visor.onload = function(e) 
            {
               document.getElementById(`visor_${fileName}`).innerHTML = 
               '<embed src="'+e.target.result+'" width="350" />';
            };
            visor.readAsDataURL(filePhoto.files[0]);
      }
   }
}

function validateInputFileSome(fileName)
{
   var filePhoto = document.getElementById(`${fileName}`);
   var fileRoute = filePhoto.value;
   var validExpression = /(.PDF|.pdf|.jpg|.JPG|.jpeg|.JPEG|.mp4|.MP4)$/i;
   if(!validExpression.exec(fileRoute)){
      alert('Asegurese de haber seleccionado un PDF o JPG o MP4');
      filePhoto.value = '';
      return false;
   }else{
      if (filePhoto.files && filePhoto.files[0]) 
      {
            var visor = new FileReader();
            visor.onload = function(e) 
            {
               document.getElementById(`visor_${fileName}`).innerHTML = 
               '<embed src="'+e.target.result+'" width="350" />';
            };
            visor.readAsDataURL(filePhoto.files[0]);
      }
   }
}

function validateInputFilePdfJpg(fileName)
{
   var filePhoto = document.getElementById(`${fileName}`);
   var fileRoute = filePhoto.value;
   var validExpression = /(.PDF|.pdf|.jpg|.JPG|.jpeg|.JPEG)$/i;
   if(!validExpression.exec(fileRoute)){
      alert('Asegurese de haber seleccionado un PDF o JPG o MP4');
      filePhoto.value = '';
      return false;
   }else{
      if (filePhoto.files && filePhoto.files[0]) 
      {
            var visor = new FileReader();
            visor.onload = function(e) 
            {
               document.getElementById(`visor_${fileName}`).innerHTML = 
               '<embed src="'+e.target.result+'" width="350" />';
            };
            visor.readAsDataURL(filePhoto.files[0]);
      }
   }
}

function validateInputFileMp4(fileName)
{
   var filePhoto = document.getElementById(`${fileName}`);
   var fileRoute = filePhoto.value;
   var validExpression = /(.mp4|.MP4)$/i;
   if(!validExpression.exec(fileRoute)){
      alert('Asegurese de haber seleccionado un MP4');
      filePhoto.value = '';
      return false;
   }else{
      if (filePhoto.files && filePhoto.files[0]) 
      {
            var visor = new FileReader();
            visor.onload = function(e) 
            {
               document.getElementById(`visor_${fileName}`).innerHTML = 
               '<embed src="'+e.target.result+'" width="350" />';
            };
            visor.readAsDataURL(filePhoto.files[0]);
      }
   }
}

inputs_persona_natutal.forEach((input) => {
   input.addEventListener('keyup', validarFormsFirma);
   input.addEventListener('blur', validarFormsFirma);
   
});

selects_persona_natural.forEach((select) => {
   select.addEventListener('keyup', validarFormsFirma);
   select.addEventListener('blur', validarFormsFirma);
});

siguiente_persona_natural.addEventListener('click', () =>{
   if(fieldsRequireStep1.contenedor &&
      fieldsRequireStep1.nombres &&
      fieldsRequireStep1.apellido1 &&
      fieldsRequireStep1.apellido2 &&
      fieldsRequireStep1.tipodocumento &&
      fieldsRequireStep1.numerodocumento &&
      fieldsRequireStep1.sexo &&
      fieldsRequireStep1.fecha_nacimiento &&
      fieldsRequireStep1.nacionalidad &&
      fieldsRequireStep1.telfCelular &&
      fieldsRequireStep1.telfCelular2 &&
      fieldsRequireStep1.eMail &&
      fieldsRequireStep1.cm3 &&
      fieldsRequireStep1.provincia &&
      fieldsRequireStep1.ciudad &&
      fieldsRequireStep1.direccion &&
      fieldsRequireStep1.vigenciafirma)
      {
         //alert('Campos correctos');
      }else{
         //alert('Debe llenar los campos requeridos o Algún campo tiene informacion erronea');
      }
});

// VALIDATE CEDULA, RUC Y PASAPORTE
function validarDocumento(doc){
   numero = document.getElementById(doc).value;
   /* alert(doc); */

      var suma = 0;      
      var residuo = 0;      
      var pri = false;      
      var pub = false;            
      var nat = false;      
      var numeroProvincias = 22;                  
      var modulo = 11;
                  
      /* Verifico que el campo no contenga letras */                  
      var ok=1;
      for (i=0; i<numero.length && ok==1 ; i++){
         var n = parseInt(numero.charAt(i));
         if (isNaN(n)) ok=0;
      }
      if (ok==0){
         alert("No puede ingresar caracteres en el número");   
         document.getElementById(`g_${doc}`).classList.add('has-error');
         document.getElementById(`g_${doc}`).classList.remove('has-success');      
         return false;
      }
                  
      if (numero.length < 10 ){              
         alert('El número ingresado no es válido'); 
         document.getElementById(`g_${doc}`).classList.add('has-error');
         document.getElementById(`g_${doc}`).classList.remove('has-success');                  
         return false;
      }
     
      /* Los primeros dos digitos corresponden al codigo de la provincia */
      provincia = numero.substr(0,2);      
      if (provincia < 1 || provincia > numeroProvincias){           
         alert('El código de la provincia (dos primeros dígitos) es inválido');
         document.getElementById(`g_${doc}`).classList.add('has-error');
            document.getElementById(`g_${doc}`).classList.remove('has-success'); 
     return false;       
      }

      /* Aqui almacenamos los digitos de la cedula en variables. */
      d1  = numero.substr(0,1);         
      d2  = numero.substr(1,1);         
      d3  = numero.substr(2,1);         
      d4  = numero.substr(3,1);         
      d5  = numero.substr(4,1);         
      d6  = numero.substr(5,1);         
      d7  = numero.substr(6,1);         
      d8  = numero.substr(7,1);         
      d9  = numero.substr(8,1);         
      d10 = numero.substr(9,1);                
         
      /* El tercer digito es: */                           
      /* 9 para sociedades privadas y extranjeros   */         
      /* 6 para sociedades publicas */         
      /* menor que 6 (0,1,2,3,4,5) para personas naturales */ 

      if (d3==7 || d3==8){           
         alert('El tercer dígito ingresado es inválido');                     
         document.getElementById(`g_${doc}`).classList.add('has-error');
            document.getElementById(`g_${doc}`).classList.remove('has-success'); 
         return false;
      }         
         
      /* Solo para personas naturales (modulo 10) */         
      if (d3 < 6){           
         nat = true;            
         p1 = d1 * 2;  if (p1 >= 10) p1 -= 9;
         p2 = d2 * 1;  if (p2 >= 10) p2 -= 9;
         p3 = d3 * 2;  if (p3 >= 10) p3 -= 9;
         p4 = d4 * 1;  if (p4 >= 10) p4 -= 9;
         p5 = d5 * 2;  if (p5 >= 10) p5 -= 9;
         p6 = d6 * 1;  if (p6 >= 10) p6 -= 9; 
         p7 = d7 * 2;  if (p7 >= 10) p7 -= 9;
         p8 = d8 * 1;  if (p8 >= 10) p8 -= 9;
         p9 = d9 * 2;  if (p9 >= 10) p9 -= 9;             
         modulo = 10;
      }         

      /* Solo para sociedades publicas (modulo 11) */                  
      /* Aqui el digito verficador esta en la posicion 9, en las otras 2 en la pos. 10 */
      else if(d3 == 6){           
         pub = true;             
         p1 = d1 * 3;
         p2 = d2 * 2;
         p3 = d3 * 7;
         p4 = d4 * 6;
         p5 = d5 * 5;
         p6 = d6 * 4;
         p7 = d7 * 3;
         p8 = d8 * 2;            
         p9 = 0;            
      }         
         
      /* Solo para entidades privadas (modulo 11) */         
      else if(d3 == 9) {           
         pri = true;                                   
         p1 = d1 * 4;
         p2 = d2 * 3;
         p3 = d3 * 2;
         p4 = d4 * 7;
         p5 = d5 * 6;
         p6 = d6 * 5;
         p7 = d7 * 4;
         p8 = d8 * 3;
         p9 = d9 * 2;            
      }
                
      suma = p1 + p2 + p3 + p4 + p5 + p6 + p7 + p8 + p9;                
      residuo = suma % modulo;                                         

      /* Si residuo=0, dig.ver.=0, caso contrario 10 - residuo*/
      digitoVerificador = residuo==0 ? 0: modulo - residuo;                

      /* ahora comparamos el elemento de la posicion 10 con el dig. ver.*/                         
      if (pub==true){           
         if (digitoVerificador != d9){                          
            alert('El ruc de la empresa del sector público es incorrecto.');            
            document.getElementById(`g_${doc}`).classList.add('has-error');
            document.getElementById(`g_${doc}`).classList.remove('has-success'); 
            return false;
         }                  
         /* El ruc de las empresas del sector publico terminan con 0001*/         
         if ( numero.substr(9,4) != '0001' ){                    
            alert('El ruc de la empresa del sector público debe terminar con 0001');
            document.getElementById(`g_${doc}`).classList.add('has-error');
            document.getElementById(`g_${doc}`).classList.remove('has-success'); 
            return false;
         }
      }         
      else if(pri == true){         
         if (digitoVerificador != d10){                          
            alert('El ruc de la empresa del sector privado es incorrecto.');
            document.getElementById(`g_${doc}`).classList.add('has-error');
            document.getElementById(`g_${doc}`).classList.remove('has-success'); 
            return false;
         }         
         if ( numero.substr(10,3) != '001' ){                    
            alert('El ruc de la empresa del sector privado debe terminar con 001');
            document.getElementById(`g_${doc}`).classList.add('has-error');
            document.getElementById(`g_${doc}`).classList.remove('has-success'); 
            return false;
         }
      }      

      else if(nat == true){         
         if (digitoVerificador != d10){                          
            alert('El número de cédula de la persona natural es incorrecto.');
            document.getElementById(`g_${doc}`).classList.add('has-error');
            document.getElementById(`g_${doc}`).classList.remove('has-success'); 
            return false;
         }         
         if (numero.length >10 && numero.substr(10,3) != '001' ){                    
            alert('El ruc de la persona natural debe terminar con 001');
            document.getElementById(`g_${doc}`).classList.add('has-error');
            document.getElementById(`g_${doc}`).classList.remove('has-success'); 
            return false;
         }
      }
      document.getElementById(`g_${doc}`).classList.remove('has-error');
      document.getElementById(`g_${doc}`).classList.add('has-success');
      return true;  
}