<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>my_PhpMyAdmin</title>
	<link rel="stylesheet" href="style.css"/>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"/>
</head>
<body>
	<header>
	</header>
		<div id="liste-db">
			<?php
			include("list.php");
			?>
		</div>
		<form method="post" id="freereq">
			<p>Requêtes libres</p>
			<p>
				<textarea name="txfreereq" rows="5" cols="40"></textarea>
			</p>
			<p class="button">
				<button type="submit">Executer</button>
			</p>
			<p class="button">
				<button type="reset">Annulez</button>
			</p>
		</form>
		<?php
			//include("treatmysql.php");
		?>
	<footer>
		<script type="text/javascript" src="actions.js"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	</footer>
</body>
</html>