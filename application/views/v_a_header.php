
<script>

$(function(){
    // this will get the full URL at the address bar
    var url = window.location.href; 

    // passes on every "a" tag 
    $("#isinav a").each(function() {
            // checks if its the same on the address bar
        if(url == (this.href)) { 
            $(this).closest("a").addClass("active");
        }
    });
});
</script>

	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">		
								<li><a href="#"><i></i>Account 						
                            	<?php
                                $em=$this->session->userdata('email');
								$account=$this->m_data->get_account($em);
								foreach($account as $row){
								?>
                                (<?php echo $row['nama']; ?>) </a>
                                </li>
                                <?php } ?>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="<?php echo base_url('Home'); ?>"><img src="<?php echo base_url('assets/images/home/logoo.png'); ?>" alt="" /></a>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
                        <?php
													
							?>
                            	<ul class="nav navbar-nav" id="isinav" >
								<?php 
 
								
								?>
                                
								<li><a href="<?php echo base_url('admin/account'); ?>"><i class="fa fa-user"></i>Account
                                </a></li>
								<li><a href="<?php echo base_url('home/logout'); ?>"><i class="fa fa-lock"></i> Logout</a></li>
							</ul>  
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->

		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse" id="isinav">
								<li><a href="<?php echo base_url('admin'); ?>" >Buku</a></li>
								<li><a href="<?php echo base_url('admin/slideshow'); ?>">SlideShow</a></li>
								<li><a href="<?php echo base_url('admin/recomended_item'); ?>">Recomended Item</a></li>
								<li><a href="<?php echo base_url('admin/verifikasi'); ?>">Verifikasi Pemesanan</a></li>
								<!-- <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
									<ul role="menu" class="sub-menu">
										<li><a href="#">Products</a></li>
										<li><a href="#">Product Details</a></li> 
										<li><a href="#">Checkout</a></li> 
										<li><a href="#">Cart</a></li> 
										<li><a href="#">Login</a></li> 
									</ul>
								</li> --> 
								<!-- <li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
									<ul role="menu" class="sub-menu">
										<li><a href="#">Blog List</a></li>
										<li><a href="#">Blog Single</a></li>
									</ul>
								</li>  -->
								<!-- <li><a href="#">404</a></li> -->
								<li><a href="<?php echo base_url('admin/contact'); ?>">Contact</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<input type="text" placeholder="Search"/>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->