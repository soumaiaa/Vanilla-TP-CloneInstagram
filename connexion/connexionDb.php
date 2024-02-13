<?php
try {
$dsn ="mysql:local=localhost;dbname=chiligram";
$user = 'root';
$password = '';

$db = NEW PDO($dsn,$user,$password);
//  echo '$db  check ok';

} catch (Exception $message) {
    echo 'error'.$message;
}


?>
