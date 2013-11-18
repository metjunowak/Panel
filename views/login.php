<?php
	session_start();
	if(!isset($_SESSION['logged'])) {

		@$user = $_POST['user'];
		@$pass = md5($_POST['pass']);

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
						<!-- Wrong login alert -->
						<?php
							if (isset($_GET['error'])) { 
						?>
						<div class="alert alert-error">
   							<button type="button" class="close" data-dismiss="alert">&times;</button>
   							<strong>Błąd logowania!</strong> Wprowadzono nieprawidłowy login lub hasło
    					</div>
    					<!-- Empty data alert -->
    					<?php 
    						}
    						elseif (isset($_GET['empty'])) { 
						?>
						<div class="alert">
   							<button type="button" class="close" data-dismiss="alert">&times;</button>
   							<strong>Błąd danych!</strong> Login i hasło nie mogą być puste
    					</div>
    					<!-- Logout alert -->
    					<?php 
    						}
    						elseif (isset($_GET['logout'])) { 
						?>
						<div class="alert alert-success">
   							<button type="button" class="close" data-dismiss="alert">&times;</button>
   							<strong>Wylogowano!</strong> Nastąpiło poprawne wyjście
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

			$stmt = $db->prepare('SELECT * FROM user WHERE login = :login AND password = :pass');
			$stmt->bindValue(':login', $user, PDO::PARAM_STR);
			$stmt->bindValue(':pass', $pass, PDO::PARAM_STR);
			//$stmt->execute();
			if($stmt->execute()) {
				$results = $stmt->fetchAll();
						
				if(sizeof($results) === 1) {
					//sessions
					session_start();
					$_SESSION['logged'] = 1;
					$_SESSION['user'] = $user;
					header('Location: home.php?logSuccess');
				}
				elseif(empty($user) || empty($pass)) {
					header('Location: login.php?empty');
				}
				else {
					header('Location: login.php?error');
				}
			} 
			else { 
				echo 'Błąd tabeli';
			}
		}
	}
	else {
		header('Location: home.php');
	}

?>