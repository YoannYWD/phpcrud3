<?php
require "./db.php";
$message = "";
if (
    isset($_POST["titre"]) &&
    isset($_POST["annee"]) &&
    isset($_POST["image"])
) {
    $titre = $_POST["titre"];
    $annee = $_POST["annee"];
    $image = $_POST["image"];
    $sql = "INSERT INTO film (titre, annee, image) VALUES (:titre, :annee, :image)"; // requête préparée
    $statement = $connection->prepare($sql);
    if ($statement->execute(
            [
                ":titre" => $titre,
                ":annee" => $annee,
                ":image" => $image
            ]
        )
    ) {
        $message = "<p class=\"text-center mb-0\">Film ajouté 😎</p>";
    };
}
?>

<?php
include "./head.php";
?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="m-5 text-center">AJOUTER UN FILM</h1>
        </div>
    </div>
</div>

<div class="container mb-5">
    <div class="row rowItem p-5">
        <div class="col-10 offset-1">
            
            <?php if(!empty($message)): ?>
                <div class="alert alert-light text-center" role="alert">
                    <?= $message; ?>
                </div>
            <?php endif;?>     

            <form method="post">
                <div class="mb-3">
                    <label>Titre</label>
                    <input name="titre" type="text" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Date de sortie</label>
                    <input name="annee" type="date" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Affiche</label>
                    <input name="image" type="form" class="form-control">
                </div>

                <button type="submit" class="btn btn-light">Ajouter</button>
            </form>
        </div>
    </div>
</div>

<?php
include "./footer.php";
?>