<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!-- /.content-wrapper -->
<footer class="main-footer">
  <strong>Copyright &copy; AGM - American Giant Mattress.</strong> All rights reserved.
</footer>
<!-- Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?= base_url('asset/bower_components/jquery/dist/jquery.min.js');?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url('asset/bower_components/jquery-ui/jquery-ui.min.js');?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url('asset/bower_components/bootstrap/dist/js/bootstrap.min.js');?>"></script>
<!-- Morris.js charts -->
<script src="<?= base_url('asset/bower_components/raphael/raphael.min.js');?>"></script>
<script src="<?= base_url('asset/bower_components/morris.js/morris.min.js');?>"></script>
<!-- Sparkline -->
<script src="<?= base_url('asset/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js');?>"></script>
<!-- jvectormap -->
<script src="<?= base_url('asset/plugins/jquery-vectormap/jquery-jvectormap-2.0.3.min.js');?>"></script>
<script src="<?= base_url('asset/plugins/jquery-vectormap/jquery-jvectormap-world-mill-en.js');?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url('asset/bower_components/jquery-knob/dist/jquery.knob.min.js');?>"></script>
<!-- daterangepicker -->
<script src="<?= base_url('asset/bower_components/moment/min/moment.min.js');?>"></script>
<script src="<?= base_url('asset/bower_components/bootstrap-daterangepicker/daterangepicker.js');?>"></script>
<!-- datepicker -->
<script src="<?= base_url('asset/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js');?>"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?= base_url('asset/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js');?>"></script>
<!-- Slimscroll -->
<script src="<?= base_url('asset/bower_components/jquery-slimscroll/jquery.slimscroll.min.js');?>"></script>
<!-- FastClick -->
<script src="<?= base_url('asset/bower_components/fastclick/lib/fastclick.js');?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('asset/dist/js/adminlte.min.js');?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url('asset/dist/js/pages/dashboard.js');?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('asset/dist/js/demo.js');?>"></script>
<!-- CK Editor -->
<script src="<?= base_url('asset/bower_components/ckeditor/ckeditor.js"');?>"></script>
<!-- DataTables -->
<script src="<?= base_url('asset/bower_components/datatables.net/js/jquery.dataTables.js');?>"></script>
<script src="<?= base_url('asset/bower_components/datatables.net-bs/js/dataTables.bootstrap.js');?>"></script>
<!-- Select2 -->
<script type="text/javascript" src="<?= base_url('asset/bower_components/select2/dist/js/select2.full.min.js');?>"></script>
<!-- page script -->
<script>
  $(function () {
    $('#dataTable').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true,
      'searching'   : true,
      'processing'  : true,
      // "dom": '<"top"f>rt<"bottom"ilp><"clear">'
    });
  });
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
  });
  $(function(){
    $('.select2').select2()
  });
  var sizes  = [];
  var prices = [];
  $(function(){
    $('#sizePrice').click(function(){
      var size  = $("#size").val();
      var price = $("#price").val();
      $("#table_sizePrice").find('tbody')
      .append($('<tr>')
        .append($('<td>')
          .attr('class', 'size-value')
            .append(size)
        )
        .append($('<td>')
          .attr('class', 'price-value')
          .append(price)
        )
      );
      $("#size").val("");
      $("#price").val("");
    });

    $('#submit').click(function(){
      // push each value of size to variable sizes
      $("#table_sizePrice .size-value").each(function(){
        // sizes.push($(this).html())
        $("#addProd").append($('<input>')
                      .attr('type', 'hidden')
                      .attr('name', 'size[]')
                      .val($(this).html()))
      });

      // push each value of price to variable prices
      $("#table_sizePrice .price-value").each(function(){
        $("#addProd").append($('<input>')
                      .attr('type', 'hidden')
                      .attr('name', 'price[]')
                      .val($(this).html()))
      });

      // add variable sizes to input tag name's sizes[]
      // $("#sizes").val(JSON.stringify(sizes));

      // add variable prices to input tag name's prices[]
      // $("#prices").val(JSON.stringify(prices));

    });
  });
</script>
</body>
</html>
