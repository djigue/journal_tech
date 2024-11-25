<?php
include("connexion.php");
include ("header.php");

$sql = "select * from articles";
$result = mysqli_query ($conn,$sql);

if( mysqli_num_rows($result)> 0){
    echo '<div class="container mt-5">';
    echo '<div class="row">';
    while ($row = mysqli_fetch_assoc($result)){
     echo '<div class="d-flex flex-column align-items-center w-100 mb-4">
            <div class="card w-100 ">
                <div class="card-body shadow-lg">
                    <h3 class="card-title text-decoration-underline text-center">' . htmlspecialchars($row["titre"]) . '</h3>
                    <p class="card-text">' . htmlspecialchars($row["contenu"]) . '</p>
                    <p class="text-muted">Publié le : ' . htmlspecialchars($row["date"]) . ' par ' . htmlspecialchars($row["auteur"]) . '</p>
                    <div class=" d-flex justify-content-center gap-3">
                      <a href="edit.php?id=' . $row['id'] . '" class="btn btn-primary btn-sm">Modifier</a>
                      <a href="delete.php?id=' . $row['id'] . '" class="btn btn-danger btn-sm">Supprimer</a>
                    </div>
                </div>
            </div>
           </div>';
    }
    echo '</div>';
    echo '</div>';
}else {
    echo "pas d'aricles trouvés";
}
include ("footer.php");
