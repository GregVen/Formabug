<?php
// var_dump($_POST);
session_start();
$categorie=htmlspecialchars($_POST["categorie"]);

require "../../../common/dbCategorieFonctions.php";

try{
   


    nouvelleCategory($categorie); 

    header("location: ../../admin.php?page=categorieProduit");
    exit;

} catch (PDOException $e){
    echo $e->getMessage();
    echo $e->getLine();
    exit();
}
