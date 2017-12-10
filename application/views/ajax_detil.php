<?php 
$que=$this->m_data->tampil_buku($idbuku);
foreach ($que as $row) {
$judul = $row['judul'];
$sinopsis = $row['sinopsis'];
$gambar = $row['cover_back'];
$harga = $row['harga'];
$genre = $row['genre'];
$category = $row['category'];
$stock = $row['stock'];
}
?>
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h1 class="modal-title"><?php echo $judul; ?></h1>
                    <br>
				</div>
				<div class="modal-body">
                  	
							<div class="product-information"><!--/product-information (new itu untuk tanda baru) pojok kiri yg -->
							<img src="<?php echo base_url('assets/images/home/new-left.png'); ?>" class="newarrival" alt="" />         
								                 
								<p>Product ID: <?php echo $idbuku; ?></p>
								<span>
									<h2><b>Sinopsis</b></h2>
									<?php echo $sinopsis; ?>
									<span>Rp <?php echo $harga ?></span>
									<br>
									<br>
									<br>
									<label>Quantity:</label>
									<input id="quan" type="number" value="1" />
                                     <?php
									$a=$this->session->userdata('status');
									if(isset($a) and $a=="login"){
								?>	
									<button data-dismiss="modal" type="button" class="btn btn-fefault cart" onClick="update('<?php echo $idbuku; ?>')">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button>
								<?php }else{
									?>
                                    
									<button data-dismiss="modal" type="button" class="btn btn-fefault cart" onClick="alertlogin()">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button>
                                    <?php }?>
                                </span>
								<p><b>Availability:</b>  
                                	<?php
										if($stock>0){echo "In Stock";}else{echo "Indent";}
									?></p>
								<p><b>Condition:</b> New</p>
								<p><b>Category:</b> <?php echo $category; ?></p>
								<p><b>Genre:</b> <?php echo $genre; ?></p>
								<!-- <a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a> -->
							</div><!--/product-information-->
					
                            <div class="product-information">
                            
                            <img src="<?php echo base_url('assets/buku/d10f1-book1.jpg'); ?>" class="newarrival" alt="" width="auto" height="auto"/><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                            
					</div>
					</div>
                
                
                
                
			</div>

