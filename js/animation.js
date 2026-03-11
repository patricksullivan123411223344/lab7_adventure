$(document).ready(function(){
    $('#startForm').submit(function(e){
      e.preventDefault();

      const name = $('#user_name').val().trim();

      $('#intro').fadeOut(800, function() {
        $('#startForm')[0].submit();
      });
    });
  });
