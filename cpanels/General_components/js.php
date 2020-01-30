<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<!-- jQuery 2.1.4 -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Bootstrap 3.3.4 -->
<!-- FastClick -->
<!-- AdminLTE App -->
<script src="../../dist/js/app.min.js"></script>
<!-- Sparkline -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!--<script src="../../dist/js/pages/dashboard2.js"></script>-->
<!-- AdminLTE for demo purposes -->

<!-- Bootstrap 3.3.4 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="../../General_files/js/jquery.form.js" type="text/javascript"></script>
<script src="../../General_files/js/form.js" type="text/javascript"></script>
<script src="//cdn.ckeditor.com/4.13.0/full/ckeditor.js"></script>

<!-- FastClick -->
<!-- page script -->
<script>
    $(function () {
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": true
        });
    });
</script>
 <script language="javascript">
            var editor = CKEDITOR.replace('html', {toolbar: 'Medium'});
            CKEDITOR.remove(editor)
            CKFinder.SetupCKEditor(editor);
        </script>
<?php
$Data_communication = NULL;
?>