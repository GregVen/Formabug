<?php 

function bdd(){   
    $bdd = new PDO("mysql:host=localhost;dbname=emagasin", "root","");//connexion db
    return $bdd;
}

function recupListeCategories(){

    $bdd = bdd();
    $sql = "SELECT * FROM category";//requete

    $stmt = $bdd->prepare($sql);//preparation de la requete
    $stmt->execute();//execution de la requete

    // $result = $stmt->fetchAll(PDO::FETCH_ASSOC); asso
    $result = $stmt->fetchAll(PDO::FETCH_OBJ); //objet
    return $result;
}

function nouvelleCategory($categorie){
       
    $bdd = bdd();
    
    $sql = "INSERT INTO category(typeProduct) VALUES(?)";//requete
    
    $stmt = $bdd->prepare($sql);//preparation de la requete
    $stmt->execute([$categorie]);//execution de la requete
}

function deleteCategory($idcategorie){
    $bdd = bdd();
    $sql = "DELETE from category where categoryId = ?";//requete

    $stmt = $bdd->prepare($sql);//preparation de la requete
    $stmt->execute([$idcategorie]);//execution de la requete

}

function update_categorie($categorie,$idcategorie){

    $bdd = bdd();
 
    $sql = "UPDATE category
            SET typeProduct = ? where categoryId = ?";//requete

    $stmt = $bdd->prepare($sql);//preparation de la requete
    $stmt->execute([$categorie, $idcategorie]);//execution de la requete 


}

function viewUpDateCategorie($idcategorie){
    $bdd = bdd();

    // $id = $_GET["id"];//on recupere le GET (valeur id de l'url recupérée)
    $sql = "SELECT * FROM category WHERE categoryId = ?";//requete

    $stmt = $bdd->prepare($sql);//preparation de la requete
    $stmt->execute([$idcategorie]);//execution de la requete
    $result = $stmt->fetch(PDO::FETCH_OBJ); //objet
    return $result;
}
