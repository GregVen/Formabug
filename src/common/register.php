<?php
session_start();
$style="../../src/css/style.css";

require "../../src/common/dbFonction.php";

$_SESSION["login"]=$login=$_POST["login"];
$_SESSION["email"]=$email=$_POST["email"];
$_SESSION["password"]=$password=$_POST["password"];
$_SESSION["password2"]=$password2=$_POST["password2"];
$roleId=1;
$ban = rand();



createuser($login, $email, $password, $password2, $ban, $roleId);

