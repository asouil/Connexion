<?php

require 'connect.php';
require 'db.php';
//verif connectés
//bdd ->asouil ->biere
$tabbeer;

$sql = 'SELECT * FROM `biere`';
//on peut retirer les `
$statement = $pdo->query($sql);
$tabbeer = $statement->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Beers</title>
	<meta charset="utf-8">
</head>
<body>



	<section>
		<?php foreach($tabbeer as $row ): ?>
			
		<!-- <?php  ?> Boucle sur le tableau des bieres -->
		<article>
			<h2><?= $row["nom"] ?></h2>
			<p><?= $row["description"] ?></p>
		</article>
	<?php endforeach ?>
	</section>

	<nav>
		<a href="page.php">Site</a><br/>
		<a href="profil.php">Mon Profil</a><br/>
		<a href="biere.php">Ma biere</a><br/>
		<a href="?deconnect=true">Déconnexion</a>
	</nav>
</body>
</html>