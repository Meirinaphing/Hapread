<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Hapread Online Bookstore</title>
	<?php echo $js; ?>
	<?php echo $css; ?>
	
	<script>
		function cekpss(s){
			var s=s;
			var	ps = document.getElementById('newpass').value;
			if(s == ps){

			}else{
				document.getElementById('repass').value="";
				alert("Password dan RePasword tidak cocok silahkan Periksa Kembali");
				document.getElementById('newpass').focus();
			}

		}
	</script>

</head>
<body>
	<?php echo $header; ?>

	<?php foreach($account as $row){ ?>

	<!-- Modal -->
	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Edit Identitas</h4>
				</div>
				<div class="modal-body">
					<form class="form-horizontal" method="post" action="<?php echo base_url().'index.php/Home/edit_account'; ?>">
						<div class="form-group">
							<label class="control-label col-sm-2">Nama : </label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="nama" name="nama" placeholder="Edit Nama Anda" value="<?php echo $row['nama']; ?>" required>
								<input type="hidden" id="id" name="id" value="<?php echo $row['iduser']; ?>">

							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2">Email : </label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="email" name="email" placeholder="Edit Email Anda" value="<?php echo $row['email']; ?>" disabled>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2">Jenis Kelamin : </label>
							<div class="col-sm-10">
								<select name="jk" id="jk" class="form-control">
									<?php
									if($row['jeniskelamin']=="Pria"){
										?>
										<option>Pria</option>
										<option>Wanita</option>
										<?php
									}else{
										?>
										<option>Wanita</option>
										<option>Pria</option>
										<?php
									}
									?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2">Alamat : </label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="alamat" name="alamat" placeholder="Edit Alamat Anda" value="<?php echo $row['alamat']; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2">Kota : </label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="kota" name="kota" placeholder="Edit Kota Anda" value="<?php echo $row['kota']; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2">Provinsi : </label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="provinsi" name="provinsi" placeholder="Edit Provinsi Anda" value="<?php echo $row['provinsi']; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2">Kode Pos : </label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="kodepos" name="kodepos" placeholder="Edit Kode Pos Anda" value="<?php echo $row['kodepos']; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2">No HP : </label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="nohp" name="nohp" placeholder="Edit No HP Anda" value="<?php echo $row['nohp']; ?>">
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<input type="submit" class="btn btn-primary" value="Update">
					</div>
				</form>
			</div>

		</div>
	</div>

	<!-- Modal -->
	<div id="myModal2" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Edit Password</h4>
				</div>
				<div class="modal-body">
					<form class="form-horizontal" method="post" action="<?php echo base_url().'index.php/Home/edit_password'; ?>">
						<div class="form-group">
							<label class="control-label col-sm-2">Old Password</label>
							<div class="col-sm-10">
								<input type="password" class="form-control" id="oldpass" name="oldpass" placeholder="Masukkan password lama Anda" required>
								<input type="hidden" name="pass" value="<?php echo $row['password']; ?>">
								<input type="hidden" name="id" value="<?php echo $row['iduser']; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2">New Password</label>
							<div class="col-sm-10">
								<input type="password" class="form-control" id="newpass" name="newpass" placeholder="Masukkan password Anda" required>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2">Re-type Password</label>
							<div class="col-sm-10">
								<input type="password" class="form-control" id="repass" onChange="cekpss(this.value)" name="repass" placeholder="Masukkan ulang password Anda" required>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<input type="submit" class="btn btn-primary" value="Update">
					</div>
				</form>
			</div>

		</div>
	</div>

	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
					<li><a href="#">Home</a></li>
					<li class="active">Account</li>
				</ol>
			</div><!--/breadcrums-->


			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-7 clearfix">
						<div class="bill-to">
							<!-- <p>Nama : </p> -->
							<div class="form-one">
								<p> Nama </p>
								<p> Email </p>
								<p> Jenis Kelamin </p>
								<p> Alamat </p>
								<p> Kota </p>
								<p> Provinsi </p>
								<p> Kodepos </p>
								<p> No HP </p>
								<button class="btn btn-primary" data-toggle="modal" data-target="#myModal">Edit Identitas</button>
								<button class="btn btn-primary" data-toggle="modal" data-target="#myModal2">Edit Password</button>
								<br><br><br>
							</div>
							<div class="form-two">
								<p> <?php echo $row['nama']; ?> </p>
								<p> <?php echo $row['email']; ?> </p>
								<p> <?php echo $row['jeniskelamin']; ?> </p>
								<p> <?php echo $row['alamat']; ?> </p>
								<p> <?php echo $row['kota']; ?> </p>
								<p> <?php echo $row['provinsi']; ?> </p>
								<p> <?php echo $row['kodepos']; ?> </p>
								<p> <?php echo $row['nohp']; ?> </p>
							</div>
						</div>
					</div>
					<div class="col-sm-5">
						<div class="order-message">
							<!-- <p>Shipping Order</p> -->

						</div>	
					</div>					
				</div>
			</div>
		</div>
	</section> <!--/#cart_items-->
	<?php } ?>
	<?php echo $footer; ?>
</body>
</html>