<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require "./db.php";
$message = "";
if (
    isset($_POST['titre']) &&
    isset($_POST['date']) &&
    isset($_FILES['image'])
) {
    $titre = $_POST['titre'];
    $date = $_POST['date'];
    //image
    $file_name = $_FILES['image']['name']; //envoi dans la base de donnée
    $file_temp = $_FILES ['image']['tmp_name']; //pour deplacer le fichier

    //variable pour controller l'extention du fichier 
    $allowed_ext = array('jpg','jpeg','png','gif');//extentions autorisées
    $exp = explode('.',$file_name);// decomposition du fichier image
    $ext = end($exp);// prend la derniere valeur apres le point

    $path = "images/". $file_name; //chemin pour le stockage 
    if(in_array($ext, $allowed_ext)){
       
        if(move_uploaded_file($file_temp, $path)){

            $sql = "INSERT INTO film(titre, annee, image) VALUES (:titre, :date, :image)";
            $statement = $connection->prepare($sql);
            if ($statement->execute(
                [
                    ":titre" => $titre,
                    ":date" => $date,
                    ":image" => $path
                ]
            )) {
                $message = "Film ajouté avec succès !";
            }
        }
    } else{
        print "Erreur pas le bon fichier !";
    }
    
    
}
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
            <?php if (!empty($message)) : ?>
                <div class="alert alert-success" role="alert">
                    <?= $message ?>
                </div>
            <?php endif; ?>
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Titre</label>
                    <input type="text" class="form-control" name="titre">
                </div>
                <div class="form-group">
                    <label>Date</label>
                    <input type="date" class="form-control" name="date">
                </div>
                <div class="form-group">
                    <label >Image</label>
                    <input type="file" class="form-control-file" name="image">
                </div>
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </form>
        </div>
    </div>
</div>

<?php require "./components/footer.php" ?>