<body>
	<?php echo $header; ?>


<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>                
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
                    
                                    
					<?php $gtotal=0; ?>                                       
					<tbody>
                    <?php
                    foreach ($temp as $row) {
						
						$que=$this->m_data->tampil_buku($row['idbuku']);
						foreach ($que as $buk) {
							
							
					?> 
						<tr>
							<td class="cart_product">
                            
								<a href=""><img width="120pt" src="<?php echo base_url().'assets/buku/'.$buk["gambar"]; ?>" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href=""><?php echo $buk["judul"]; ?></a></h4>
								<p>Product ID: <?php echo $buk["idbuku"]; ?></p>
							</td>
							<td class="cart_price">
								<p><?php echo $row['harga']; ?></p>
							</td>
							<td class="cart_quantity">
								<div class="btn-group">
                                	<a class="btn btn-success" onClick="kurang('<?php echo $row['idbuku']; ?>')"> - </a>
									<input class="btn" type="text" name="quantity" value="<?php echo $row['jumlah']; ?>" autocomplete="off" size="2" disabled >
									<a class="btn btn-success"  onClick="tambah('<?php echo $row['idbuku']; ?>')"> + </a>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price"><?php echo $row['totharga']; ?></p>
							</td>
							<td class="cart_delete">
                            
								<a href="<?php echo base_url().'home/hapus_cart/'.$row['idbuku']; ?>" class="cart_quantity_delete"><i class="fa fa-times"></i></a>
							</td>
						</tr>
                        
					<?php
					$gtotal+=$row['totharga'];
						}
                    }
                    ?>
                    </tbody>
                    
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="heading">
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="chose_area">
						<ul>
                        	<li>
								<font size="+1">Silahkan cek daftar keranjang anda sembelum melanjutkan transaksi</font>
							</li>
                        </ul>
                    </div>
				</div>
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span>Rp <?php echo $gtotal ?></span></li>
						</ul>
							<a class="btn btn-default update" href="">Checkout</a>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->


	<?php echo $footer; ?>
</body>