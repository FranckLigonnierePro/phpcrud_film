<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$dsn = "mysql:host = localhost;dbname = cinema;";
$username = "root";
$password = "Arinfo/2021";
$option = [];
$connection = new PDO(
    $dsn,
    $username,
    $password,
    $option
);
try {
    print "Connexion réussie";
} catch (PDOException $e) {
    echo $e->getMessage();
    die();
}
