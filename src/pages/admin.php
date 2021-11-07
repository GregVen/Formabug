<?php
$style="../../src/css/style.css";
session_start();
if ($_SESSION["roleId"] != 0){
    header("location: ../");
}
 include "../../src/common/template.php";
 include "../../src/pages/adminContent/menuAdmin.php";
 ?>
 <div class="taillefenetre">
                    
 <?php
    if(!empty($_GET['page'])){
    include '../../src/pages/adminContent/'.$_GET['page'].'.php';
    }


?>
</div>

<?php
include "../../src/common/footer.php";