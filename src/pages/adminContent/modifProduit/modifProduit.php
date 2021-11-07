<?php
session_start();
require "../../../fonctions/mesFonctions.php";
require "../../../common/dbProduitsFonctions.php";
$idproduit=$_SESSION["productID"];


 if(isset($_POST["description"]) && isset($_POST["productName"]) && isset($_POST["prix"]) && isset($_POST["tailleMemoire"]) &&
    isset($_POST["processeur"]) && isset($_POST["processeurFab"]) && isset($_POST["resolutionEcran"]) && isset($_POST["tailleEcran"]) &&
    isset($_POST["carteGraphique"]) && isset($_POST["typeHDD"]) && isset($_POST["tailleHDD"]) && isset($_POST["poids"]) && isset($_POST["OS"])){
    // on assainit les données
    $donnees = array(
        'description'     => FILTER_SANITIZE_STRING,
        'productName'  => FILTER_SANITIZE_STRING,
        'prix'     => FILTER_SANITIZE_NUMBER_FLOAT,
        'tailleMemoire'  => FILTER_SANITIZE_NUMBER_FLOAT,
        'processeur'     => FILTER_SANITIZE_STRING,
        'processeurFab'  => FILTER_SANITIZE_STRING,
        'resolutionEcran'     => FILTER_SANITIZE_STRING,
        'tailleEcran'  => FILTER_SANITIZE_STRING,
        'carteGraphique'     => FILTER_SANITIZE_STRING,
        'typeHDD'  => FILTER_SANITIZE_STRING,
        'tailleHDD'  => FILTER_SANITIZE_NUMBER_FLOAT,
        'poids'     => FILTER_SANITIZE_NUMBER_FLOAT,
        'OS'  => FILTER_SANITIZE_STRING,
    );

    $result = filter_input_array(INPUT_POST, $donnees);

    $fichier=$_FILES["fichier"];
    sendImg($fichier);
    $destination = sendImg($fichier);


    $description=nl2br(htmlspecialchars($_POST["description"]));
    $categoryID=$_POST["categoryID"];
    $onTop=$_POST["onTop"];
    $productName=htmlspecialchars($_POST["productName"]);
    $prix=htmlspecialchars($_POST["prix"]);
    $tailleMemoire=htmlspecialchars($_POST["tailleMemoire"]);
    $processeur=htmlspecialchars($_POST["processeur"]);
    $processeurFab=htmlspecialchars($_POST["processeurFab"]);
    $resolutionEcran=htmlspecialchars($_POST["resolutionEcran"]);
    $tailleEcran=htmlspecialchars($_POST["tailleEcran"]);
    $carteGraphique=htmlspecialchars($_POST["carteGraphique"]);
    $typeHdd=htmlspecialchars($_POST["typeHDD"]);
    $tailleHdd=htmlspecialchars($_POST["tailleHDD"]);
    $poids=htmlspecialchars($_POST["poids"]);
    $OS=htmlspecialchars($_POST["OS"]);

    try {


        deleteProduits($idproduit);
        nouveauProduit($destination, $description, $categoryID, $onTop,$productName,$prix, $tailleMemoire, $processeur, $processeurFab, $resolutionEcran, $tailleEcran, $carteGraphique, $typeHdd, $tailleHdd, $poids, $OS);
        header("location: ../../admin.php?page=listeProduits");
        exit();
    
} catch (Exception $e) {
        die('Erreur: ' . $e->getMessage());
    }
}
 ?>
