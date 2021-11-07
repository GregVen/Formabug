<?php
require "../common/dbProduitsFonctions.php";

    try{
        
        $result = recupListeProduits();
    
    } catch (PDOException $e){
        echo $e->getMessage();
        echo $e->getLine();
        exit();
    }

?>

<section>
    <div class="container mt-5">
        <table class="table table-striped">
            <tr>
                <th>Nom</th>
                <th>Description</th>
                <th>Prix</th>
                <th>On Top</th>
                <th></th>     
                <th></th>

            </tr>

            <?php foreach ($result as $value): ?>
                <tr>         
                    <td> <?php echo $value->productName ;?> </td>
                    <td> <?php echo $value->description;?></td>
                    <td> <?php echo $value->prix;?></td>
                    <td> <?php echo $value->onTop;?></td>
                    <td><a class="btn btn-primary" href="<?php echo "./adminContent/modifProduit.php?id=".$value->productIdINT ?>" title="Editer"> Modifier </a></td>
                    <td><a class="btn btn-danger" href="<?php echo "./adminContent/deleteProduit.php?id=".$value->productIdINT ?>" title="Supprimer"> Supprimer</a></td>
                </tr>
            <?php endforeach ?>
        </table>
        
    </div>
</section>