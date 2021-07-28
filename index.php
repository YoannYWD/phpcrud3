<?php 
require "./db.php";
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

<div class="container">
    <div class="row rowTable">
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
                <tr>
                <th scope="row">1</th>
                <td>Interstellar</td>
                <td>2014</td>
                <td><img src="./images/interstellar.jpg" width="200px"></td>
                <td>
                    <button type="button" class="btn btn-light margin-right-2">Editer</button>
                    <button type="button" class="btn btn-light">Supprimer</button></td>
                </tr>
            </tbody>
            </table>
        </div>
    </div>
</div>


<?php
include "./footer.php";
?>