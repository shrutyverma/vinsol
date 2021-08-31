<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Vinsol</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" href="<?=base_url();?>/resource/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=base_url();?>/resource/bower_components/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?=base_url();?>/resource/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="<?=base_url();?>/resource/dist/css/AdminLTE.min.css">
	<link rel="stylesheet" href="<?=base_url();?>/resource/dist/css/skins/_all-skins.min.css">

	<link rel="stylesheet" href="<?=base_url('resource/')?>dt-buttons/css/colReorder.dataTables.min.css">


	<style media="screen">
		.my-dt-icon{
			font-size:1.3em;
			font-weight:300;
		}
	</style>

	<!-- Google Font -->
	<link rel="stylesheet"
				href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="sidebar-mini skin-black-light">
<div class="wrapper">

	<?php
		include_once('header.php');
	?>
	<!-- Left side column. contains the logo and sidebar -->
	<?php
		include_once('left_sidebar.php');
	?>
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->

		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-xs-12">
					<div class="box" style="box-shadow:0 10px 16px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19) !important;">
						
						<!-- /.box-header -->
						<div class="box-body">
							
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title">Publish Deals</h4>
									</div>
										<form role="form" method="POST" enctype="multipart/form-data" action="<?=site_url('/Product/add_product/')?>" id="form-add-product">
											<div class="modal-body">
												<div class="box box-primary" style="box-shadow:0 10px 16px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19) !important;">

										<div class="box-header with-border">
										  <h3 class="box-title">Product Details</h3>
										</div>
									  <div class="box-body">
										<div class="row">
											<div class="col-md-5">
																<div class="form-group">
												  <label for="aName">Title</label>
												  <input autofocus type="text" class="form-control" name="title" id="title" placeholder="Name" required>
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label for="aPrice">Price</label>
													<input type="number" min="0" class="form-control" name="price" id="price" placeholder="Price" required>
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label for="dPrice">Discounted Price</label>
													<input type="number" min="0" class="form-control" name="dprice" id="dprice" placeholder="Discounted Price" required>
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label for="quantity">Quantity</label>
													<input type="number" min="1" class="form-control" name="quantity" id="quantity" placeholder="Quantity" required>
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label for="image">Image</label>
													<input type="file" class="form-control" name="image" id="image" required>
												</div>
											</div>
											<div class="col-md-4">
											<div class="form-group">
											  <label>Publish Date</label>
												<div class="input-group date" id="reservationdate" data-target-input="nearest">
													<input type="date" class="form-control datetimepicker-input" name="publish_date" id="publish_date"  required>
														<div class="input-group-text"></div>
													</div>
												</div>
											</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
												  <label for="aDescription">Description</label>
												  <textarea class="form-control" name="description" id="description" placeholder="Description" required></textarea>
												</div>
											</div>
										</div>
									  </div>
									</div>

								


										</div>
										<div class="modal-footer">
										
											<button type="submit" id="btn-add-product" class="btn btn-primary">Save</button>
										</div>
							</form>
								</div>
								
			  
						</div>
						<!-- /.box-body -->
					</div>
					<!-- /.box -->
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</section>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->
	

	<!-- /.control-sidebar -->
	<!-- Add the sidebar's background. This div must be placed
			 immediately after the control sidebar -->
	<div class="control-sidebar-bg"></div>
</div>




<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?=base_url();?>/resource/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url();?>/resource/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?=base_url();?>/resource/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url();?>/resource/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?=base_url();?>/resource/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?=base_url();?>/resource/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url();?>/resource/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url();?>/resource/dist/js/demo.js"></script>
<!-- page script -->






<script type="text/javascript" language="javascript" src="<?=base_url('resource/')?>dt-buttons/js/dataTables.buttons.min.js">
</script>
<script type="text/javascript" language="javascript" src="<?=base_url('resource/')?>dt-buttons/js/buttons.bootstrap.min.js"></script>
<script type="text/javascript" language="javascript" src="<?=base_url('resource/')?>dt-buttons/js/jszip.min.js">
</script>
<script type="text/javascript" language="javascript" src="<?=base_url('resource/')?>dt-buttons/js/pdfmake.min.js">
</script>
<script type="text/javascript" language="javascript" src="<?=base_url('resource/')?>dt-buttons/js/vfs_fonts.js">
</script>
<script type="text/javascript" language="javascript" src="<?=base_url('resource/')?>dt-buttons/js/buttons.html5.min.js">
</script>
<script type="text/javascript" language="javascript" src="<?=base_url('resource/')?>dt-buttons/js/buttons.print.min.js">
</script>
<script type="text/javascript" language="javascript" src="<?=base_url('resource/')?>dt-buttons/js/buttons.colVis.min.js">
</script>
<script type="text/javascript" language="javascript" src="<?=base_url('resource/')?>dt-buttons/js/dataTables.colReorder.min.js">
</script>

</body>
</html>
