<?php

include_once("../partials/header.php");
include_once("../partials/footer.php");


session_start();


if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
// var_dump($id);
    

require_once("../connexion/connexionDb.php");
$request = $db->query("SELECT * FROM profil WHERE id = $id");
$user = $request->fetch();
// var_dump($user);
// var_dump($_SESSION['id']);
// die();
 }

?>
<section>
   
    <div class="container col-md-8  mt-3">
        <div class="d-flex flex-column container rounded bg-add-user text-created-user">
            <div class="d-flex justify-content-around align-items-center ">
                <h2 class="tilte-card text-center title-add-user mt-2">Add Post</h2>
                <a class="text-decoration-none text-dark" href="../page/addUser.php">Se déconnecter</a>
            </div>
            <form action="../process/addPostProcess.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $user['id'] ?>">
                <div class="row">
                    <div class="d-flex flex-column mt-2 col-6 ">
                        <label class="text-start">Ajouter votre discription</label>
                        <input type="text" name="text" id="text" class="rounded">
                    </div>

                    <div class="d-flex flex-column mt-2 mb-3 col-6">
                        <label for="imageInput">IMPOTRER IMAGE</label>
                        <input type="file" id="imageInput" name="image">

                    </div>
                    <div class="mb-4">

                        <input type="button" value="EFFACER" onclick="deleteImage()" class="text-card rounded mt-2">
                        <!-- ajouter une condition si les deux champ ne son pas remplies -->
                        <button type="submit"  class="text-card mt-1 rounded ">Poster</button>
                    </div>
            </form>
        </div>
    </div>
    
</section>