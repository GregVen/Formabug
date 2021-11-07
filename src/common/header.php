<header>
    <div class="header1">
        <a href="../.."><img src="../../src/img/logo.png" alt="logo"></a>
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