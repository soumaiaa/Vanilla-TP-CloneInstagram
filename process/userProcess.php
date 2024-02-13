<?php
// --------------------------------------ADD USER----------------------

require_once('../connexion/connexionDb.php');

session_start();

if (
    isset($_POST['pseudo']) && !empty($_POST['pseudo']) &&
    isset($_FILES['picture']) && !empty($_FILES['picture'])
) {
    $_SESSION['pseudo'] = $_POST['pseudo'];
    
    $findUser = $db->prepare('SELECT * FROM  profil WHERE pseudo = :pseudo');
    $findUser->execute([
       ':pseudo' => $_SESSION['pseudo']
    ]);
    $existingUser = $findUser->fetch();
    
    var_dump($existingUser);
   
    if($existingUser) {

       echo'le pseudo existe';
        // <script language="Javascript">
        // alert ("votre pseudo existe, Merci de changer")
        // </script>
     
       header("Location: ../index.php");
    }else{
    
        $name = basename($_FILES["picture"]["name"]);
        $tmp_name = ($_FILES["picture"]["tmp_name"]);

        $image = move_uploaded_file($tmp_name, "../img/" . $name);
        $pathimage = "../img/" . $name;

        $_SESSION['pseudo'] = $_POST['pseudo'];
        $_SESSION['picture'] = $pathimage;
        // var_dump($_SESSION['picture']);
        // var_dump($_SESSION['pseudo']);
        // die(); 
        $sqlInsert = "INSERT INTO profil (pseudo, picture ) VALUE (:pseudo, :picture)";
        $createUser = $db->prepare($sqlInsert);
        $createUser->execute(
            [
                'pseudo' => $_POST['pseudo'],
                'picture' => $pathimage,
            ]
        );
   
    $_SESSION['id'] = $db->lastInsertId();
    

    header('Location: ../page/profil.php');
    }
}else{
        header('Location: ../page/addUser.php');
    }
    


