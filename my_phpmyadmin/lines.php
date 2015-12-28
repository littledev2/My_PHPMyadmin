<?php
	$nameDB = $_GET["database"];
    $nametable = $_GET["table"];
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
	$reponse = $bdd->query('select column_name from information_schema.columns where table_name = "'.$nametable.'" and table_schema = "'.$nameDB.'" ');
	echo '<table class="table table-striped"><h3 id="title">'.$nametable.'</h3><thead><tr>';
	while($donnees = $reponse->fetch())
	{
		$name_colonne = $donnees[$i];
		echo '<th>'.$name_colonne.'</th>';
	}
	echo '</tr></thead>';
	echo '<tbody>';
	$rep_line = $bdd->query('select * from '.$nametable);
	while($lines = $rep_line->fetch())
	{
		echo '<tr>';
		/*while(colonne de ligne)
		{
			echo '<td>';
			echo '</td>';
		}*/
		echo '</tr>';
	}
	echo '</tr></tbody></table>';
?>
