<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Hapread Online Bookstore</title>
	<?php echo $js; ?>
	<?php echo $css; ?>
</head>
<body>
	<?php echo $header; ?>

	<!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form action="<?php echo base_url('index.php/home/aksi_login'); ?>" method="post">
							<input type="email" id="email" name="email" placeholder="Email" />
							<input type="password" id="password" name="password" placeholder="Password"/>
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
						<form action="#">
							<input type="text" id="name" name="name" placeholder="Name"/>
							<input type="email" id="email" name="email" placeholder="Email Address"/>
							<input type="pass" id="password" name="password" placeholder="Password"/>
							<input type="pass" id="repass" name="repass" placeholder="Repassword"/>
                          	<button type="submit" class="btn btn-default">Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div><br>




	<?php echo $footer; ?>
</body>
</html>