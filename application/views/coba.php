<!DOCTYPE html>
<html>
    <head>
    <?php
		$hea = $this->load->view('v_a_header', NULL, TRUE);
		$footer = $this->load->view('v_a_footer', NULL, TRUE);
        ?>
    <link rel="icon" type="text/css" href="<?php echo base_url('assets/images/home/mini_logo.jpg'); ?>">
<link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
<link href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>" rel="stylesheet">
<link href="<?php echo base_url('assets/css/prettyPhoto.css'); ?>" rel="stylesheet">
<link href="<?php echo base_url('assets/css/price-range.css'); ?>" rel="stylesheet">
<link href="<?php echo base_url('assets/css/animate.css'); ?>" rel="stylesheet">
<link href="<?php echo base_url('assets/css/main.css'); ?>" rel="stylesheet">
<link href="<?php echo base_url('assets/css/responsive.css'); ?>" rel="stylesheet">
<script src="<?php echo base_url('assets/js/html5shiv.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/respond.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.scrollUp.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/price-range.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.prettyPhoto.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/main.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/contact.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/gmaps.js'); ?>"></script>
    
        <title>GROCERY GRUD - Belajarphp.net</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php foreach ($css_files as $file): ?>
            <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
        <?php endforeach; ?>
        <?php foreach ($js_files as $file): ?>
            <script src="<?php echo $file; ?>"></script>
        <?php endforeach; ?>
    </head>
    
    
    
    
    
    <body>
	<?php echo $hea; ?>   
    
    
    
    
    <section>
		<div class="container">                 
        	<div >
            <?php echo $output; ?>

		</div>
	</section>
<br>
<br>
<br>
<br>


	<?php echo $footer; ?>

    </body>
</html>