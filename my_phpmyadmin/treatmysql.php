<?php
	$requests = $_POST['txfreereq'];
	$dsn = 'mysql:dbname=mysql;host=127.0.0.1';
	$user = 'root';
	$password = '';

	if(empty($requests))
	{
		echo "Merci de rentrer quelque chose";
		header('Location: index.php');
		exit();
	}
	else
	{
		$array_req = explode(';', $requests);
		foreach	($array_req as $single_req)
		{
			//TO DO : vérifier structure des requêtes ?
			$single_req = $single_req . ';';
			try
			{
				$bdd->query($single_req);
			}
			catch (PDOException $e)
			{
				echo 'Erreur de requête : ' . $e->getMessage();
			}
		}
		header('Location: index.php');
		exit();
	}
?>