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
								<textarea class="form-control" id="alamat" name="alamat" placeholder="Edit Alamat Anda" rows="3"><?php echo $row['alamat']; ?></textarea>
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
						<div class="bill-to">
                        
					<div class="col-sm-4">
                    <table>
                    	<tr>
                        	<td>
                            	<p> Nama </p>
                            </td>
                        	<td style="padding:4px">
                            	<p> : </p>
                            </td>
                        	<td>
								<p> <?php echo $row['nama']; ?> </p>
                            </td>
                        </tr>
                    	<tr>
                        	<td>
								<p> Email </p>
                            </td>
                        	<td style="padding:4px">
                            	<p> : </p>
                            </td>
                        	<td>
								<p> <?php $email=$row['email']; echo $row['email']; ?> </p>
                            </td>
                        </tr>
                        	<td>
								<p> Jenis Kelamin </p>
                            </td>
                        	<td style="padding:4px">
                            	<p> : </p>
                            </td>
                        	<td>
								<p> <?php echo $row['jeniskelamin']; ?> </p>
                            </td>
                        </tr>
                        </tr>
                        	<td>
								<p> Alamat </p>
                            </td>
                        	<td style="padding:4px">
                            	<p> : </p>
                            </td>
                        	<td>
								<p> <?php echo $row['alamat']; ?> </p>
                            </td>
                        </tr>
                        </tr>
                        	<td><p> Kota </p>
                            </td>
                        	<td style="padding:4px">
                            	<p> : </p>
                            </td>
                        	<td>
								<p> <?php echo $row['kota']; ?> </p>
                            </td>
                        </tr>
                        </tr>
                        	<td>
                            	<p> Provinsi </p>
                            </td>
                        	<td style="padding:4px">
                            	<p> : </p>
                            </td>
                        	<td>
								<p> <?php echo $row['provinsi']; ?> </p>
                            </td>
                        </tr>
                        </tr>
                        	<td>
                            	<p> Kodepos </p>
                            </td>
                        	<td style="padding:4px">
                            	<p> : </p>
                            </td>
                        	<td>
								<p> <?php echo $row['kodepos']; ?> </p>
                            </td>
                        </tr>
                        </tr>
                        	<td>
								<p> No HP </p>
                            </td>
                        	<td style="padding:4px">
                            	<p> : </p>
                            </td>
                        	<td>
								<p> <?php echo $row['nohp']; ?> </p>
                            </td>
                        </tr>
                    </table>
								
								
								
								
								<button class="btn btn-primary" data-toggle="modal" data-target="#myModal">Edit Identitas</button>
								<button class="btn btn-primary" data-toggle="modal" data-target="#myModal2">Edit Password</button>
								<br><br><br>
                     </div>	
                      <?php } ?>      
					<div class="">
							<div class="container col-sm-8">
                           
                    <table class="table" style="text-align:center">
                        </tr>
                        	<td>
								<p> No Pesanan</p>
                            </td>
                        	<td>
                            	<p> Status </p>
                            </td>
                        	<td>
								<p> Nores </p>
                            </td>
                        	<td>
								<p> Dikirim ke </p>
                            </td>
                        	<td>
								<p> Action </p>
                            </td>
                        </tr>
                            <?php
							$que=$this->m_data->tampil_jual($email);
							foreach ($que as $dat) {
							if($dat['status']=='Belum Di Bayar'){
								$s="danger";
								}else if($dat['status']=='Batal'){
									$s="active";
									}else if($dat['status']=='Menuggu'){
									$s="warning";
										}else{$s="info";}
							?>
                        <tr class='<?php echo $s; ?>'>
                        	<td>
								<p><?php echo $dat['idjual']; ?></p>
                            </td>
                        	<td>
                            	<p><?php echo $dat['status']; ?></p>
                            </td>
                        	<td>
								<p><?php echo $dat['nores']; ?></p>
                            </td>
                        	<td>
								<p><?php echo $dat['provinsi']; ?></p>
                            </td>
                        	<td>
								<p> Action </p>
                            </td>
                        </tr>
                    
                            <?php } ?>
					</table>
                    		</div>
                    </div>				
				</div>
			</div>
		</div>
	</section> <!--/#cart_items-->
	
   
	<?php echo $footer; ?>
</body>
</html>