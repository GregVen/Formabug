<?php
session_start();
$idproduit=$_GET["id"];

try{
    require "../../common/dbProduitsFonctions.php";
    deleteProduits($idproduit);

    header("location: ../admin.php?page=listeProduits");
    exit;
    

} catch (PDOException $e){
    echo $e->getMessage();
    echo $e->getLine(); 
    exit();
} 