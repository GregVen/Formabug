<?php
session_start();
$idcategorie=$_GET["id"];

echo getcwd();
try{
    require "../../../common/dbCategorieFonctions.php";
    deleteCategory($idcategorie);

    header("location: ../../admin.php?page=categorieProduit");
    exit;
    

} catch (PDOException $e){
    echo $e->getMessage();
    echo $e->getLine();
    exit();
} 