 <?php 
 $style = "./src/css/style.css";
session_start();
 include "./src/common/template.php";

 include "./src/common/promotion.php";
 ?>
<div class="container">
    <div class="row">
    <h2> Nos Nouveautés ...</h2>
        <div class="col-2">
            <?php
            include "./src/common/listCategorie.php";
            ?>
        </div>
        <div class="col-1"></div>
        <div class="col-9">
            <?php
            include "./src/common/derniersArticles.php";
            ?>
        </div>
    </div>
 </div>

 <?php 
 include "./src/common/footer.php";

