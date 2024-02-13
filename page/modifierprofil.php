<?php

include_once("../partials/header.php");
include_once("../partials/footer.php");

session_start();


require_once('../connexion/connexionDb.php');
$proliste = $db->query('SELECT * FROM profil');

$profils = $proliste->fetchALL();
// var_dump($profils);

if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];

    $request = $db->query("SELECT * FROM profil WHERE id = $id");
    $user = $request->fetch();
    // var_dump($user);
    $postliste = $db->query('SELECT *, post.id FROM post
    WHERE post.id_user_post =' . $id);
    $posts = $postliste->fetchAll();
    // var_dump($posts);
}
?>
<section class="col-12">
    <div class="d-flex flex-column container  bg-add-user text-created-user">

        <div class="d-flex justify-content-around align-items-center ">
            <h2 class="tilte-card text-center title-add-user mt-2"> <?= $_SESSION['pseudo'] ?> PROFIL</h2>
            <a class="text-decoration-none text-dark title-add-user" href="../index.php">Se déconnecter</a>
        </div>
    </div>
    <div class="container rounded card-profil mt-1">
        <div class="d-flex justify-content-around">
        <div class="mt-4">
                <a class="text-dark text-decoration-none" href="./profil.php">
                    <h1 class="title-add-user">PROFIL</h1>
                </a>
            </div>
            <div class="mt-4">
                <a class="text-dark text-decoration-none" href="./accueil.php">
                    <h1 class="title-add-user">ACCUEIL</h1>
                </a>
            </div>
           
        </div>
    </div>
    <div class=" container rounded card-profil mt-1">
        <div class="row">

            <div class="m-1 mt-5 col-4">
                <img src="<?= $user['picture'] ?>" alt="Image icone" height="140px" class="">
                <h3 class="title-add-user text-center text-dark text-decoration-non"><?= $user['pseudo'] ?></h3>
            </div>

            <div class="col-8 mt-3">
                <div class="d-flex flex-column rounded bg-add-user text-created-user">
                    <h2 class="tilte-card text-center title-add-user mt-2">MODIFIER PHOTO DE PROFIL</h2>

                    <form action="../process/modifierprofil.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $user['id'] ?>">
                        <div class="d-flex flex-column mt-2 mb-3">
                            <label for="imageInput">SELECT IMAGE</label>

                            <input type="file" id="imageInput" name="picture">

                            <input type="button" value="EFFACER" onclick="deleteImage()" class="text-card rounded mt-2">
                            <button type="submit" class="text-card mt-1 rounded" id="submitButton" required>Modifier</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>



</section>