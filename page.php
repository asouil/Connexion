<?php
require 'connect.php';

echo "Bonjour {$username}<br />";
echo "Super site !!! <br />";
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
	<nav>
		<a href="page.php">Site</a><br/>
		<a href="profil.php">Mon Profil</a><br/>
		<a href="biere.php">Ma biere</a><br/>
		<a href="?deconnect=true">Déconnexion</a>
	</nav>
</body>