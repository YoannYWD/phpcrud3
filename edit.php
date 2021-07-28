<?php
require "./db.php";

// RECUPERE LA FICHE DU FILM
$id = $_GET["id"];
$sql = "SELECT * FROM film WHERE id = :id";
$statement = $connection->prepare($sql);
$statement->execute([":id" => $id]);
$film = $statement->fetch(PDO::FETCH_OBJ);
//var_dump($film);

$message = "";
if (
    isset($_POST["titre"]) &&
    isset($_POST["annee"]) &&
    isset($_FILES["image"])
) {
    $titre = $_POST["titre"];
    $annee = $_POST["annee"];

    // IMAGE
    $file_name = $_FILES["image"]["name"]; // pour écrire dans la base de données
    $file_temp = $_FILES["image"]["tmp_name"]; // pour déplacer le fichier
    $allowed_ext = ["jpg", "jpeg", "gif", "png"]; // extensions autorisées
    $exp = explode(".", $file_name); // on décompose le nom du fichier image
    $ext = end($exp); // on prend la dernière valeur du explode précédent, qui sera forcément l'extension
    $path = "images/" . $file_name; // variable qui écrit le chemin de stockage de l'image

    if(in_array($ext, $allowed_ext)) {

        if(move_uploaded_file($file_temp, $path)) {
            $sql = "INSERT INTO film (titre, annee, image) VALUES (:titre, :annee, :image)"; // requête préparée
            $statement = $connection->prepare($sql);
            if ($statement->execute(
                    [
                        ":titre" => $titre,
                        ":annee" => $annee,
                        ":image" => $path
                    ]
                )
            ) {
                $message = "<p class=\"text-center mb-0\">Film ajouté 😎</p>";
            }

        }

    } else {
        $message = "<p class=\text-start mb-0\" style=\"color:red;\">Ce fichier n'est pas une image. 😡</p>";
    };
    
}
?>

<?php
include "./head.php";
?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="m-5 text-center">MODIFIER UN FILM</h1>
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

            <form method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label>Titre</label>
                    <input name="titre" type="text" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Date de sortie</label>
                    <input name="annee" type="date" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlFile1">Choisissez un fichier : </label>
                    <input name="image" type="file" class="form-control-file">
                </div>

                <button type="submit" class="btn btn-light">Ajouter</button>
            </form>
        </div>
    </div>
</div>

<?php
include "./footer.php";
?>