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
<!-- AutoNumber -->
<script type="text/javascript" src="https://unpkg.com/autonumeric"></script>
<!-- Bootstrap Toggle -->
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<!-- page script -->
<script>
$(function () {
  // Replace the <textarea id="editor1"> with a CKEditor
  // instance, using default configuration.
  CKEDITOR.replace('editor1')
});

$(function () {
  // Replace the <textarea id="editor1"> with a CKEditor
  // instance, using default configuration.
  CKEDITOR.replace('desc')
});
</script>
<script>
$(function(){
  $('.select2').select2()
});
var sizes  = [];
var prices = [];
$(function(){
  $('#sizePrice').click(function(){
    var size  = $("#size").val();
    var price = $("#price").val();
    var sku = $("#sku").val();
    if(size){
       $.ajax({
           url: "<?= site_url('admin/sizeNameProduct/');?>"+size,
           method: "GET",
           dataType: "json",
           success: function(response){
               var rowId = Math.random().toString(36).substr(2, 5);
               $("#table_sizePrice").find('tbody')
                  .append($('<tr>')
                      .attr('id', size)
                      .append($('<td>')
                          .attr('class', 'size-value hide')
                              .append(size)
                      )
                      .append($('<td>')
                          .attr('class', 'sku-value')
                          .append(sku)
                      )
                      .append($('<td>')
                          .attr('class', 'size-name')
                              .append(response.name + " (" +response.size+ ")")
                      )
                      .append($('<td>')
                          .attr('class', 'price-value')
                              .append(price)
                      )
                      .append($('<td>')
                          .append($(`<button class="btn btn-oldblue btn-sm" type="button"><i class="fa fa-edit"></i></button>
                                    <button class="btn btn-danger btn-sm" type="button" onclick="removeSize(${size})"><i class="fa fa-trash"></i></button>`))
                      )
                  );
                  $("#size").val("");
                  inputPrice.clear(true);
               $("#sku").val("");
               if ($("#btnClose").length !== 0) {
                   $("#btnClose").trigger("click");
               }
           }
       })
    }
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
        price = $(this).html().split('.').join("");
        console.log(price);
      $("#addProd").append($('<input>')
                    .attr('type', 'hidden')
                    .attr('name', 'price[]')
                    .val(price))
    });

      $("#table_sizePrice .sku-value").each(function(){
          sku = $(this).html().split('.').join("")
          $("#addProd").append($('<input>')
              .attr('type', 'hidden')
              .attr('name', 'sku[]')
              .val(sku))
      });



  });
});

function removeSize(id) {
    $('#'+id).remove();
}

$('#modal-edit-size').on('show.bs.modal', function (event) {
    const autoNumericOptionsIdr = {
        digitGroupSeparator        : '.',
        decimalCharacter           : ',',
        decimalCharacterAlternative: '.',
        decimalPlaces   : 0,
        roundingMethod             : AutoNumeric.options.roundingMethod.halfUpSymmetric,
    };
    var button = $(event.relatedTarget);
    var id = button.data('id');
    var modal = $(this);
    console.log(id);
    $.ajax({
        url: "<?=site_url('/admin/getItem/');?>"+id,
        type: "GET",
        dataType: "json",
        success:function(data) {
            modal.find('#editPrice').val(data.price);
            modal.find('#sizeEdit').val(data.size_id);
            if (data.sub_price != null) {
                modal.find('#subPrice').val(data.sub_price);
            }
            modal.find('#rowId').val(data.size_id);
            new AutoNumeric('#editPrice', autoNumericOptionsIdr);
            new AutoNumeric('#subPrice', autoNumericOptionsIdr);
        }
    });
});

$('#sizePriceEdit').click(function() {
    var selector = '#'+$('#rowId').val();
    var price = $('#editPrice').val();
    var sizeName = $('#sizeEdit option:selected').text().trim();
    var sizeId = $('#sizeEdit').val();
    var subprice;
    if ($('#subPrice').val() != "") {
        subprice = $('#subPrice').val();
    } else {
        subprice = '-';
    }

    $(selector).find('.price-value').html(price);
    $(selector).find('.subprice-value').html(subprice);
    $(selector).find('.size-name-value').html(sizeName);
    $(selector).find('.size-value').html(sizeId);

    $("#btnCloseEdit").trigger("click");
});
</script>
<script>

    $(function () {
    $('#dataTable').DataTable({

      'paging'      : true, // harus ada
      'lengthChange': true, // harus ada
      'ordering'    : true, // harus ada
      'info'        : true,
      'autoWidth'   : false,
      'searching'   : true,
      'processing'  : true,


        });
  });
  $(function () {
    $('#dataTable1').DataTable({
      'paging'      : true, // harus ada
      'lengthChange': true, // harus ada
      'ordering'    : true, // harus ada
      'info'        : true,
      'autoWidth'   : false,
      'searching'   : true,
      'processing'  : true,
      // 'pageLength'  : 15,
      // "dom": '<"top"f>rt<"bottom"ilp><"clear">'
    });
  });
 //   $('#dataTable1').DataTable({
 //
 //     'paging'      : true, // harus ada
 //     'lengthChange': true, // harus ada
 //     'ordering'    : true, // harus ada
 //     'info'        : true,
 //     'autoWidth'   : false,
 //     'searching'   : true,
 //     'processing'  : true,
 //
 //       dom: 'Bfrtip',
 //       buttons: [
 //           'copy', 'csv', 'excel', 'pdf', 'print'
 //       ]
 //       // 'pageLength'  : 15,
 //     // "dom": '<"top"f>rt<"bottom"ilp><"clear">'
 //   });
 // })
</script>
<script>
  const autoNumericOptionsIdr = {
    digitGroupSeparator        : '.',
    decimalCharacter           : ',',
    decimalCharacterAlternative: '.',
    decimalPlaces   : 0,
    roundingMethod             : AutoNumeric.options.roundingMethod.halfUpSymmetric,
};
    var inputPrice = new AutoNumeric('#price', autoNumericOptionsIdr);
    // var editPrice = new AutoNumeric('#editPrice', autoNumericOptionsIdr);
</script>
<script>
    $(document).ready(function(){
     $('#product').on('change', function(){
		var productId = $('#product').val();
		if(productId){
			$.ajax({
				url: "<?=site_url('admin/getIdProduct/')?>"+productId,
				method: "GET",
				dataType: "json",
				success:function(response){
					$("#size").attr('disabled', false);
					$("#size").empty();
					$.each(response, function(key, value){
						$("#size").append(
							'<option value='+value.id+'>'+value.name+' ('+value.size+') - Rp '+value.price+'</option>'
						);
					});
				}
			})
		} else {
		    console.log("An error occured")
		}
	});
});
</script>
<script>
  var sizes  = [];
  $(function(){
    $('#sizePriceStore').click(function(){
      var size  = $("#size").val();
      if(size){
          $.ajax({
             url: "<?= site_url('admin/sizeNameStore/')?>"+size,
             method: "GET",
             dataType: "json",
             success: function(response){
                 $("#table_sizePrice").find('tbody')
                    .append($('<tr>')
                        .append($('<td>')
                            .attr('class', 'size-value hide')
                                .append(size)
                        )
                        .append($('<td>')
                            .attr('class', 'size-name')
                                .append(response[0].name)
                        )
                    );
                // $("#size").val("");
             }
          });
      }
    });

    $('#submit').click(function(){
      // push each value of size to variable sizes
      $("#table_sizePrice .size-value").each(function(){
        // sizes.push($(this).html())
        $("#productToStore").append($('<input>')
                      .attr('type', 'hidden')
                      .attr('name', 'size[]')
                      .val($(this).html()))
      });

      // add variable sizes to input tag name's sizes[]
      // $("#sizes").val(JSON.stringify(sizes));

      // add variable prices to input tag name's prices[]
      // $("#prices").val(JSON.stringify(prices));

    });
  });
</script>
<script>
    $(document).ready(function(){
	$('#province').change(function(){
		var province_id = $(this).val();
		if(province_id){
			$.ajax({
				url: "<?=site_url('home/checkProv/')?>"+province_id,
				method: "GET",
				dataType: "json",
				success:function(response){
					$("#city").attr('disabled', false);
					$("#city").empty();
					$('#sub_district').empty();
					$.each(response, function(key, value){
						$("#city").append(
							'<option value='+value.id_kab+'>'+value.nama+'</option>'
						);
					});
				}
			})
		}
	});

	$('#city').change(function(){
		var city = $(this).val();
		if(city){
			$.ajax({
				url: "<?=site_url('home/checkSubDistrict/')?>"+city,
				method: "GET",
				dataType: "json",
				success:function(response){
					$("#sub_district").attr('disabled', false);
					$("#sub_district").empty();
					$.each(response, function(key, value){
						$("#sub_district").append(
							'<option value='+value.id_kec+'>'+value.nama+'</option>'
						);
					});
				}
			})
		}
	});
});
</script>
</body>
</html>
