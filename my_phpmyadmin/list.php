<?php
	$dsn = 'mysql:dbname=mysql;host=127.0.0.1';
	$user = 'root';
	$password = '';
	$i = 0;
	$j = 0;
	$n = 0;

	try
	{
		$bdd = new PDO($dsn, $user, $password);
	}
	catch (PDOException $e)
	{
		echo 'Connexion échouée : ' . $e->getMessage();
	}
	$reponse = $bdd->query('show databases');
	echo '<table class="table table-striped" id="table-db" type="table"><h3 id="title">My_PHPMyAdmin</h3>';
	echo '<thead><tr><th>Nom</th><th colspan="3">actions</th><th>Nombre de tables</th><th>Date de creation</th><th>Taille</th></tr></thead>';
	echo '<tbody>';
	while($donnees = $reponse->fetch())
	{
		$dbname = $donnees[$i];
		echo '<tr class="ligne-db"><form action="edit-db.php?database='.$dbname.'" method="post"><td class=col-db><input id='.$j.' name="db-name" class="db-name" placeholder="'.$donnees[$i].'"></td>';
		echo '<td class="col-db"><button class="btn btn-success" type="submit">Changer le nom</button></form></td>';
		echo '<td class="col-db"><a class="btn btn-danger" href="drop.php?database='.$dbname.'">supprimer</a></td>';
		echo '<td class="col-db"><a class="btn btn-primary" href="tables.php?database='.$dbname.'">Editer</a></td>';
		$rep_table = $bdd->query('show tables from '.$dbname);
		while($tables = $rep_table->fetch())
		{
			++$n;
		}
		echo '<td class="col-db"<p>'.$n.'</p></td>';
		++$j;
		$n = 0;
		$rep_date = $bdd->query('SELECT MIN(CREATE_TIME) FROM information_schema.tables WHERE TABLE_SCHEMA="'.$dbname.'";');
		while($date = $rep_date->fetch())
		{
			echo '<td class = "col-db"><p>'.$date[0].'</p></td>';
		}
		$rep_size = $bdd->query('SELECT CONCAT( SUM(ROUND( ( (DATA_LENGTH + INDEX_LENGTH - DATA_FREE) / 1024 / 1024),2)), "Mo" ) FROM information_schema.TABLES WHERE TABLE_SCHEMA = "'.$dbname.'";');
		while($size = $rep_size->fetch())
		{
			echo '<td class = "col-db"><p>'.$size[0].'</p></td>';
		}
		echo '</tr>';
	}
	echo '<tr class="ligne-db"><form action="add.php" method="post"><td class=col-db><input type="text" name="new-db" placeholder="Ajouter"></input></td><td class=col-db><input type="submit" class="btn btn-info"></input></td></form></tr></tbody></table>';
	$reponse->closeCursor();
?>