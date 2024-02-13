<?php

include_once("../partials/header.php");
include_once("../partials/footer.php");
// include_once("../process/addPostProcess.php");
session_start();


require_once('../connexion/connexionDb.php');
$proliste = $db->query('SELECT * FROM profil');

$profils = $proliste->fetchALL();
// var_dump($profils);

if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    // var_dump($_SESSION['id']);
    $request = $db->query("SELECT * FROM profil WHERE id = $id");
    $user = $request->fetch();
    // var_dump($user);
    $postliste = $db->query("SELECT *, post.id FROM post 
    WHERE post.id_user_post = $id ORDER BY post.date DESC");
    $posts = $postliste->fetchAll();
    // var_dump($posts);
}
// $postId=$db->query('SELECT * FROM post');
// $post = $postId->fetch();
//     var_dump($post);





$comliste = $db->query('SELECT *, post.id FROM commentaire 
JOIN profil JOIN post ON commentaire.id_post = post.id  
AND commentaire.id_user_com = profil.id 
WHERE commentaire.id_post = post.id ORDER BY commentaire.id DESC');
$coms = $comliste->fetchAll();

// var_dump($posts);


?>


<section class="col-12">
    <div class="d-flex flex-column container rounded bg-add-user text-created-user">

        <div class="d-flex justify-content-around align-items-center ">
            <h2 class="tilte-card text-center title-add-user mt-2"> <?= $user['pseudo'] ?> PROFIL</h2>
            <a class="text-decoration-none text-dark title-add-user" href="../index.php">Se déconnecter</a>
        </div>
    </div>
    <div class="container d-flex justify-content-around rounded card-profil mt-1">
        <a class="text-decoration-none text-dark" href="../page/modifierprofil.php">
            <div class="m-1">
                <img src="<?= $user['picture'] ?>" alt="Image icone" height="140px" class="rounded-start-circle border border-black text-decoration-none rounded-end-circle">
                <h3 class="title-add-user text-center "><?= $user['pseudo'] ?></h3>
            </div>
        </a>
        <div class="mt-4">
            <a class="text-dark text-decoration-none" href="./profil.php">
                <h1 class="title-add-user text-decoration-none text-primary">PROFIL</h1>
            </a>
        </div>

        <div class="mt-4">
            <a class="text-dark text-decoration-none" href="./accueil.php">
                <h1 class="title-add-user text-decoration-none">ACCUEIL</h1>
            </a>
        </div>
       


    </div>
</section>
<section>

    <div class="container  mt-3">
        <div class="d-flex flex-column container rounded bg-add-user text-created-user text-decoration-none">
            <div class="d-flex justify-content-around align-items-center text-decoration-none ">
                <a class="text-decoration-none text-dark" href="./addPost.php">
                    <h2 class=" text-center text-dark text-decoration-none title-add-user mt-2">Add Post</h2>
                </a>

            </div>
        </div>
    </div>
</section>
<!-- --------------------------------------------PARTY 2 --------------------------------- -->

<?php foreach ($posts as $post) { ?>

    <section class="col-12">
        <div class="container card-profil pt-3 mt-3">

            <div class="">
                <div class=" d-flex justify-content-between mt-3 p-3 bg-white rounded ">
                    <div>
                        <p class="title-add-user"><?= $post['text'] ?></p>
                    </div>
                    <div>
                        <p><?= $post['date'] ?></p>
                    </div>
                </div>
                
                <div class="row">
                <div class="col-2"></div>

                <div class="text-centre col-8">
                    <img class="post border border-black border border-5 mt-3" src="<?= $post['picture_post'] ?>">
                </div>
                <div class="col-2"></div>
                </div>
            </div>



            <div>
                <h1 class="title-add-user">Tous les commentaires</h1>
                <?php foreach ($coms as $com) { ?>
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="mt-4 mb-4 bg-white rounded col-md-8 ">
                            <div class="row">
                                <div class="col-md-2">
                                    <img src="<?= $com['picture'] ?>" alt="Image icone" height="90px" class="rounded-start-circle border border-black rounded-end-circle">
                                    <h3 class="title-add-user text-center"><?= $com["pseudo"] ?></h3>
                                </div>
                                <div class="col-md-10 mt-5">
                                    <p class="mx-4"><?= $com["text_com"] ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                <?php } ?>

            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <form action="../process/addcomment.php" method="post">
                        <input type="hidden" name="id" value="<?= $user['id'] ?>">
                        <input type="hidden" name="postId" value="<?= $post['id'] ?>">

                        <label for="">commenter</label>
                        <input type="text" name="text_com" id="text_com" class="rounded pb-2 mb-5 w-75">

                        <button type="submit" class="text-card mt-1 rounded">ENVOYER</button>
                    </form>
                </div>
                <div class="col-md-2"></div>
            </div>
    </section>
<?php } ?>