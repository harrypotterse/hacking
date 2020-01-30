$(document).ready(function () {
    $('#uploadImage').submit(function (event) {

        //في حالة وجود قيمة في متغير الملف او قيمة معينة 

        // alert(1);
        event.preventDefault();
        //اظهار واخفاء

        $('#targetLayer').hide();
        // ======================
        $(this).ajaxSubmit({

            target: '#targetLayer',
            beforeSubmit: function () {
                $('.progress-bar').width('50%');
                $('.submit').attr('disabled', true);
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
                $('#targetLayer').hide().fadeIn().show();
                $('.submit').attr('disabled', false);
                //  location.reload();

            },
            resetForm: true
        });

        return false;
    });
});