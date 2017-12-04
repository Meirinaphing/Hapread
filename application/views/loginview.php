<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Hapread Online Bookstore</title>
	<?php echo $js; ?>
	<?php echo $css; ?>
</head>
<script>
	function cekpss(s){
		var s=s;
		var	ps = document.getElementById('pass').value;
		if(s == ps){

		}else{
			document.getElementById('repass').value="";
			alert("Password dan RePasword tidak cocok silahkan Periksa Kembali");
			document.getElementById('pass').focus();
		}

	}
</script>
<body>
	<?php echo $header; ?>

	<!--form-->
	<div class="container">
		<div class="row">
			<div class="col-sm-4 col-sm-offset-1">
				<div class="login-form"><!--login form-->
					<h2>Login to your account</h2>
					<form action="<?php echo base_url('home/aksi_login'); ?>" method="post">
						<input type="email" id="email" name="email" placeholder="Email" required/>
						<input type="password" id="password" name="password" placeholder="Password" required/>
						<button type="submit" class="btn btn-default">Login</button>
					</form>
				</div><!--/login form-->
			</div>
			<div class="col-sm-1">
				<h2 class="or">OR</h2>
			</div>
			<div class="col-sm-4">
				<div class="signup-form"><!--sign up form-->
					<h2>New User Signup!</h2>
					<form action="<?php echo base_url('home/regis'); ?>" method="post">
						<input type="text" id="name" name="name" placeholder="Name" required />
						<input type="email" id="email" name="email" placeholder="Email Address" required/>
						<input type="password" id="pass" name="pass" placeholder="Password" required/>
						<input type="password" id="repass" name="repass" onChange="cekpss(this.value)" placeholder="Repassword" required/>
						Jenis Kelamin : 
						<select name="jk" id="jk">
							<option>Pria</option>
							<option>Wanita</option>
						</select><br><br>
						<button type="submit" class="btn btn-default">Signup</button>
					</form>
				</div><!--/sign up form-->
			</div>
		</div>
	</div><br>
	<?php echo $footer; ?>
</body>
</html>