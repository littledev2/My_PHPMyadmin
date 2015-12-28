<?php
	$nametable = $_POST['new-table'];
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
		$reponse = $bdd->query('create table '.$nametable.'(id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT, PRIMARY KEY (id) )');
	}
	catch (PDOException $e)
	{
		echo 'Erreur création de table : ' . $e->getMessage();
	}
	header('Location: tables.php?database='.$namedb);
	exit();
?>