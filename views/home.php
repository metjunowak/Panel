<?php
	session_start();
	if($_SESSION['logged'] == 1) {

	require_once('layout/header.html');  // Head html section 
	require_once('layout/top.html'); 	// Bar on the top of site
	$user = $_SESSION['user'];
	
?>

<div class="container-fluid">
	<div class="row-fluid">

<?php 
	require_once('layout/navbar.html'); 	// Menu on the left
?>

		<!-- Main content -->
		<div class="span9">
			<?php 
				if(isset($_GET['logSuccess'])) {
			?>
				<div class="row">
				<div class="alert alert-success">
					 <button type="button" class="close" data-dismiss="alert">&times;</button>
					<h4>Logowanie udane!</h4>
				</div>
				</div>
			<?php
				}
			?>
			<div class="row">
				<div class="hero-unit">
					<h1>Witaj <?=$user?></h1>
				</div>
			</div>
		</div>
		<!-- end of Main content -->

	</div>
</div>

<?php
	require_once('layout/footer.html'); // End of html code
	}
	else {
		header('Location: login.php');
	}
?>