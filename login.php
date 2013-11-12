<?php
	require_once('db.php');
	require_once('layout/header.html');
?>
<div class="container">
	<div class="row">
		<div class="span6 offset3">
			<br />
				<form class="form-horizontal">
					<legend>Zaloguj się</legend>
					<div class="control-group">
						<label class="control-label" for="inputEmail">Login:</label>
						<div class="controls">
							<input type="text" id="inputEmail" placeholder="login">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="inputPassword">Hasło:</label>
						<div class="controls">
							<input type="password" id="inputPassword" placeholder="haslo"><br />
							
						</div>
					</div>
					<div class="control-group">
						<div class="controls">
							<button type="submit" class="btn btn-primary">Zaloguj</button>
						</div>
					</div>	
				</form>
		</div>
	</div>
</div>
<?php
	require_once('layout/footer.html');
?>