  
    <script src="<?= base_url() ?>/public/js/jquery.min.js"></script>
    <script>
      $(document).ready(function() {
          $("#show_hide_password div div a").on('click', function(event) {
              event.preventDefault();
              if($('#show_hide_password input').attr("type") == "text"){
                  $('#show_hide_password input').attr('type', 'password');
                  $('#show_hide_password i').addClass( "bi-eye-slash" );
                  $('#show_hide_password i').removeClass( "bi-eye" );
              }else if($('#show_hide_password input').attr("type") == "password"){
                  $('#show_hide_password input').attr('type', 'text');
                  $('#show_hide_password i').removeClass( "bi-eye-slash" );
                  $('#show_hide_password i').addClass( "bi-eye" );
              }
          });
      });
    </script>
    <script src="<?= base_url() ?>/public/js/popper.min.js"></script>
    <script src="<?= base_url() ?>/public/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>/public/js/sweetalert2@9.js"></script>
    <script src="<?= base_url() ?>/public/js/myAlerts.js"></script>
  </body>
</html>
