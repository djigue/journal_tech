<?php
include("connexion.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $delsql = "DELETE FROM articles WHERE id = $id";

    if (mysqli_query($conn, $delsql)) {
        echo "<script>alert('Article supprimé avec succès.');</script>";
        echo '<meta http-equiv="refresh" content ="0;url=index.php">';
    } else {
        echo "Erreur: " . mysqli_error($conn);
    }
}

    
