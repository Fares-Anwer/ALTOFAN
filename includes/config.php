<?php 

$dsn = "mysql:host=localhost;dbname=newsportal";
$user = "root";
$pass= "";
$options = array(
  PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8" , 
);
try{
$con=new PDO($dsn , $user ,$pass);
}
catch (PDOException $e)
{
	echo $e->getMessage();
}

?>