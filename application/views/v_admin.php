<!DOCTYPE html>
<html>
<head>

</head>
<body>
<?php echo $a; ?>
	<h1>Login berhasil !</h1>
	<h2>Hai, <?php echo $this->session->userdata("email"); ?></h2>
	<a href="<?php echo base_url('home/logout'); ?>">Logout</a>
</body>
</html>