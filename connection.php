<?php 
$server='localhost';
$username='root';
$password='';
try{
    $connect=new PDO("mysql:host=$server;dbname=website",$username,$password);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
}
catch(PDOException $excp){
    echo "Erreur :".$excp->getMessage();
}
    
?>