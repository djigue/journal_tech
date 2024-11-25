<?php
require_once 'config.php';

$conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);

if (!$conn) {
    die("Echec de la connexion à la base de données". mysqli_connect_error());
}