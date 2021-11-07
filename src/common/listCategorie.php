<?php

function recupListeCategories(){

    $bdd = bdd();
    $sql = "SELECT * FROM category";//requete

    $stmt = $bdd->prepare($sql);//preparation de la requete
    $stmt->execute();//execution de la requete

    // $result = $stmt->fetchAll(PDO::FETCH_ASSOC); asso
    $result = $stmt->fetchAll(PDO::FETCH_OBJ); //objet
    return $result;
}

?>


<ul class="list-group list-group-flush listeCategorie">
        <a href=""><li class="list-group-item list-group-item-danger">Tous les produits</li></a>
    <?php foreach(recupListeCategories() as $value): ?>
        <a href="#"><li class="list-group-item"><?php echo $value->typeProduct ?></li></a>
    <?php endforeach ?>
</ul>

