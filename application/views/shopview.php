<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Hapread Online Bookstore</title>
	<?php echo $js; ?>
	<?php echo $css; ?>
</head>
<body>
	<?php echo $header; ?>

	<?php echo $left; ?>
	<div class="col-sm-9 padding-right">
		<div class="features_items"><!--features_items-->
			<h2 class="title text-center">Features Items</h2>

			<?php
			foreach ($buku as $row) { 
			?>
			<div class="col-sm-4">
				<div class="product-image-wrapper">
					<div class="single-products">
						<div class="productinfo text-center">
							<a href="<?php echo base_url('index.php/Home/detail'); ?>">
								<img src="<?php echo base_url().'assets/buku/'.$row->gambar ;?>" alt="" /></a>
								<h2>Rp. <?php echo $row->harga;?></h2>
								<p><?php echo $row->judul ;?></p>
								<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
							</div>
						</div>
					</div>
				</div>
				<?php } ?>
				<div class="row col-sm-12">
	
                        
						<?php 
							echo $this->pagination->create_links();
					?>
				</div>
			</div><!--features_items-->

		</div>
	</div>
</div>
</section>


<?php echo $footer; ?>
</body>
</html>