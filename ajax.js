$(document).ready(function() {

    $('#add').click(function () {

      var name = $('#add').attr("data_id");

      var id = $('#add').attr("uid");

      var data = 'id='+ id  & 'name='+ name; // this where i add multiple data using  ' & '

      $.ajax({
        type:"GET",
        cache:false,
        url:"welcome.php",
        data:data,    // multiple data sent using ajax
        success: function (html) {

          $('#add').val('data sent sent');
          $('#msg').html(html);
        }
      });
      return false;
    });
  });