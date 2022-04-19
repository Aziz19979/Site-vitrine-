<?php
//connexion à la bdd
//try
//{
//	$db=new PDO ('mysql:host=localhost; dbname=ogondoco_ogondo', 'ogondoco', '9d8-0fYYBh5(pD', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4"));
//}
//catch (Exception $e)
//{
//	die('Erreur : ' . $e->getMessage());
//}


//connexion à la bdd en local

function ajouter ($nom, $etat, $courant, $protection)
{

	if(require("connexion.php"))
	{
		$req= $access->prepare ("INSERT INTO `voie` (`nom`, `Etat`, `courant`, `protection`) VALUES ($nom, $etat, $courant, $protection)");
		$req= $access->execute (array($nom, $etat, $courant, $protection));
		$req->closecuror();
	}
}

function afficher () 
{
	if(require("connexion.php"))
	
	{
		$req= $access->prepare("SELECT * FROM 'voie' ");
		$req->execute();
		$data = $req->fetchAll (PDO ::FETCH_OBJ);
		return $data;
		$req->closecuror();

	}
}

?>