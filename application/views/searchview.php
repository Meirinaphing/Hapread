<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Hapread Online Bookstore</title>
	<?php echo $js; ?>
	<?php echo $css; ?>
<script type="text/javascript">

function alertlogin(){
	 alert('Please login before buy');
}
function update(id){  

	var quan=document.getElementById('quan').value;    
	if (quan<1){quan=1;} 
     $.ajax({
         type: "POST",
         url: "<?php echo base_url() ;?>"+"home/update_cart/"+id, 
         data: {quan:quan},
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
function detil(id){       
     $.ajax({
         type: "POST",
         url: "<?php echo base_url() ;?>"+"home/tampildetil/", 
         data: {id:id},
         dataType: "text",  
         cache:false,
         success: 
              function(data){
				  $('#berubah').html(data);
				  //alert(data);  //as a debugging message.
              }
          });// you have missed this bracket
	 return false;
}
    </script>
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
								<img style="width:250px;height:400px;" data-toggle="modal" data-target="#myModal" onClick="detil('<?php echo $row->idbuku; ?>')" src="<?php echo base_url().'assets/buku/'.$row->gambar ;?>" alt="" /></a>
								<h2>Rp. <?php echo $row->harga;?></h2>
								<p><a href="" data-toggle="modal" data-target="#myModal" onClick="detil('<?php echo $row->idbuku; ?>')"><?php echo $row->judul ;?></a></p>
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
				<div class="row col-sm-12">
	
                        <center>
						<?php 
							echo $this->pagination->create_links();
					?>
						
					</center>
				</div>
			</div><!--features_items-->

		</div>
	</div>
</div>
</section>

<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog" style="width:80%;">
			<div class="modal-content">
				<div id="berubah"></div>

			</div>
		</div>
	</div>
<?php echo $footer; ?>
</body>



</html>