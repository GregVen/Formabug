<?php

function bdd(){   
    $bdd = new PDO("mysql:host=localhost;dbname=emagasin", "root","");//connexion db
    return $bdd;
}

function insert($login, $email, $password, $ban, $roleId){
    $bdd = bdd();

    $sql = "INSERT INTO users(login,email,password,ban,roleID) VALUES(?,?,?,?,?)";//requete

    $stmt = $bdd->prepare($sql);//preparation de la requete
    $stmt->execute([$login, $email, $password, $ban, $roleId]);//execution de la requete
}

function verifLogin($login){
    $bdd = bdd();
    
    $sql = $bdd-> prepare("SELECT COUNT(*) AS x from users where login like ?");
            //on execute la requete
    $sql -> execute(array($login));

            //fetch lit la ligne en cours
    $resultat = $sql ->fetch();
    return $resultat;
}

function verifEmail($email){
    $bdd = bdd();
    
    $sql = $bdd-> prepare("SELECT COUNT(*) AS x from users where email like ?");
            //on execute la requete
    $sql -> execute(array($email));

            //fetch lit la ligne en cours
    // while($resultat = $sql_login ->fetch()):
    $resultat = $sql ->fetch();
    return $resultat;

}

function verifUserPassword($login){
    $bdd = bdd();
    $sql = $bdd-> prepare("SELECT password,ban  from users where login like ?");
    $sql->execute([$login]);
    $resultat = $sql ->fetch();
    return $resultat;
}

function recupDonnesUser($login){
    $bdd = bdd();
    $sql = $bdd-> prepare("SELECT * from users where login like ?");
    $sql->execute([$login]);
    $resultat = $sql ->fetch();
    return $resultat;
}