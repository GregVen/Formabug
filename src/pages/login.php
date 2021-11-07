<?php
$style="../../src/css/style.css";
session_start();
 include "../../src/common/template.php";

 ?>
 
 <form class="formulaire" action="../../src/common/connexion.php" method="post">
    <h2>Connectez-vous</h2>
    <div class="donnees">
        <div class="donneesbis">
            <label for="login">Login </label>
            <input type="text" name="login" placeholder="Votre login" required>
        </div>    
        <div class="donneesbis">
            <label for="password">Votre mot de passe</label>
            <input type="password"  name="password" placeholder="mot de passe" required>
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
} 
