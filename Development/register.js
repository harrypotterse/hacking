$(document).ready(function () {
    $('#uploadImage2').submit(function (event) {
        event.preventDefault();
        $('#targetLayer2').hide();
        // ======================
        $(this).ajaxSubmit({
            target: '#targetLayer2',
            beforeSubmit: function () {
                $('.progress-bar').width('50%');
                $('input').attr('disabled', true);
            },
            uploadProgress: function (event, position, total, percentageComplete)
            {
                $('.progress-bar').animate({
                    width: percentageComplete + '%'
                }, {
                    duration: 1000
                });
            },
            success: function () {
                $('input').attr('disabled', false);
                $('#loader-icon').hide();
                var x = $('#targetLayer2').text();
            },
            resetForm: true
        });
        return false;
    });
});