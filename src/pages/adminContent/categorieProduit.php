<?php
require "../common/dbCategorieFonctions.php";

    try{
        
        $result = recupListeCategories();
    
    } catch (PDOException $e){
        echo $e->getMessage();
        echo $e->getLine();
        exit();
    }

?>

<section>
    <div class="container mt-5">
        <table id="tableEmployes" class="table table-striped">
            <tr>
                <th>ID</th>
                <th>CATEGORIES</th>
                <th></th>
                <th></th>
            </tr>

            <?php foreach ($result as $value): ?>
                <tr>         
                    <td> <?php echo $value->categoryId ;?> </td>
                    <td> <?php echo $value->typeProduct;?></td>
                    <td><a class="btn btn-primary" href="<?php echo "./adminContent/modifCategorie/modifCategorie.php?id=".$value->categoryId ?>" title="Editer"> Modifier </a></td>
                    <td><a class="btn btn-danger" href="<?php echo "./adminContent/modifCategorie/deleteCategorie.php?id=".$value->categoryId ?>" title="Supprimer"> Supprimer</a></td>
                </tr>
            <?php endforeach ?>
        </table>

        <form action="./adminContent/modifCategorie/ajoutCategorie.php" method="post">
            <div class="text-center mt-3">
                <h2>Ajout d'une catégorie</h2>
            </div>

            <div class="row justify-content-evenly">
                <div class=" col input-group mb-3">
                    <label class="input-group-text"  id="basic-addon3">Nouvelle Catégorie</label>
                    <input type="text" class="form-control" aria-describedby="basic-addon3" name="categorie" placeholder="Catégorie" required>
                </div>
                <div class=" col input-group mb-3">
                    <button class="btn btn-secondary" type="submit" title="Valider" >Valider</button>
                </div>
            </div>

        </form>
        
    </div>
</section>