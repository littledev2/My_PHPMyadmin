<?php
	$nameDB = $_GET["database"];
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
		$reponse = $bdd->query('drop database '.$nameDB);
	}
	catch (PDOException $e)
	{
		echo 'Erreur suppression base de données : ' . $e->getMessage();
	}
	header('Location: database.php');
	exit();
	?>