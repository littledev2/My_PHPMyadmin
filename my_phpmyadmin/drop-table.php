<?php
	$nameDB = $_GET['database'];
	$nametable = $_GET['table'];
	$dsn = 'mysql:dbname='.$nameDB.';host=127.0.0.1';
	$user = 'root';
	$password = '';

	try
	{
		$bdd = new PDO($dsn, $user, $password);
	}
	catch (PDOException $e)
	{
		echo 'Connexion échouée : ' . $e->getMessage();
	}
	try
	{
		$bdd->query('DROP TABLE '.$nametable);
	}
	catch (PDOException $e)
	{
		echo 'Erreur suppression de table : ' . $e->getMessage();
	}
	header('Location: tables.php?database='.$nameDB);
	exit();
	?>