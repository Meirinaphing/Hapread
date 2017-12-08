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
function tambah(id){
     $.ajax({
         type: "POST",
         url: "<?php echo base_url() ;?>"+"home/tambah_cart/"+id, 
         data: {kosong:'kosong'},
         dataType: "text",  
         cache:false,
         success: 
              function(data){
				  $('#jum').html(data);
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
				  $('#jum').html(data);
                //alert(data);  //as a debugging message.
              }
          });// you have missed this bracket
		  reloadcart(id)
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
                    <?php
                    foreach ($temp as $row) {
						
						$que=$this->m_data->tampil_buku($row['idbuku']);
						foreach ($que as $buk) {
							
							
					?>
					<tbody>
						<tr>
							<td class="cart_product">
                            
								<a href=""><img width="120pt" src="<?php echo base_url('assets/images/home/book1.jpg'); ?>" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href=""><?php echo $buk['judul']; ?></a></h4>
								<p>Product ID: <?php echo $buk['idbuku']; ?></p>
							</td>
							<td class="cart_price">
								<p><?php echo $row['harga']; ?></p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<a class="cart_quantity_up" href="" onClick="tambah('<?php echo $row['idbuku']; ?>')"> + </a>
                                    <div id="jum">
									<input class="cart_quantity_input" type="text" name="quantity" value="<?php echo $row['jumlah']; ?>" autocomplete="off" size="2" disabled >
									</div>
                                    <a class="cart_quantity_down" href=""onClick="kurang('<?php echo $row['idbuku']; ?>')"> - </a>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price"><?php echo $row['totharga']; ?></p>
							</td>
							<td class="cart_delete">
                            
								<a href="<?php echo base_url().'home/hapus_cart/'.$row['idbuku']; ?>" class="btn cart_quantity_delete"><i class="fa fa-times"></i></a>
							</td>
						</tr>
					</tbody>
                    <?php
						}
                    }
                    ?>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>Next Step</h3>
				<p>Fill your location.</p>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="chose_area">
						
						<ul class="user_info">
							<li class="single_field">
								<label>Province:</label>
								<select>
									<option>Select</option>
									<option>Dhaka</option>
									<option>London</option>
									<option>Dillih</option>
									<option>Lahore</option>
									<option>Alaska</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
								
							</li>
							<li class="single_field">
								<label>City / District:</label>
								<select>
									<option>Select</option>
									<option>Dhaka</option>
									<option>London</option>
									<option>Dillih</option>
									<option>Lahore</option>
									<option>Alaska</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
							
							</li>
							<li class="single_field zip-field">
								<label>Zip Code:</label>
								<input type="text">
							</li>
						</ul>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span>Rp 89.000</span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span>Rp 89.000</span></li>
						</ul>
							<a class="btn btn-default update" href="">Checkout</a>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->


	<?php echo $footer; ?>
</body>
</html>