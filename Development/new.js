$(function () {
    $("#sub").click(function () {
        var text = $('.sda').val();
      //  alert(text);
        //   $(this).prop('disabled', false);
        //   $("#sub").attr('disabled', 'disabled');
        $.post('Forms/join_mail.php', {text: text}, function (data) {
            //alert(data);
            //  $('.sorting-container').hide().html(data).fadeToggle("slow");
        });
       // return false;
    });


});