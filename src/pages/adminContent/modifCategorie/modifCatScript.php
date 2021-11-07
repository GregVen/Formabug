<?php
session_start();
$typeProduct=htmlspecialchars($_POST["categorie"]);
$category_id=$_SESSION["category_id"];

require "../../../common/dbCategorieFonctions.php";

try{
    echo "ok";
    update_categorie($typeProduct,$category_id); 

    header('location: ../../admin.php?page=categorieProduit');
    exit;

} catch (PDOException $e){
    echo $e->getMessage();
    echo $e->getLine();
    exit();
}