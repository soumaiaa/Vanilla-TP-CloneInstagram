<?php
// --------------------------------------ADD POST----------------------

require_once('../connexion/connexionDb.php');

session_start();

if (
    isset($_POST['text']) && !empty($_POST['text']) &&
    isset($_FILES['image']) && !empty($_FILES['image'])&&
    isset($_POST['id'])&& !empty($_POST['id'])
) {
    // var_dump($_POST['text']);
    // var_dump($_FILES['image']);
   
    $id=$_POST['id'];
    $userid = $db->query('SELECT * FROM profil WHERE id='.$id);
    
    $user = $userid->fetch();
    // var_dump($user['id']);
   
    $name = basename($_FILES["image"]["name"]);
    $tmp_name = ($_FILES["image"]["tmp_name"]);

    $image = move_uploaded_file($tmp_name, "../image/imagePost/" . $name);
    $pathimage = "../image/imagePost/" . $name;
    $_SESSION['text'] = $_POST['text'];
    $_SESSION['image'] = $pathimage;
    // $_SESSION['id']=$id;
    
    $today = date('Y-m-d H:i:s'); 
    $postIns = "INSERT INTO post (text, picture_post, date, id_user_post ) VALUE (:text, :picture_post, :date, :id_user_post)";
    $createPost = $db->prepare($postIns);
    $createPost->execute(
        [
            'text' => $_SESSION['text'],
            'picture_post' => $pathimage,
            'date'=> $today,
            'id_user_post'=> $_POST['id'],

        ]
    ); 
    $_SESSION['postid']= $db->lastInsertId();
    header('Location: ../page/profil.php');
}