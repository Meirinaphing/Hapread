<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Hapread Online Bookstore</title>
	<?php echo $js; ?>
	<?php echo $css; ?>
</head>
<script type="text/javascript">  
function updateregion(region){
     $.ajax({
         type: "POST",
         url: "<?php echo base_url() ;?>"+"home/update_region/"+region, 
         data: {kosong:'kosong'},
         dataType: "text",  
         cache:false,
         success: 
              function(data){
				  refreshcart()
                //alert(data);  //as a debugging message.
              }
          });// you have missed this bracket
		  reloadcart(id)
	 return false;
	}

function tambah(id){
     $.ajax({
         type: "POST",
         url: "<?php echo base_url() ;?>"+"home/tambah_cart/"+id, 
         data: {kosong:'kosong'},
         dataType: "text",  
         cache:false,
         success: 
              function(data){
				  refreshcart()
                //alert(data);  //as a debugging message.
              }
          });// you have missed this bracket
		  reloadcart(id)
	 return false;
}
function kurang(id){       
     $.ajax({
         type: "POST",
         url: "<?php echo base_url() ;?>"+"home/kurang_cart/"+id, 
         data: {kosong:'kosong'},
         dataType: "text",  
         cache:false,
         success: 
              function(data){
				  refreshcart(id)
                //alert(data);  //as a debugging message.
              }
          });// you have missed this bracket
		  reloadcart(id)
	 return false;
}
function refreshcart(id){
     $.ajax({
         type: "POST",
         url: "<?php echo base_url() ;?>"+"home/refreshcart/"+id, 
         data: {kosong:'kosong'},
         dataType: "text",  
         cache:false,
         success: 
              function(data){
				  $('#refresh').html(data);
                //alert(data);  //as a debugging message.
              }
          });// you have missed this bracket
	 return false;
}
function reloadcart(id){
     $.ajax({
         type: "POST",
         url: "<?php echo base_url() ;?>"+"home/reloadcart/"+id, 
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
<body>
	<?php echo $header; ?>

	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
					<li><a href="#">Home</a></li>
					<li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->

<?php 
									
									$email=$this->session->userdata('email');
                                    $acc=$this->m_data->get_account($email);
										foreach ($acc as $account) {
										$nama=$account['nama'];
										$pro=$account['provinsi'];
										$alamat=$account['alamat'];
										$nohp=$account['nohp'];
									}
									?>
			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-7 clearfix">
						<div class="bill-to">
							<p>Shopper Information</p>
							<div class="form-one">
								<form>
									<input type="text" placeholder="Receiver Name" value="<?php echo $nama;?>">
									<input type="text" placeholder="Email" value="<?php echo $email;?>">
									<input type="text" placeholder="Phone" value="<?php echo $nohp;?>">
									<textarea rows="5" placeholder="Address"value="<?php echo $alamat;?>"></textarea>
									<!-- <input type="text" placeholder="Address"> -->
								</form>
							</div>
							<div class="form-two">
								<form>
									<input type="text" placeholder="Zip / Postal Code *">
									
									<select onChange="updateregion(this.value)">
										<option>-- State / Province / Region --</option>
										<option>Aceh</option>
                                        <option>Bali</option>
                                        <option>Banten</option>
                                        <option>Bengkulu</option>
                                        <option>Gorontalo</option>
                                        <option>Jakarta</option>
                                        <option>Jambi</option>
                                        <option>Jawa Barat</option>
                                        <option>Jawa Tengah</option>
                                        <option>Jawa Timur</option>
                                        <option>Kalimantan Barat</option>
                                        <option>Kalimantan Selatan</option>
                                        <option>Kalimantan Tengah</option>
                                        <option>Kalimantan Timur</option>
                                        <option>Kalimantan Utara</option>
                                        <option>Kepulauan Bangka Belitung</option>
                                        <option>Kepulauan Riau</option>
                                        <option>Lampung</option>
                                        <option>Maluku</option>
                                        <option>Maluku Utara</option>
                                        <option>Nusa Tenggara Barat</option>
                                        <option>Papua</option>
                                        <option>Papua Barat</option>
                                        <option>Riau</option>
                                        <option>Sulawesi Barat</option>
                                        <option>Sulawesi Selatan</option>
                                        <option>Sulawesi Tengah</option>
                                        <option>Sulawesi Tenggara</option>
                                        <option>Sulawesi Utara</option>
                                        <option>Sumatera Barat</option>
                                        <option>Sumatera Selatan</option>
                                        <option>Sumatera Utara</option>
                                        <option>Yogyakarta</option>
									</select>
								</form>
							</div>
						</div>
					</div>
					<div class="col-sm-5">
						<div class="order-message">
							<p>Shipping Order</p>
							<textarea name="message"  placeholder="Notes about your order, Special Notes for Delivery" rows="16"></textarea>
						</div>	
					</div>					
				</div>
			</div>
			<div class="review-payment">
				<h2>Review & Payment</h2>
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
                    
                    <div >          
					<?php $gtotal=0; ?>                                       
					<tbody id="refresh">
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
                    <tr>
						<td colspan="4">&nbsp;</td>
							<td colspan="2">
								<table class="table table-condensed total-result">
									<tr>
										<td>Cart Sub Total</td>
										<td>Rp.<?php echo $gtotal ?></td>
									</tr>
                                     <?php
									if($pro=='Jakarta'){$sp=10000;}else{$sp=30000;}
									$t_akhir=$sp+$gtotal;
									?>
									<tr class="shipping-cost">
										<td>Shipping Cost</td>
										<td>Rp.<?php echo $sp ?></td>										
									</tr>
									<tr>
										<td>Total</td>
										<td><span>Rp.<?php echo $t_akhir; ?></span></td>
									</tr>
                                    
                        
                                    <tr>
                                    </tr>
								</table>
                                
							</td>
						</tr>
                    </tbody>
                    </div>
				</table>
			</div>
            
		</div>
	</section> <!--/#cart_items-->


	<?php echo $footer; ?>
</body>
</html>