<?php
	$newtable = $_POST['new-table'];
	$oldtable = $_GET['old-table'];
	$namedb = $_GET['database'];
	$dsn = 'mysql:dbname='.$namedb.';host=127.0.0.1';
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
		$bdd->query('ALTER TABLE '.$namedb.'.'.$oldtable.' RENAME TO '.$newtable);
	}
	catch (PDOException $e)
	{
		echo 'Erreur renommage base de données : ' . $e->getMessage();
	}
	header('Location: tables.php?database='.$namedb);
	exit();
	?>