<?php
$servername = "localhost";
$username = "username";
$password = "password";
$base = "basedados";
try {
    $pdo = new PDO("mysql:host=$servername;dbname=$base", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo ("Conectado");
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
    echo ("Não conectado");
}
?>
