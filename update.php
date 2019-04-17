<?php
require 'connect.php';
require 'db.php';
//var_dump($_POST);die();

if(!empty($_POST)){
	$username = strtolower($_POST["username"]);
	$password = $_POST["password"];
	$id = $_POST["id"];

	if(!empty($id)){
		if(!empty($username)){
			require_once 'db.php';
			$sql = "SELECT * FROM utilisateurs WHERE `nom`= ?";
			$statement = $pdo->prepare($sql);
			$statement->execute([$username]);
			$user = $statement->fetch();
		
			if(!$user){
				if(!empty($password)){
					if(strlen($password) <= 10 && strlen($password) >= 5){
						$password = password_hash($password, PASSWORD_BCRYPT);
						require_once 'db.php';
						$sql = "UPDATE `utilisateurs` SET `nom` = :nom, `password` = :password WHERE `utilisateurs`.`id` = :id";
						$statement = $pdo->prepare($sql);
						$result = $statement->execute([
							":nom"		=>	$username,
							":password"	=>  $password,
							":id"		=>	$id
						]);
					}else{
						die("mdp mauvais format");
						// TODO cree erreur
					}
				}else{
					//modification uniquement name
					require_once 'db.php';
					$sql = "UPDATE `users` SET `nom` = :nom WHERE `utilisateurs`.`id` = :id";
					$statement = $pdo->prepare($sql);
					$result = $statement->execute([
						":nom"		=>	$username,
						":id"		=>	$id
					]);
				}
			}else{
				if(!empty($password)){
					if(strlen($password) <= 10 && strlen($password) >= 5){
						$password = password_hash($password, PASSWORD_BCRYPT);
						require_once 'db.php';
						$sql = "UPDATE `utilisateurs` SET `nom` = :nom, `password` = :password WHERE `utilisateurs`.`id` = :id";
						$statement = $pdo->prepare($sql);
						$result = $statement->execute([
							":nom"		=>	$username,
							":password"	=>  $password,
							":id"		=>	$id
						]);
					}
				}else{
					die("username existe déjà");
					// TODO cree erreur
				}
			}
		}
	}
}
header("Location: profil.php");