<?php

function bdd(){   
    $bdd = new PDO("mysql:host=localhost;dbname=emagasin", "root","");//connexion db 
    return $bdd;
}

function nouveauProduit($imgUrl, $description, $categoriyID, $onTop, $productName, $prix, $tailleMemoire, $processeur, $processeurFab, $resolutionEcran, $tailleEcran, $carteGraphique, $typeHdd, $tailleHdd, $poids, $OS){
       
    $bdd = bdd();
    
    $sql = "INSERT INTO product(imgUrl, description, categoryID, onTop, productName) VALUES(?, ?, ?, ?, ?)";//requete
    
    $stmt = $bdd->prepare($sql);//preparation de la requete
    $stmt->execute([$imgUrl, $description, $categoriyID, $onTop, $productName]);//execution de la requete

    $productId=$bdd->lastInsertId();//on recupere l'id du produit

    $sql = "INSERT INTO fichetechnique(productId, prix, tailleMemoire, processeur, processeurFab, resolutionEcran, tailleEcran, carteGraphique, typeHdd, tailleHdd, poids, OS) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $smtp=$bdd ->prepare($sql);

    $smtp ->execute([(int)$productId, $prix, $tailleMemoire, $processeur, $processeurFab, $resolutionEcran, $tailleEcran, $carteGraphique, $typeHdd, $tailleHdd, $poids, $OS]);

}

function recupListeProduits(){

    $bdd = bdd();
    $sql = "SELECT * FROM product
    inner join fichetechnique
    on product.productIdINT = fichetechnique.productId";//requete

    $stmt = $bdd->prepare($sql);//preparation de la requete
    $stmt->execute();//execution de la requete

    // $result = $stmt->fetchAll(PDO::FETCH_ASSOC); asso
    $result = $stmt->fetchAll(PDO::FETCH_OBJ); //objet
    return $result;
} 

function deleteProduits($idcategorie){
    $bdd = bdd();
    $sql = "DELETE from product where productIdINT = ?";//requete

    $stmt = $bdd->prepare($sql);//preparation de la requete
    $stmt->execute([$idcategorie]);//execution de la requete

    $sql = "DELETE from fichetechnique where productId = ?";//requete

    $stmt = $bdd->prepare($sql);//preparation de la requete
    $stmt->execute([$idcategorie]);//execution de la requete
}

function modifProduct($id){
    $bdd = bdd();
    $sql = "SELECT * FROM product
    inner join fichetechnique
    on product.productIdINT = fichetechnique.productId
    where product.productIdINT = $id";//requete

    $stmt = $bdd->prepare($sql);//preparation de la requete
    $stmt->execute();//execution de la requete

    // $result = $stmt->fetchAll(PDO::FETCH_ASSOC); asso
    $result = $stmt->fetch(PDO::FETCH_OBJ); //objet
    return $result;

}


