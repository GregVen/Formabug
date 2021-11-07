 <?php 
session_start();
$style="../../src/css/style.css";
 include "../../src/common/template.php";

 ?>
 
 <form class="formulaire" action="../../src/common/register.php" method="post">
    <h2>Enregistrez-vous</h2>
    <div class="donnees">
        <div class="donneesbis">
            <label for="login">Login </label>
            <input type="text" name="login" placeholder="Votre login" value="<?php echo (isset($_SESSION["login"])) ? $_SESSION["login"] : "" ?>" required>
        </div>    
        <div class="donneesbis">
            <label for="email">Adresse Email</label>
            <input type="email" name="email" placeholder="name@example.com" value="<?php echo (isset($_SESSION["email"])) ? $_SESSION["email"] : "" ?>" required>
        </div>
        <div class="donneesbis">
            <label for="password">Votre mot de passe</label>
            <input type="password"  name="password" placeholder="mot de passe" value="<?php echo (isset($_SESSION["password"])) ? $_SESSION["password"] : "" ?>" required>
        </div>
        <div class="donneesbis">
            <label for="password2">Confirmez votre adresse mail</label>
            <input type="password" name="password2" placeholder="vérification du mot de passe" value="<?php echo (isset($_SESSION["password2"])) ? $_SESSION["password2"] : "" ?>" required>
        </div>
        <div class="center">
            <button type="submit" title="Valider">Valider</button>
        </div>
    </div>
</form>

<?php

include "../common/footer.php";

    if(isset($_GET["error"]) && $_GET["error"] == true){
        
        // if($_GET["message"] == "mots de passe différents"){
?>

<div class="erreur">
    <h4 style="color:red"><?php echo $_GET["message"] ?></h4>    
</div>

<?php 


    
        // } 
} elseif (isset($_GET["error"]) && $_GET["error"] == false){
    ?>

    <div class="erreur">
        <h4 style="color:red"><?php echo $_GET["message"] ?></h4>    
    </div>
    
    <?php 

}
$_SESSION["login"] = null;
$_SESSION["email"] = null;
$_SESSION["password"] = null;
$_SESSION["password2"] = null;
