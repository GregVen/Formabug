<?php
$style="../../src/css/style.css";
session_start();
 include "../../src/common/template.php";



    echo '<p> login:'.$_SESSION["login"].'</p>';
    echo '<p> email:'.$_SESSION["email"].'</p>';
    echo '<p> roleId:'.$_SESSION["roleId"].'</p>';

 ?>