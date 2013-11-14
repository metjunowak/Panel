<?php
	@$user = $_POST['user'];
	@$pass = $_POST['pass'];

	if(!isset($_POST['user'])  && !isset($_POST['pass'])) {

		require_once('layout/header.html'); // Head html section
?>
	<!-- Main content -->
	<div class="container">
		<div class="row">
			<div class="span6 offset3">
				<br />
					<form class="form-horizontal" method="post" action="login.php">
						<legend>Zaloguj się</legend>
						<?php
							if (isset($_GET['error'])) { 
						?>
						<div class="alert alert-error">
   							<button type="button" class="close" data-dismiss="alert">&times;</button>
   							<strong>Błąd logowania!</strong> Wprowadzono nieprawidłowy login lub hasło
    					</div>
    					<?php 
    						}
    						elseif (isset($_GET['empty'])) { 
						?>
						<div class="alert">
   							<button type="button" class="close" data-dismiss="alert">&times;</button>
   							<strong>Błąd danych!</strong> Login i hasło nie mogą być puste
    					</div>
    					<?php 
    						}
    					?>
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
		$stmt->execute();
		$results = $stmt->fetchAll();
		// TODO: Sessions params, hash passwords, elseif logout
		
		if(sizeof($results) === 1) {
			header('Location: home.php?logSuccess');
		}
		elseif(empty($user) || empty($pass)) {
			header('Location: login.php?empty');
		}
		else {
			header('Location: login.php?error');
		}

	}


?>