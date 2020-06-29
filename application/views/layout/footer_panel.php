</div>
<script>
     ClassicEditor
         .create( document.querySelector( '#editor' ) )
         .catch( error => {
             console.error( error );
         } );

         ClassicEditor
             .create( document.querySelector( '#editor2' ) )
             .catch( error => {
                 console.error( error );
             } );

             ClassicEditor
                 .create( document.querySelector( '#editor3' ) )
                 .catch( error => {
                     console.error( error );
                 } );

                 ClassicEditor
                     .create( document.querySelector( '#editor4' ) )
                     .catch( error => {
                         console.error( error );
                     } );
 </script>
<!-- jQuery -->
<script src="<?php echo base_url('assets/');?>vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url('assets/');?>vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- DataTables JavaScript -->
<script src="<?php echo base_url('assets/');?>vendor/datatables/js/jquery.dataTables.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo base_url('assets/');?>vendor/metisMenu/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url('assets/');?>dist/js/sb-admin-2.js"></script>
<script src="<?php echo base_url('assets/');?>dist/js/jquery.toast.min.js"></script>
<script src="<?php echo base_url('assets/');?>dist/js/jquery.ajaxfileupload.js"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

</body>

</html>
