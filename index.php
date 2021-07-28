<?php 
require "./db.php";
$sql = "SELECT * FROM film;";
$statement = $connection->prepare($sql); // statement en instance de connexion = récupère toutes ses fonctionnalités
$statement->execute();
$films = $statement->fetchAll(PDO::FETCH_OBJ); // méthode fetchAll pour renvoyer les données sous format objet
?>

<?php
include "./head.php";
?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="m-5 text-center">LISTE DES FILMS</h1>
        </div>
    </div>
</div>

<div class="container mb-5">
    <div class="row rowItem">
        <div class="col-10 offset-1">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Titre</th>
                <th scope="col">Date de sortie</th>
                <th scope="col">Affiche</th>
                <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($films as $film): // $film est une variable locale?>
                <tr>
                <th scope="row"><?= $film->id ?></th>
                <td><?= $film->titre ?></td>
                <td><?= $film->annee ?></td>
                <td><img src="<?= $film->image ?>" width="200px"></td>
                <td>
                    <a href="edit.php?id=<?= $film->id ?>" type="button" class="btn btn-light margin-right-2">Editer</a>
                    <a type="button" class="btn btn-light">Supprimer</a></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            </table>
        </div>
    </div>
</div>


<?php
include "./footer.php";
?>