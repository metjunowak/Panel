<?php
	@$user = $_POST['user'];
	@$pass = $_POST['pass'];

	if(!isset($_POST['user']) && !isset($_POST['pass'])) {

		require_once('layout/header.html'); // Head html section
?>
	<!-- Main content -->
	<div class="container">
		<div class="row">
			<div class="span6 offset3">
				<br />
					<form class="form-horizontal" method="post" action="login.php">
						<legend>Zaloguj się</legend>
						<div class="control-group">
							<label class="control-label" for="inputEmail">Login:</label>
							<div class="controls">
								<input type="text" id="inputEmail" placeholder="login" name="user">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="inputPassword">Hasło:</label>
							<div class="controls">
								<input type="password" id="inputPassword" placeholder="haslo" name="pass"><br />
								
							</div>
						</div>
						<div class="control-group">
							<div class="controls">
								<button type="submit" class="btn btn-primary" value="zaloguj">Zaloguj</button>
							</div>
						</div>	
					</form>
			</div>
		</div>
	</div>
	<!-- End of Main content -->
<?php
		require_once('layout/footer.html'); // End of html code
	}
	else {
		require_once('../db.php'); // Connection with DB

		$stmt = $db->prepare('SELECT * FROM users WHERE login = :login AND password = :pass');
		$stmt->bindValue(':login', $user, PDO::PARAM_STR);
		$stmt->bindValue(':pass', $pass, PDO::PARAM_STR);
		$results = $stmt->execute();

		// TODO: Sessions params, hash passwords
		if($results == '1') {
			header('Location: home.php');
		}

	}


?>