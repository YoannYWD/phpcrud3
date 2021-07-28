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