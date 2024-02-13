<?php
require_once("./connexion/connexionDb.php");


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chiligram</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="./style/style.css">

</head>
<body>
    
</body>
</html>
<section>
    <div class="col-0 col-md-4"></div>
    <div class="container d-flex justify-content-center mt-3 p-3 ">
        <div class="d-flex flex-column col-8 col-md-4 border rounded container bg-card">
            <div class="d-flex justify-content-center align-items-center flex-column ">
                <div class="mt-3">
                    <img src="./image/icone-user.gif" alt="icone annimate user" height="70px" class="img">
                </div>
                <div class="mt-3 ">
                    <h2 class="title-card">Chiligram</h2>
                </div>
            </div>

            <form action="./process/ckeckUser.php" method="post">
                <div class="d-flex justify-content-center flex-column">
                    <label for="pseudo" class="mb-2 mt-2 text-card">PSEUDO</label>
                    <input type="text" name="pseudo" class="rounded">

                    <a href="./page/addUser.php" class="border mt-4 btn btn-white"> ADD ACCOUNT</a>
                    <button type="submit" class="mt-4 mb-4 rounded text-card">GO</button>
                </div>
            </form>

        </div>
    </div>
    <div class="col-0 col-md-4"></div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="/PHP/PHP-PDO/chiligrame/js/main.js"></script>
</body>

</html>
