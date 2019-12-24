    <!-- Plugins Js -->
    <script src="<?= base_url() ?>assets/js/app.min.js"></script>
    <script src="<?= base_url() ?>assets/js/table.min.js"></script>
    <script src="<?= base_url() ?>assets/js/pages/tables/jquery-datatable.js"></script>
    
    <!-- Custom Js -->
    <script src="<?= base_url() ?>assets/js/admin.js"></script>
    <script src="<?= base_url() ?>assets/js/app-polling.js"></script>
    <script src="<?= base_url() ?>assets/js/pages/index.js"></script>
    <script src="<?= base_url() ?>assets/js/pages/charts/jquery-knob.js"></script>
    <script src="<?= base_url() ?>assets/js/pages/sparkline/sparkline-data.js"></script>
    <script src="<?= base_url() ?>assets/js/pages/medias/carousel.js"></script>
<script> 
$(document).ready(function(){

   $('#btn-edit').click(function(){

     
         $(".inputan").prop("readonly", false); 
         $(".btn-simpan").prop("disabled", false); 

   });
});
</script>
    
    
</body>