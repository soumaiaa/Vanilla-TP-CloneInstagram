<?php
// --------------------------------------CHECK USER----------------------

require_once('../connexion/connexionDb.php');

session_start();
$_SESSION['pseudo'] = $_POST['pseudo'];
// var_dump($_SESSION['pseudo'] );
if (isset($_POST['pseudo']) && !empty($_POST['pseudo'])) {
$findUser = $db->prepare('SELECT * FROM  profil WHERE pseudo = :pseudo');
$findUser->execute([
   ':pseudo' => $_SESSION['pseudo']
]);
$existingUser = $findUser->fetch();

var_dump($existingUser);
if($existingUser) {
   
    // var_dump($existingUser['pseudo']);
    $_SESSION['id']=$existingUser['id'];

    header("Location: ../page/profil.php");
} else {
    header("Location: ../page/addUser.php");
   
}

}


