<?php
	$nameDB = $_POST['new-db'];
	$dsn = 'mysql:dbname=mysql;host=127.0.0.1';
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
		$reponse = $bdd->query('create database '.$nameDB);
	}
	catch (PDOException $e)
	{
		echo 'Erreur création base de données : ' . $e->getMessage();
	}
	header('Location: database.php');
	exit();
?>