<?php
include("connexion.php");
include("header.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titre =  mysqli_real_escape_string($conn, $_POST['titre']);
        $contenu = mysqli_real_escape_string($conn, $_POST['contenu']);
        $auteur = mysqli_real_escape_string($conn, $_POST['auteur']);


$addsql = "INSERT INTO articles (titre, contenu, auteur) VALUES ('$titre','$contenu','$auteur')";

if (mysqli_query($conn, $addsql)) {
    echo"<script>alert('Article ajouté avec succes.');</script>";
    echo '<meta http-equiv="refresh" content ="0;url=index.php">';
} else {    
    echo "Erreur :<br>".mysqli_error($conn);
}
}
?>
<div class="d-flex justify-content-center align-item-center bg-primary min-vh-100">
  <form action="add.php" method="post" class="needs-validation w-50 bg-secondary d-flex flex-column rounded gap-4" novalidate>
    <div class="d-flex justify-content-center gap-3 mt-3">
    <h4 class="text-decoration-underline">Titre : </h4><input type="text" name="titre" required> <br>
    <div class="invalid-feedback">Veuillez entrer un Titre.</div>
    </div>
    <div class="d-flex justify-content-center gap-2">
    <h4 class="text-decoration-underline">Contenu : </h4><br> <textarea name="contenu" rows="30" cols="70" required></textarea> <br>
    <div class="invalid-feedback">Veuillez entrer un contenu.</div>
    </div>
    <div class="d-flex justify-content-center gap-2">
    <h4 class="text-decoration-underline">Auteur : </h4><input type="text" name="auteur" required> <br>
    <div class="invalid-feedback">Veuillez entrer un nom d'auteur.</div>
    </div>
    <div class="d-flex justify-content-center gap-3 mb-3">
    <button type="submit" class="w-25 rounded bg-primary">Publier</button>
    </div>
  </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const form = document.querySelectorAll('.needs-validation');
        Array.from(form).forEach(form => {
            form.addEventListener('submit', e=> {
                if (!form.checkValidity()){
                    e.preventDefault();
                    e.stopPropagation();
                }
                form.classList.add('was-validated');
            });
        });
    });
</script>
<?php
include("footer.php");