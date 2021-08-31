<!DOCTYPE html>
<?php
$details = $this->pm->deals_details();
$user_details = $this->pm->user_details($this->input->get('userid'));

if(count($user_details) == 0){
	echo 'No User Logged In or Invald User Id';
}elseif(count($details) == 0){
	echo 'No Deals for Today';
}else{
//print_r($details);
?>
<html lang="en">
  <head>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Deals</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="<?=base_url();?>/resource/dist/css/view.css">


	
  </head>

  <body>
	
	<div class="container">
		<div class="card">
			<div class="container-fliud">
				<div class="wrapper row">
					<div class="preview col-md-6">
						
						<div class="preview-pic tab-content">
						  <div class="tab-pane active" id="pic-1"><img src="<?php echo $details[0]->Image; ?>" /></div>
						 
						</div>
						
					</div>
					<div class="details col-md-6">
						<h3 class="product-title"><?php echo $details[0]->Title; ?></h3>
						
						<p class="product-description"><?php echo $details[0]->Description; ?></p>
						<h4 class="price">Actual price: <span>Rs. <?php echo $details[0]->Price; ?></span></h4>
						<h4 class="price">Discounted price: <span>Rs. <?php echo $details[0]->Discounted_price; ?></span></h4>
						<?php if($user_details[0]->returning_count > 0 ){
							$percent = $user_details[0]->returning_count;
							if($percent > 5){ $percent = 5; }
							$new_price = round($details[0]->Discounted_price- ($details[0]->Discounted_price *$percent)/100);
							
						?>
						<h4 class="price">Extra Discount for you(<?php echo  $percent; ?>%): <span>Rs. <?php echo $new_price; ?></span></h4>
						<?php } 
						$available = $details[0]->Quantity  - $details[0]->sold_out_quantity;
						?>
						<h4 class="price">Quantity: <span><?php if($available > 0){echo $available;}else{echo "sold out";} ?></span></h4>

						<div class="action">
							<button class="add-to-cart btn btn-default" type="button" id="buynow">Buy Now</button>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>

	 $(function() {

			 $("button#buynow").click(function(){
					
					if (confirm("Are you sure you want to place order?") == 1){
					
					 $.ajax({
						type: "POST",
						url: "product/buy_now?userid=<?php echo $this->input->get('userid'); ?>",
						data: $('form.buyn').serialize(),
						success: function(msg){
							  alert(msg);
							  location.reload();
						},
						error: function(){
							alert("failure");
						}
				   });
				}
			 });
	});
	</script>
	
  </body>
</html>
<?php } ?>

