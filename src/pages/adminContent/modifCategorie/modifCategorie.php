<?php 
session_start();

if(!empty($_GET['id'])){
    $_SESSION["category_id"]=$id_role=$_GET["id"];
    }
    
    require "../../../common/dbCategorieFonctions.php";
    
    if(isset($_GET["id"])){    
        $resultat = viewUpDateCategorie($_GET["id"]);
        $typeProduct = $resultat->typeProduct;
    }


$style = "../../../../src/css/style.css";

?>
    <link rel="stylesheet" href="<?= $style ?>">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

<header>
    <div class="header1">
        <a href="../.."><img src="../../../../src/img/logo.png" alt="logo"></a>
        <p>E-Shopping</p>
    </div>
    <div class="header2">
        <div class="headerdiv">

        <?php if (empty($_SESSION["connecté"])){ ?>
            <a href="../../src/pages/register.php"><i class="fas fa-user-plus"></i> S'inscrire</a>
            <a href="../../src/pages/login.php"><i class="fas fa-user-lock"></i> Se connecter</a>
        <?php 
            } 
            if(!empty($_SESSION["connecté"]) && ($_SESSION["login"])=="admin") { 
        ?>
            <a href="../../src/pages/admin.php"><i class="fas fa-user"></i> Bonjour, <?php echo $_SESSION["login"];?></a>
            <a href="../../src/common/logoff.php"><i class="fas fa-user-slash"></i> Se déconnecter</a>
        <?php 
            } 
            if (!empty($_SESSION["connecté"]) && ($_SESSION["login"])!="admin"){
        ?>
            <a href="../../src/pages/donneesUser.php"><i class="fas fa-user"></i> Bonjour, <?php echo $_SESSION["login"];?></a>
            <a href="../../src/common/logoff.php"><i class="fas fa-user-slash"></i> Se déconnecter</a>
        <?php 
            } 
        ?>
            <a href="#"><i class="fas fa-shopping-cart"></i>Panier</a>
        </div>
    </div>
</header>

 
<form action="./modifCatScript.php" method="post">

    <div class="text-center mt-3">
        <h2>Modification d'une catégorie</h2>
    </div>
    <div class="container">
        <div class="row">
            <div class=" col input-group mb-3">
                <label class="input-group-text"  id="basic-addon3">Catégorie à modifier</label>
                <input type="text" class="form-control" aria-describedby="basic-addon3" name="categorie" placeholder="Catégorie" value="<?php if(!empty($typeProduct)){echo $typeProduct;}else{echo "";} ?>" required>
            </div>
            <div class=" col input-group mb-3">
                <button class="btn btn-secondary" type="submit" title="Valider" >Valider</button>
            </div>
        </div>
    </div>

</form>


<?php

include "../../../common/footer.php";

?>