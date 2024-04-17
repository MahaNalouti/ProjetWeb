<?php

$server='localhost';
$username='root';
$password='';
try{
    $connect=new PDO("mysql:host=$server;dbname=hms",$username,$password);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo 'connexion réussie';
}
catch(PDOException $excp){
    echo "Erreur :".$excp->getMessage();
}
?>
