<?php
require 'connect.php';
require 'db.php';

echo "Mon profil est super secu (ou pas)! <br />";
echo "My name is ".substr($username, -3)." ".substr($username, 0, -3)."-".substr($username, -3).". <br />";

$sql = "SELECT * FROM utilisateurs";
$statement = $pdo->query($sql);
$users = $statement->fetchAll();


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Profil</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
		<h3>Liste des utilisateurs : <br/></h3>
		<ul><!--changer en tiret la puce -->
		<?php foreach ($users as $user) : ?>
			<li> <?= $user["nom"] ?> </li>
		<?php endforeach ?>
		</ul>
		<a href="page.php">Site</a><br/>
		<a href="profil.php">Mon Profil</a><br/>
		<a href="biere.php">Ma biere</a><br/>
		<a href="?deconnect=true">Déconnexion</a>
		</body>
</html>
