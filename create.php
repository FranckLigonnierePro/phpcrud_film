<?php
require "./db.php"

?>

<?php require "./components/header.php" ?>
<div class="container">
    <div class="row">
        <div class="col my-5">
            <h1>Ajouter un nouveau film</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <form>
                <div class="form-group">
                    <label>Titre</label>
                    <input type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label>Date</label>
                    <input type="date" class="form-control">
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <input type="form" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </form>
        </div>
    </div>
</div>

<?php require "./components/footer.php" ?>