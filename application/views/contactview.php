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


	<div id="contact-page" class="container">
		<div class="bg">
			<div class="row">    		
				<div class="col-sm-12">    			   			
					<h2 class="title text-center">Contact <strong>Us</strong></h2>
				</div>
			</div>			 		
		</div>    	
		<div class="row">  	
			<div class="col-sm-8">
				<div class="contact-form">
					<h2 class="title text-center">Get In Touch</h2>
					<div class="status alert alert-success" style="display: none"></div>
					<?php if($account){
						foreach ($account as $row) {
							$email = $row['email'];
							$nama = $row['nama'];
						}
					}else{
						$email = "";
						$nama = "";
					}
					?>
					<form id="main-contact-form" class="contact-form row" name="contact-form" method="post" action="<?php echo base_url('/Home/insert_contact'); ?>">
						<div class="form-group col-md-6">
							<input type="text" name="name" class="form-control" required="required" placeholder="Name" value="<?php echo $nama; ?>">
						</div>
						<div class="form-group col-md-6">
							<input type="email" name="email" class="form-control" required="required" placeholder="Email" value="<?php echo $email; ?>">
						</div>
						<div class="form-group col-md-12">
							<input type="text" name="subject" class="form-control" required="required" placeholder="Subject">
						</div>
						<div class="form-group col-md-12">
							<textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Your Message Here"></textarea>
						</div>                        
						<div class="form-group col-md-12">
							<input type="submit" name="submit" class="btn btn-primary pull-right" value="Submit">
						</div>
					</form>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="contact-info">
					<h2 class="title text-center">Contact Info</h2>
					<address>
						<p>Hapread Online Bookstore</p>
						<p>Jl. Boulevard Raya Gading Serpong Kav.30, Gading Serpong</p>
						<p>Tangerang, Banten</p>
						<p>Mobile: +62 812 3456 7890</p>
						<p>Email: hapread@domain.com</p>
					</address>
					<div class="social-networks">
						<h2 class="title text-center">Social Networking</h2>
						<ul>
							<li>
								<a href="#"><i class="fa fa-facebook"></i></a>
							</li>
							<li>
								<a href="#"><i class="fa fa-twitter"></i></a>
							</li>
							<li>
								<a href="#"><i class="fa fa-google-plus"></i></a>
							</li>
							<li>
								<a href="#"><i class="fa fa-youtube"></i></a>
							</li>
						</ul>
					</div>
				</div>
			</div>    			
		</div>  
	</div>	
</div><!--/#contact-page-->


<?php echo $footer; ?>
</body>
</html>