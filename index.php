<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

require "./db.php";
$sql = "SELECT * FROM film";
$statement = $connection->prepare($sql);
$statement->execute();
$films = $statement->fetchAll(PDO::FETCH_OBJ);
?>

<?php require "./components/header.php"; ?>

<div class="container">
    <div class="row">
        <div class="col my-5">
            <h1>Liste des films</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Titre</th>
                        <th scope="col">Année</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($films as $element): ?>
                    <tr>
                        <th scope="row"><?= $element->id ?></th>
                        <td><?= $element->titre ?></td>
                        <td><?= $element->annee ?></td>
                        <td><img src="<?= $element->image ?>" width="100"></td>
                        <td>
                            <button type="button" class="btn btn-success">Editer</button>
                            <button type="button" class="btn btn-danger">Supprimer</button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require "./components/footer.php"; ?>