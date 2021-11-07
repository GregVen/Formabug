<?php
session_start();

require "../../src/common/dbFonction.php";

$_SESSION["login"]=$login=$_POST["login"];
$password=$_POST["password"];
// $_SESSION["login"]=$login=$_POST["login"];
// $_SESSION["password"]=$password=$_POST["password"];


getUserByLogin($login, $password);