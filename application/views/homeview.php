<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Hapread Online Bookstore</title>
	<?php echo $js; ?>
	<?php echo $css; ?>
	<script>
		function alertlogin(){
			alert('Please login before buy');
		}
		function add(id){       
			$.ajax({
				type: "POST",
				url: "<?php echo base_url() ;?>"+"home/input_cart/"+id, 
				data: {kosong:'kosong'},
				dataType: "text",  
				cache:false,
				success: 
				function(data){
					$('#jumlah').html(data);
                //alert(data);  //as a debugging message.
            }
          });// you have missed this bracket
			return false;
		}
	</script>
</head>
<body>
	<?php echo $header; ?>

	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						
						<div class="carousel-inner">
							<?php foreach($ss as $row){ ?>
							<div class="item <?php if($row['active']==1){echo "active";} ?>">
								<div class="col-sm-6">
									<h1><span>Hapread</span> Online Bookstore</h1>
									<h2><?php echo $row['judul']; ?></h2>
									<p><?php echo $row['sinopsis']; ?></p>
									<a href="<?php echo base_url()."home/searchshop/".$row['judul']; ?>">
										<button type="button" class="btn btn-default get">Get it now</button>
									</a>
								</div>
								<div class="col-sm-6">
									<a href="<?php echo base_url('home/searchshop/').$row['judul']; ?>">
										<img style="width:59%; float:right;" src="<?php echo base_url().'/assets/slideshow/'.$row['gambar'] ?>" class="girl img-responsive" alt="" />
									</a>
								</div>
							</div>
							<?php } ?>							
						</div>

						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->

	<?php echo $left; ?>

	<div class="col-sm-9 padding-right">
		<div class="features_items"><!--features_items-->
			<h2 class="title text-center">Features Items</h2>
			<?php foreach ($buku as $row) { ?>
			<div class="col-sm-4">
				<div class="product-image-wrapper">
					<div class="single-products">
						<div class="productinfo text-center">
						<a href="<?php echo base_url('home/searchshop/').$row->judul; ?>">
								<img style="width:250px;height:400px;" src="<?php echo base_url().'assets/buku/'.$row->gambar ;?>" alt="" />
							</a>
							<h2>Rp <?php echo $row->harga;?></h2>
							<p><?php echo $row->judul;?></p>
							<?php
							$a=$this->session->userdata('status');
							if(isset($a) and $a=="login"){
								?>		
								<a onClick="add('<?php echo $row->idbuku; ?>')" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i> Add to cart</a>
								<?php }else{
									?>
									<a onClick="alertlogin()" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i> Add to cart</a>    
									<?php
								} ?>
							</div>
						</div>
					</div>
				</div>

				<?php } ?>







			</div><!--features_items-->

			<div class="recommended_items"><!--recommended_items-->
				<h2 class="title text-center">recommended items</h2>

				<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
					<div class="carousel-inner">
						<div class="item active">
							<?php foreach($ri as $row){	?>
							<?php if($row['active']==1){ ?>	
							<div class="col-sm-4">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<img src="<?php echo base_url('/assets/recomended_item/').$row['gambar']; ?>" alt="" />
											<h2>Rp <?php echo $row['harga']; ?></h2>
											<p><?php echo $row['judul']; ?></p>
											<a href="<?php echo base_url()."home/searchshop/".$row['judul']; ?>" class="btn btn-default add-to-cart"><i class="fa"></i>Get It Now</a>
										</div>
									</div>
								</div>
							</div>
							<?php } ?>
							<?php } ?>
						</div>

						<div class="item">
							<?php foreach($ri as $row){	?>
							<?php if($row['active']==0){ ?>	
							<div class="col-sm-4">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<img src="<?php echo base_url('/assets/recomended_item/').$row['gambar']; ?>" alt="" />
											<h2>Rp <?php echo $row['harga']; ?></h2>
											<p><?php echo $row['judul']; ?></p>
											<a href="<?php echo base_url()."home/searchshop/".$row['judul']; ?>" class="btn btn-default add-to-cart"><i class="fa"></i>Get It Now</a>
										</div>
									</div>
								</div>
							</div>
							<?php } ?>
							<?php } ?>
						</div>					
					</div>
					<a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
						<i class="fa fa-angle-left"></i>
					</a>
					<a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
						<i class="fa fa-angle-right"></i>
					</a>			
				</div>
			</div><!--/recommended_items-->

		</section>

		<?php echo $footer; ?>
	</body>
	</html>