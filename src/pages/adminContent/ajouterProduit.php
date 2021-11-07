<?php 

require "../common/dbCategorieFonctions.php";

?>


<form action="./adminContent/modifProduit/insertProduit.php" method="post" enctype="multipart/form-data">
    <div class=" container text-center mt-3">
        <div class="row">
            <div class="col">
                <h2>Nouveau Produit</h2>
            </div>
            <div class=" col input-group mb-3">
                <label class="input-group-text" id="basic-addon3">Prix</label>
                <input type="number" step="0.01" min="0" class="form-control text-danger" aria-describedby="basic-addon3" name="prix" placeholder="PRIX" required>
                <span class="input-group-text">€</span>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-evenly">
            <div class="col-5">
                <div class="row justify-content-evenly">
                    <div class=" col input-group mb-3">
                        <label class="input-group-text"  id="basic-addon3">Nom du Produit</label>
                        <input type="text" class="form-control" aria-describedby="basic-addon3" name="productName" placeholder="Nom du Produit" required>
                    </div>
                    <div class=" col input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">Mettre "On Top" ?</label>
                        <select class="custom-select" id="inputGroupSelect01"  name="onTop" required>
                            <option value="0">NON</option>
                            <option value="1">OUI</option>
                        </select>
                    </div>
                    
                </div>

                <div class="input-group mb-3"> 
                    <label class="input-group-text" for="inputGroupSelect01">Catégorie</label>
                    <select class="form-select" id="inputGroupSelect01" name="categoryID" required>
                        <option selected>Choisir la catégorie...</option>
                    <?php foreach(recupListeCategories() as $value): ?>
                        <option value="<?php echo $value->categoryId ?>"><?php echo $value->typeProduct ?></option>
                    <?php endforeach ?>
                    </select>
                </div>

                <div  class="mb-3">
                    <h6>UPLOADER un fichier</h6>
                    <input type="hidden" name="MAX_FILE_SIZE" value="1000000000">
                    <input class="form-control" type="file" id="formFile" name="fichier" required>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text">Description</span>
                    <textarea class="form-control" aria-label="With textarea" placeholder="Description" rows="5" name="description" required></textarea>
                </div>

            </div>
            <div class="col-5">
                <div>
                    <h5>Caractéristiques Techniques</h5>
                </div>  
                <div class="row justify-content-evenly">  
                    <div class=" col input-group mb-3">
                        <label class="input-group-text" id="basic-addon3">Taille Memoire</label>
                        <input type="text"  class="form-control" aria-describedby="basic-addon3" name="tailleMemoire" placeholder="En Go">
                    </div>
                    <div class="col input-group mb-3">
                        <label class="input-group-text" id="basic-addon3"> Processeur</label>
                        <input type="text"  class="form-control" aria-describedby="basic-addon3" name="processeur" placeholder="Processeur">
                    </div>
                    
                </div>
                <div class="input-group mb-3">
                    <label class="input-group-text" id="basic-addon3">Fabriquant du Processeur</label>
                    <input type="text"  class="form-control" aria-describedby="basic-addon3" name="processeurFab" placeholder="Fabriquant du Processeur">
                </div>
                <div class="input-group mb-3">
                    <label class="input-group-text" id="basic-addon3">Carte Graphique</label>
                    <input type="text"  class="form-control" aria-describedby="basic-addon3" name="carteGraphique" placeholder="Carte Graphique">
                </div>

                <div class="row justify-content-evenly">
                    <div class=" col input-group mb-3">
                        <label class="input-group-text" id="basic-addon3">Taille d'Ecran</label>
                        <input type="text"  class="form-control" aria-describedby="basic-addon3" name="tailleEcran" placeholder="Taille d'Ecran">
                    </div>
                    <div class=" col input-group mb-3">
                        <label class="input-group-text" id="basic-addon3">Résolution</label>
                        <input type="text"  class="form-control" aria-describedby="basic-addon3" name="resolutionEcran" placeholder="Résolution">
                    </div>
                </div>
                <div class="row justify-content-evenly" >  
                    <div class=" col input-group mb-3">
                        <label class="input-group-text" id="basic-addon3">Type de disque</label>
                        <input type="text"  class="form-control" aria-describedby="basic-addon3" name="typeHDD" placeholder="Type de disque">
                    </div>
                    <div class="col input-group mb-3">
                        <label class="input-group-text" id="basic-addon3">Taille du Disque</label>
                        <input type="text"  class="form-control" aria-describedby="basic-addon3" name="tailleHDD" placeholder="En Go">
                    </div>
                </div>
                <div class="row justify-content-evenly">
                    <div class="col input-group mb-3">
                        <label class="input-group-text" id="basic-addon3">Poids</label>
                        <input type="text"  class="form-control" aria-describedby="basic-addon3" name="poids" placeholder="En Kg">
                    </div>
                    <div class="col input-group mb-3">
                        <label class="input-group-text" id="basic-addon3">OS</label>
                        <input type="text"  class="form-control" aria-describedby="basic-addon3" name="OS" placeholder="OS">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center mt-3">
        <button type="submit" class="btn btn-secondary btn-lg btn-block" title="Valider">Valider</button>
    </div>
    
</form>
