<?php
// --------------------------------------MODIFIER USER----------------------

require_once('../connexion/connexionDb.php');

session_start();


if (

    isset($_FILES['picture']) && !empty($_FILES['picture'])&&
    isset($_POST['id']) && !empty($_POST['id'])
) {
    $id=$_POST['id'];
    $userid = $db->query('SELECT * FROM profil WHERE id='.$id);
    
    $user = $userid->fetch();
    // var_dump($user['pseudo']);
  
    $name = basename($_FILES["picture"]["name"]);
        $tmp_name = ($_FILES["picture"]["tmp_name"]);

        $image = move_uploaded_file($tmp_name, "../img/" . $name);
        $pathimage = "../img/" . $name;
        // var_dump( $pathimage);
        // var_dump($_POST['id']);
        
        $modifier = $db->prepare('UPDATE profil SET pseudo=?,picture=? WHERE id =?');
        $user =  $modifier->execute([
            $user['pseudo'],
            $pathimage,
            $_POST['id']
        ]);
        // var_dump($pathimage);
        // die();
        header('Location: ../page/profil.php');
    }