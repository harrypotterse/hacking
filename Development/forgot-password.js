$(document).ready(function () {
    $('#forgot-password').submit(function (event) {

        //في حالة وجود قيمة في متغير الملف او قيمة معينة 

        // alert(1);
        event.preventDefault();
        //اظهار واخفاء
        $('#loader-icon').show();
        $('#targetLayer2').hide();
        // ======================
        $(this).ajaxSubmit({
            target: '#targetLayer2',
            beforeSubmit: function () {
                $('.progress-bar').width('50%');
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
                $('#loader-icon').hide();
                var x = $('#targetLayer2').text();
                if (x == 1) {
                    swal("Thank you", "To connect you with us", "success");
                } else {
                    swal("Error", x, "error");
                }

                //  location.reload();

            },
            resetForm: true
        });

        return false;
    });
});