<?php
	$nameDB = $_GET["database"];
	$dsn = 'mysql:dbname='.$nameDB.';host=127.0.0.1';
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
	$reponse = $bdd->query('show tables');
	echo '<table class="table table-striped" id="tableau-tables" type="table"><h3 id="title-table">'.$nameDB.'</h3>';
	echo '<thead><tr><th>Table</th><th colspan="4">actions</th><th>Nombre de lignes</th></tr></thead>';
	echo '<tbody>';
	while($donnees = $reponse->fetch())
	{
		$tablename = $donnees[$i];
		echo '<tr class="ligne-db"><form action="edit-table.php?database='.$nameDB.'&old-table='.$tablename.'" method="post"><td class=col-db><input id='.$j.' name="new-table" class="db-name" placeholder="'.$tablename.'"></td>';
		echo '<td class="col-db"><button class="btn btn-success" type="submit">Changer le nom</button></form></td>';
		echo '<td class="col-db"><a class="btn btn-danger" href="drop-table.php?database='.$nameDB.'&table='.$tablename.'">Supprimer</a></td>';
		echo '<td class="col-db"><a class="btn btn-primary" href="structure.php?database='.$nameDB.'&table='.$tablename.'">Structure</a></td>';
		echo '<td class="col-db"><a class="btn btn-warning" href="lines.php?database='.$nameDB.'&table='.$tablename.'">Editer</a></td>';
		$rep_line = $bdd->query('select * from '.$tablename);
		while($lines = $rep_line->fetch())
		{
			++$n;
		}
		echo '<td class="col-db"<p>'.$n.'</p></td>';
		++$j;
		$n = 0;
	}
	echo '</tr>';
	echo '<tr class="ligne-db"><form action="add-table.php?database='.$nameDB.'" method="post"><td class=col-db><input type="text" name="new-table" placeholder="Creer une table"></input></td><td class=col-db><input type="submit" class="btn btn-info"></input></td></form></tr></tbody></table>';
?>