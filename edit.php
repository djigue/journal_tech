<?php
include 'connexion.php';
include 'header.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM articles WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $article = mysqli_fetch_assoc($result);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $titre =  mysqli_real_escape_string($conn, $_POST['titre']);
        $contenu = mysqli_real_escape_string($conn, $_POST['contenu']);
        $auteur = mysqli_real_escape_string($conn, $_POST['auteur']);

        $editSql = "UPDATE articles SET titre='$titre', contenu='$contenu', auteur='$auteur' WHERE id=$id";

        if (mysqli_query($conn, $editSql)) {
            echo"<script>alert('Article mis à jour avec succès.');</script>";
            echo '<meta http-equiv="refresh" content ="0;url=index.php">';
        } else {
            echo "Erreur: " . mysqli_error($conn);
        }
    }
} else {
    echo "Aucun article sélectionné.";
}
?>

<div class="d-flex justify-content-center align-item-center bg-primary min-vh-100">
  <form method="post" class="needs-validation w-50 bg-secondary d-flex flex-column rounded gap-4" novalidate action="edit.php?id=<?php echo $article['id']; ?>">
   <div class="d-flex justify-content-center gap-3 mt-3">
    <h4 class="text-decoration-underline">Titre : </h4><input type="text" name="titre" class="w-50" value="<?php echo $article['titre']; ?>" ><br> 
    <div class="invalid-feedback">Veuillez entrer un Titre.</div>
   </div> 
   <div class="d-flex justify-content-center gap-2">
    <h4 class="text-decoration-underline">Contenu :</h4><br> <textarea  name="contenu" rows="30" cols="70"><?php echo $article['contenu']; ?></textarea><br>
    <div class="invalid-feedback">Veuillez entrer un contenu.</div>
   </div>
   <div class="d-flex justify-content-center gap-3">   
    <h4 class="text-decoration-underline">Auteur : </h4><input type="text" name="auteur" value="<?php echo $article['auteur']; ?>" ><br>
    <div class="invalid-feedback">Veuillez entrer un nom d'auteur.</div>
   </div>
   <div class="d-flex justify-content-center gap-2 mb-3">
    <button type="submit" class="w-25 rounded bg-primary">Mettre à jour</button>
   </div>
  </form>
</div>

<?php
include 'footer.php';
?>
