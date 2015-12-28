<?php
	$newDB = $_POST['db-name'];
	$oldDB = $_GET["database"];
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
		$bdd->query('mysqldump --root='.$login.' --password='.$pswd.' --host=127.0.0.1'.$oldDB.' > temp.sql;');
		$bdd->query('CREATE DATABASE '.$newDB.' CHARACTER SET \'utf8\';');
		$bdd->query('mysqldump --root='.$login.' --password='.$pswd.' --host=127.0.0.1'.$newDB.' < temp.sql;');
		$bdd->query('DROP DATABASE '.$oldDB.';');
	}
	catch (PDOException $e)
	{
		echo 'Erreur renommage base de données : ' . $e->getMessage();
	}
	header('Location: database.php');
	exit();
?>