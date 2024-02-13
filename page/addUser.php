<?php
require_once("../connexion/connexionDb.php");
include_once("../partials/header.php");
include_once("../partials/footer.php");


?>

<section>
    <div class="col-0 col-md-4">

    </div>
    <div class="container col-8 col-md-4 mt-3">
        <div class="d-flex flex-column container rounded bg-add-user text-created-user">
            <h2 class="tilte-card text-center title-add-user mt-2">CREATED USER</h2>

            <form action="../process/userProcess.php" method="post" enctype="multipart/form-data">
                <div class="d-flex flex-column mt-2 ">
                    <label for="pseudo" class="text-start" >PSEUDO</label>
                    <input type="text" name="pseudo" id="addpseudo" class="rounded" required>
                </div>

                <div class="d-flex flex-column mt-2 mb-3">
                    <label for="imageInput" >SELECT IMAGE</label>
                    <input type="file" id="imageInput" name="picture">

                    <input type="button" value="EFFACER" onclick="deleteImage()" class="text-card rounded mt-2">
                   <!-- ajouter une condition si les deux champ ne son pas remplies -->
                  
                    <button type="submit" class="text-card mt-1 rounded" id="submitButton" required>ENVOYER</button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-0 col-md-4"></div>
</section>