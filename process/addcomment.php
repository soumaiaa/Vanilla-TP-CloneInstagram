<?php
// --------------------------------------ADD COMMENT----------------------

require_once('../connexion/connexionDb.php');

session_start();

if (
    isset($_POST['text_com']) && !empty($_POST['text_com']) &&
    isset($_POST['id']) && !empty($_POST['id'])&&
    isset($_POST['postId'])&& !empty($_POST['postId'])
) {
    var_dump($_POST['text_com']);
    var_dump($_POST['postId']);
    var_dump($_POST['id']);
    
//    $id=$_POST['id'];
//     $userid = $db->query('SELECT * FROM profil WHERE id='.$id);
    
//     $user = $userid->fetch();
//     var_dump($user['id']);
    
   
   
    $comm = "INSERT INTO commentaire (text_com, id_user_com, id_post) VALUE (:text_com, :id_user_com, :id_post)";
    $createCom = $db->prepare($comm);
    $createCom->execute(
        [
            'text_com' => $_POST['text_com'],
            'id_user_com' => $_POST['id'],
            'id_post'=> $_POST['postId']

        ]
    ); 
    
    header('Location: ../page/profil.php');
}