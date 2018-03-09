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
				  refreshcart();
		  		  reloadcart(id);
                //alert(data);  //as a debugging message.
              }
          });// you have missed this bracket
	 return false;
	}
	function updatehp(hp){
		 alert(hp);
     $.ajax({
         type: "POST",
         url: "<?php echo base_url() ;?>"+"home/update_hp/", 
         data: {hp:hp},
         dataType: "text",  
         cache:false,
         success: 
              function(data){ 
               // alert(data);  //as a debugging message.
              }
          });// you have missed this bracket
	 return false;
	}
	function updatealamat(alamat){
	  $.ajax({
         type: "POST",
         url: "<?php echo base_url() ;?>"+"home/update_alamat/", 
         data: {alamat:alamat},
         dataType: "text",  
         cache:false,
         success: 
              function(data){
               //alert(data);  //as a debugging message.
              }
          });// you have missed this bracket
	 return false;
	}
	function updatepos(pos){
	  $.ajax({
         type: "POST",
         url: "<?php echo base_url() ;?>"+"home/update_pos/", 
         data: {pos:pos},
         dataType: "text",  
         cache:false,
         success: 
              function(data){
               //alert(data);  //as a debugging message.
              }
          });// you have missed this bracket
	 return false;
	}
	function updatekota(kota){
	  $.ajax({
         type: "POST",
         url: "<?php echo base_url() ;?>"+"home/update_kota/", 
         data: {kota:kota},
         dataType: "text",  
         cache:false,
         success: 
              function(data){
               //alert(data);  //as a debugging message.
              }
          });// you have missed this bracket
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
				  refreshcart();
		 		 reloadcart(id);
                //alert(data);  //as a debugging message.
              }
          });// you have missed this bracket
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

function proses(){
	var nama=document.getElementById('nama').value;
	var hp=document.getElementById('hp').value;
	var alamat=document.getElementById('alamat').value;
	var kodepos=document.getElementById('kodepos').value;
	var kota=document.getElementById('kota').value;
	var provinsi=document.getElementById('provinsi').value;
	var note=document.getElementById('note').value;
	if( nama==""){alert('Silahkan Isi Nama Penerima Sebelum Melanjutkan');}
	else if(hp==""){alert('Silahkan Isi No Hp Penerima Sebelum Melanjutkan');}
	else if(alamat==""){alert('Silahkan Isi Alamat Penerima Sebelum Melanjutkan');}
	else if(kodepos==""){alert('Silahkan Isi Kode Pos Penerima Sebelum Melanjutkan');} 
	else if(provinsi=="-- State / Province / Region --" ){alert('Silahkan Pilih Provinsi Penerima Sebelum Melanjutkan');}
	else{
     $.ajax({
         type: "POST",
         url: "<?php echo base_url() ;?>"+"home/proses/", 
         data: {nama:nama,
		 		hp: hp,
		 		alamat:alamat,
		 		kodepos:kodepos,
		 		kota:kota,
		 		provinsi:provinsi,
		 		note:note
		 		},
         dataType: "text",  
         cache:false,
         success: 
              function(data){
				  window.location = "<?php echo base_url();?>"+"Home/account";
                //alert(data);  //as a debugging message.
              }
          });// you have missed this bracket
	 return false;
	}
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
										$kodepos=$account['kodepos'];
										$kota=$account['kota'];
									}
									?>
			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-7 clearfix">
						<div class="bill-to">
							<p>Shopper Information</p>
							<div class="form-one">
								<form>
									<input id="nama" type="text" placeholder="Receiver Name" value="<?php echo $nama;?>">
									<input id="hp" type="number" placeholder="Phone" onChange="updatehp(this.value)" value="<?php echo $nohp;?>">
                                    <input id="kota" type="text" placeholder="City" onChange="updatekota(this.value)" value="<?php echo $kota;?>">
									<textarea id="alamat" rows="5" placeholder="Address" onChange="updatealamat(this.value)" value=""><?php echo $alamat;?></textarea>
									<!-- <input type="text" placeholder="Address"> -->
								</form>
							</div>
							<div class="form-two">
								<form>
									<input id="kodepos"= type="number" placeholder="Zip / Postal Code *" onChange="updatepos(this.value)" value="<?php echo $kodepos;?>">
									
									<select id="provinsi" onChange="updateregion(this.value)" >
                                    
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
							<textarea id="note" name="message"  placeholder="Notes about your order, Special Notes for Delivery" rows="16"></textarea>
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
							<td style="width:120pt" class="cart_product">
                            
								<a href=""><img width="120pt" src="<?php echo base_url().'assets/buku/'.$buk["gambar"]; ?>" alt=""></a>
							</td>
							<td style="height:200px;" class="cart_description">
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
									if($pro=='Jakarta'){
										$sp=10000;
									}else{
										$sp=30000;
										}
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
										<td></td>
										<td>
                                        <?php if($gtotal>0){ ?>
                                        	<button class="btn btn-success" onclick="proses()">Proses</button>
                                        <?php } ?>
                                        </td>
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