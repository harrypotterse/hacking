$(document).ready(function () {
    $('#uploadImage').submit(function (event) {
        //  event.preventDefault();
        $('#loader-icon').show();
        $('#targetLayer').hide();
        // ======================
        $(this).ajaxSubmit({
            target: '#targetLayer',
            beforeSubmit: function () {
                $('.progress-bar').width('50%');
                $('input').attr('disabled', true);
                var editor = CKEDITOR.replace('html', {toolbar: 'Medium'});
                CKEDITOR.remove(editor)
                CKFinder.SetupCKEditor(editor);

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
                $('#targetLayer').show();
                $('input').attr('disabled', false);


            },
            resetForm: false
        });

        return false;
    });
});