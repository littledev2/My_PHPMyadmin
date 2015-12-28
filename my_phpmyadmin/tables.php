<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>my_PhpMyAdmin</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

</head>
<body>
	<header>
	</header>
	<div id="liste-db">
	<?php
	include("list_table.php");
	?>
	</div>
	<footer>
		<script type="text/javascript" src="actions.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	</footer>
</body>
</html>