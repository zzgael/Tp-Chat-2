var auto_refresh = setInterval(
    function () {
        $('#refreshmess').load('display.php').fadeIn("slow");
    }
, 2000); // refresh every 2000 milliseconds

function storeMessage(event, form) {
    event.preventDefault();

    $(form).find('#btn').text('En cours ...');

    $.post({
       url: $(form).attr('action'),
       data: $(form).serialize(),
       succes: function(error) {
           if (error){
               alert(error);
           }
        $(form).find('#btn').text('Envoyer');
        $('.toto').html('value', '');
       } 
    });
}