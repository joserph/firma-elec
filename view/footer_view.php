
</div>
</div>

    <script type="text/javascript" src="web/public/js/jquery-2.1.3.min.js"></script>
    <script type="text/javascript" language="javascript" src="web/public/js/jslistadopaises.js"></script>
    <script src="assets/javascript/bootstrap-toggle.min.js"></script>
    <script src="https://kit.fontawesome.com/15358da53b.js" crossorigin="anonymous"></script>
    <!-- Bootstrap Core JavaScript -->
    <script type="text/javascript" src="web/public/js/bootstrap-3.3.2.min.js"></script>

    <!-- Bootstrap Form JavaScript -->
    <script src="web/public/js/form.js"></script>
    <script type="text/javascript" src="web/public/js/validaforms.js"></script>
    <script src="web/public/js/datatables.min.js"></script>
    <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
    
    
    <!--<script src='web/public/plugins/validateIdEc/dist/ruc_jquery_validator.min.js'></script>

    <script>
        $(document).ready(function(){
            
            $("#numerodocumento").validarCedulaEC({
                onValid: function () {
                    //window.alert("cédula válida.");
                    //console.log(this);
                    document.getElementById('g_numerodocumento').classList.remove('has-error');
                    document.getElementById('g_numerodocumento').classList.add('has-success');
                },
                onInvalid: function () {
                    window.alert("Cédula inválida.");
                    //console.log(this);
                    document.getElementById('g_numerodocumento').classList.add('has-error');
                    document.getElementById('g_numerodocumento').classList.remove('has-success');
                }
            });
        });
        
    </script>-->
	
	<!-- Include the plugin's CSS and JS: -->
    <script type="text/javascript" src="web/public/js/bootstrap-multiselect.js"></script>

   <script>
      $(document).ready(function() {
         $('#list-usuario, #list_persona_natural, #list-representante-legal, #list-miembro-empresa').DataTable({
            "language": {
                  "lengthMenu": "Mostrar _MENU_ registros por página",
                  "zeroRecords": "No se encontró nada, lo siento",
                  "info": "Mostrando página _PAGE_ de _PAGES_",
                  "infoEmpty": "No hay registros disponibles",
                  "infoFiltered": "(filtrado de _MAX_ registros totales)",
                  "search": "Buscar:",
                  "pagingType": "full_numbers",
                  'paginate': {
                     'previous': 'Anterior',
                     'next': 'Siguiente'
                  }
            }
         });
      });
   </script>

</body>
</html>