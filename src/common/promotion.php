<?php
function bdd(){   
    $bdd = new PDO("mysql:host=localhost;dbname=emagasin", "root","");//connexion db
    return $bdd;
}

function alaune(){
    $bdd = bdd();
    $sql = $bdd-> prepare("SELECT * from fichetechnique 
    inner join product
    on fichetechnique.productId = product.productIdINT
    inner join category
    on product.categoryID = category.categoryId where onTop = 1 ");

    $sql->execute();
    $resultat = $sql ->fetchAll();
    return $resultat;
}


try{
        
    $result = alaune();

} catch (PDOException $e){
    echo $e->getMessage();
    echo $e->getLine();
    exit();
}

?>

<div class="container pt-5">
    <div class="row justify-content-center">
        <h2>En promotion cette semaine</h2>

        <?php foreach ($result as $value): ?>
        <div class="col">
            <div class="card" style="width: 15rem; height: 15rem">
                <div class="card-body" style="background: url(<?php echo $value['imgUrl'];?>) no-repeat"> 
                    <div class="d-flex justify-content-center">
                        <div class="textepromo">
                            <p class="categorie"><?php echo $value['typeProduct'];?></p>
                            <p class="description"><?php echo $value['description'];?></p>
                            <p class="prix"><?php echo $value['prix'];?> €</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <?php  endforeach ?>
            
    </div>
</div>
