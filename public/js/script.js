$(document).ready(function () {

    $('.form').on('submit',function(e){
          e.preventDefault();
         var $form = $(this);
         var image = getImage($form);

         $.ajax({
             url : 'qrcode.php',
             method: 'post',
             data :{data: image},
            
             success:function(data){
                 data = JSON.parse(data);
                 if (data.status == 'success') {
                     $('#d-qrcode').html('<img src="' + data.url + '">');
                     $('#d-qrcode').removeClass('d-none');
                     $('.status').addClass('d-none');
                     $('.box').removeClass('d-none');
                     $('#show').attr('href',data.url);
                     $('.status').html('');
                     $('.form').trigger('reset');
                 } 
                 else if (data.status == 'error') {
                     $('#d-qrcode').html(data.message);
                     $('#d-qrcode').removeClass('d-none');
                     $('.status').addClass('d-none');
                     $('.status').html('');
                 }
                
             }
         });

    });  

            function getImage( $form ) {
                var url =  $('#url').val();
                if (url && url.length) {
                    $('#auc-qrcode').addClass('d-none');
                    new QRCode($('#d-qrcode')[0], url);
                    $('.status').removeClass('d-none');
                    $('.status').html('Processing Request...!')
                    var canvas = $('#d-qrcode canvas');
                    var img = canvas.get(0).toDataURL("image/png");
                    return img;
                }
                return null;
            }
});