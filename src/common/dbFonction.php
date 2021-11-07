<?php 
// session_start();

require "../../src/common/dbAccess.php";

function createuser($login, $email, $password, $password2, $ban, $roleId){
    try {
        // if (isset($_POST["login"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["password2"])){
        if (isset($login) && isset($email) && isset($password) && isset($password2)){
            $donnees = array(
                'login'     => FILTER_SANITIZE_STRING,
                'email'     => FILTER_SANITIZE_EMAIL,
                'password'  => FILTER_SANITIZE_STRING,
                'password2'  => FILTER_SANITIZE_STRING
            );
        
            $result = filter_input_array(INPUT_POST, $donnees);
            
            $login = $result['login'];
            $email = $result['email'];
            $password = $result['password'];
            $password2 = $result['password2'];

            $resultat_login = verifLogin($login);
            $resultat_email = verifEmail($email);

            if ($resultat_login["x"] != 0 || $resultat_email["x"] != 0){
                // $_SESSION["login"]=null;
                header("location: ../../src/pages/register.php?error=true&message=login et/ou email deja existant");
                exit;
            }


            // if ($_POST["password"] != $_POST["password2"]){
            if ($password != $password2){
                header("location: ../../src/pages/register.php?error=true&message=mots de passe différents");
                exit;
            } 
            else {
                $motdepasse = crypt($password,$ban);
                insert($login, $email, $motdepasse, $ban, $roleId);
                $_SESSION["login"] = null;
                $_SESSION["email"] = null;
                $_SESSION["password"] = null;
                $_SESSION["password2"] = null;
                header("location: ../../src/pages/login.php?error=false&message=Enregistrement réussi, vous pouvez vous connecter");
            } 
        }
    }catch (PDOException $e){
        echo $e->getMessage();
        echo $e->getLine();
        exit();
    }
}

function getUserByLogin($login,$password ){
    try{
        if (isset($login) && isset($password)){
            $donnees = array(
                'login'     => FILTER_SANITIZE_STRING,
                'password'  => FILTER_SANITIZE_STRING
            );
            $result = filter_input_array(INPUT_POST, $donnees);

            $login = $result['login'];
            $password = $result['password'];

            $mdp=verifUserPassword($login);
            $ban_recupere=$mdp['ban'];
            $motdepasse_recupere=$mdp['password'];

            $motdepasse = crypt($password,$ban_recupere);

            if($motdepasse != $motdepasse_recupere){
                header("location: ../../src/pages/login.php?error=true&message=mauvais login et/ou mot de passe");
                exit;
            } else {
            // else {
            //     $_SESSION['postmessage']="mdp correspondant et bon";
            // }

            // $_SESSION['motdepasse2']=$motdepasse;

            // $_SESSION['motdepasse_recupere']=$motdepasse_recupere;
            // $_SESSION['ban_recupere']=$ban_recupere;

            // $_SESSION['login']=$login = $result['login'];
            // $_SESSION['password']=$password = $result['password'];

            // header("location: ../../src/pages/register.php?error=true&message=login et/ou email deja existant");
            $recupDonnesUser=recupDonnesUser($login);

            $_SESSION["login"] = $recupDonnesUser['login'];
            $_SESSION["email"] = $recupDonnesUser['email'];
            $_SESSION["roleId"] = $recupDonnesUser['roleId'];
            
            $_SESSION["connecté"] = 1;

            header("location: ../../index.php");
            exit;
            }
           
        }
    } catch (PDOException $e){
        echo $e->getMessage();
        echo $e->getLine();
        exit();
    }
}