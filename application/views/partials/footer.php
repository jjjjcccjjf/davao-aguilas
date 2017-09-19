<!--footer start-->
<!-- <footer class="site-footer">
<div class="text-center">
2013 &copy; FlatLab by VectorLab.
<a href="#" class="go-top">
<i class="fa fa-angle-up"></i>
</a>
</div>
</footer> -->
<!--footer end-->
</section> <!-- / wrapper -->
</section> <!-- / main content -->
</section> <!--/ container -->

<!-- js placed at the end of the document so the pages load faster -->
<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.dcjqaccordion.2.7.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.scrollTo.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/slidebars.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.nicescroll.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/respond.min.js'); ?>" ></script>
<script src="<?php echo base_url('assets/assets/bootstrap-fileupload/bootstrap-fileupload.js'); ?>"></script>

<!--common script for all pages-->
<script src="<?php echo base_url('assets/js/common-scripts.js'); ?>"></script>


<?php if ($dynamic_table == true): ?>
  <script type="text/javascript" language="javascript" src="<?php echo base_url('assets/assets/advanced-datatable/media/js/jquery.dataTables.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/assets/data-tables/DT_bootstrap.js'); ?>"></script>
  <!--dynamic table initialization -->
  <script src="<?php echo base_url('assets/js/dynamic_table_init.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/assets/bootstrap-fileupload/bootstrap-fileupload.js'); ?>"></script>
<?php endif ?>

<?php if ($time_picker == true): ?>
  <!-- time picker -->
  <script type="text/javascript" src="<?php echo base_url('assets/assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/assets/bootstrap-timepicker/js/bootstrap-timepicker.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/js/advanced-form-components.js'); ?>"></script>
  <!-- # END time picker -->
<?php endif ?>

<?php if ($multi_select == true): ?>
  <!-- multiple select -->
  <script type="text/javascript" src="<?php echo base_url('assets/assets/fuelux/js/spinner.min.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/assets/bootstrap-datepicker/js/bootstrap-datepicker.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/assets/bootstrap-daterangepicker/moment.min.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/assets/bootstrap-daterangepicker/daterangepicker.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/assets/bootstrap-timepicker/js/bootstrap-timepicker.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/assets/jquery-multi-select/js/jquery.multi-select.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/assets/jquery-multi-select/js/jquery.quicksearch.js'); ?>"></script>

  <script src="<?php echo base_url('assets/js/advanced-form-components.js'); ?>"></script>
  <!-- multiple select END -->
<?php endif ?>
<script type="text/javascript">

/**
* changes the value of #custom_message span
* @param  string     msg    custom message string
* @return void
*/
function customMessage(selector, msg){
  $(selector).empty();
  $(selector).html(msg);
  $(selector).fadeIn(200);
  setTimeout(function(){
    $(selector).fadeOut(400);
  }, 2800)
}

function clearAllForms() {
  $('form')[0].reset();
  $('input[type=file]').val('');

  try{
    $('#notifs_form')[0].reset();
  }catch(err){
    // console.log(err);
  }

}

function showLoader() {
  $('body').append(`
    <div id="_loader" style="z-index:99999999; height:100vh; width:100vw; text-align:center; background: rgba(0,0,0, 0.1); position:fixed; top:0; left:0;">
    <img style="width: 300px; margin-top: 190px;" src="<?php echo base_url('assets/img/loading.png') ?>" />
    </div>
    `);
    console.log('show loader');
  }

  function hideLoader() {
    $('#_loader').remove();
    console.log('remove loader');
  }

  </script>
</body>
</html>
