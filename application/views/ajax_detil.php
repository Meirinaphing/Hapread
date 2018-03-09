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
	$pengarang = $row['pengarang'];
	$penerbit = $row['penerbit'];
}
?>

<!-- Modal -->
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">&times;</button>
	<h4 class="modal-title"><?php echo $judul; ?></h4>
</div>
<div class="modal-body">
	<div style="width:40%;display:inline-table;text-align: center;">
		<img src="<?php echo base_url('assets/buku/').$gambar; ?>" alt="" width="300px" height="auto"/>
	</div>
	<div style="width:50%;display:inline-table; vertical-align:top;">
		<p>Product ID: <?php echo $idbuku; ?></p>
			<span>
				<h2><b>Sinopsis</b></h2>
				<?php echo $sinopsis; ?>
				<span><h2 style="color: orange;">Rp <?php echo $harga ?></h2></span>
				<br>
				<br>
				<br>
				<label>Quantity:</label>
				<input style="width: 50px;" id="quan" type="number" value="1" />
				<?php
				$a=$this->session->userdata('status');
				if(isset($a) and $a=="login"){
					?>	
					<button data-dismiss="modal" type="button" class="btn btn-fefault cart" onClick="update('<?php echo $idbuku; ?>')">
						<i class="fa fa-shopping-cart"></i>
						Add to cart
					</button>
					<?php
				}else{
					?>

					<button data-dismiss="modal" type="button" class="btn btn-fefault cart" onClick="alertlogin()">
						<i class="fa fa-shopping-cart"></i>
						Add to cart
					</button>
					<?php
				}
				?>
			</span>
			<p><b>Availability:</b>  
				<?php
				if($stock>0){echo "In Stock";}else{echo "Indent";}
				?></p>
				<p><b>Condition:</b> New</p>
				<p><b>Category:</b> <?php echo $category; ?></p>
				<p><b>Genre:</b> <?php echo $genre; ?></p>
				<p><b>Pengarang:</b> <?php echo $pengarang; ?></p>
				<p><b>Penerbit:</b> <?php echo $penerbit; ?></p>
	</div>

</div>
