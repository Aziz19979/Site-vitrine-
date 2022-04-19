<?php
try
{
	$db=new PDO ('mysql:host=localhost; dbname=innov', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4"));
}
catch (Exception $e)
{
	die('Erreur : ' . $e->getMessage());
}
?>