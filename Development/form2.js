  $(document).ready(function () {
                $('#uploadImage2').submit(function (event) {

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
                            $('#targetLayer2').show();
                            //  location.reload();

                        },
                        resetForm: true
                    });

                    return false;
                });
            });