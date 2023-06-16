</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="footer">
      <div class="footer-inner">2022 &copy; Multidados TI.</div>
      <div class="footer-tools">
        <span class="go-top">
          <i class="fa fa-angle-up"></i>
        </span>
      </div>
    </div>
    <!-- END FOOTER -->
    <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
    <script
      src="assets/plugins/jquery-1.10.2.min.js"
      type="text/javascript"
    ></script>
    <script
      src="assets/plugins/jquery-migrate-1.2.1.min.js"
      type="text/javascript"
    ></script>
    <!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
    <script
      src="assets/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js"
      type="text/javascript"
    ></script>
    <script
      src="assets/plugins/bootstrap/js/bootstrap.min.js"
      type="text/javascript"
    ></script>
    <script
      src="assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js"
      type="text/javascript"
    ></script>
    <script
      src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"
      type="text/javascript"
    ></script>
    <script
      src="assets/plugins/jquery.cockie.min.js"
      type="text/javascript"
    ></script>
    <script
      src="assets/plugins/uniform/jquery.uniform.min.js"
      type="text/javascript"
    ></script>
    <!-- END CORE PLUGINS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="assets/scripts/app.js" type="text/javascript"></script>
    <script src="assets/scripts/index.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <script>
      jQuery(document).ready(function () {
        App.init(); // initlayout and core plugins
        Index.init();

        function processarResponse(response) {
          $('#tabela_simples_thead').find('tr, th').remove();
          $('#tabela_simples_tbody').find('tr, td, span').remove();
          
          let info = JSON.parse(response);
          let array_titulos = [];
          let tag_thead = '<tr><th>#</th>';
          let tag_tbody = '';
          let numero_linha = 1;
          info.forEach(element => {
            tag_tbody += '<tr>';
            
            for (var titulo_tabela in element) {
              if (!array_titulos.includes(titulo_tabela)) {
                array_titulos.push(titulo_tabela);
              }
            }

            tag_tbody += `<td>${numero_linha}</td>`;

            array_titulos.forEach(key => {
              tag_tbody += `<td>${element[key]}</td>`;
            });

            tag_tbody += '</tr>';
            numero_linha += 1;
          });
          
          array_titulos.forEach(titulo => {
            titulo = formatarTitulo(titulo);
            tag_thead += `<th>${titulo}</th>`;
          });
          
          tag_thead += '</tr>';
          
          $('#tabela_simples_thead').append(tag_thead);
          $('#tabela_simples_tbody').append(tag_tbody);
        }

        function removerClass() {
          $('#tabela_simples').removeClass('grey blue green purple');
        }

        $('#click_cliente').click(function() {
          removerClass();
          $('#tabela_simples').addClass('blue');
          $.ajax({
            url: 'cliente.php',
            method: 'GET',
            dataType: 'json',
            success: function(response){
              processarResponse(response);
            },
            error: function(){
              console.log('Error');
            }
          });
        });

        $('#click_usuario').click(function() {
          removerClass();
          $('#tabela_simples').addClass('green');
          $.ajax({
            url: 'usuario.php',
            method: 'GET',
            dataType: 'json',
            success: function(response){
              processarResponse(response)
            },
            error: function(){
              console.log('Error');
            }
          });
        });

        $('#click_fornecedor').click(function() {
          removerClass();
          $('#tabela_simples').addClass('purple');
          $.ajax({
            url: 'fornecedor.php',
            method: 'GET',
            dataType: 'json',
            success: function(response){
              processarResponse(response)
            },
            error: function(){
              console.log('Error');
            }
          });
        });
      });
    </script>
    <!-- END JAVASCRIPTS -->
  </body>
  <!-- END BODY -->
</html>
