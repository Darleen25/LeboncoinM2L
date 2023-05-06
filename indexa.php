<?php
 
  //if(!isset($_SESSION))
  //{
      //header("Location:loginconfig.php");
  //}
  require("commandesconfig.php");
  if(isset($_POST['valider'])) 
  {
    //var_dump($_POST); die();
    if( isset($_POST['nom']) AND isset($_POST['prix']) AND isset($_POST['desc']))
    { 
     if( !empty($_POST['nom']) AND !empty($_POST['prix']) AND !empty($_POST['desc']))
     {
      if ((isset($_FILES["image"]) && !$_FILES["image"]["error"]))
      {
          $extensions = array("jpg", "png", "gif", "jpeg", "PNG");
          
          $fileInfo = pathinfo($_FILES["image"]["name"]);

          //Si la taille de l"image est <= 2 Mo
          if ($_FILES["image"]["size"] <= 2000000) 
          {
              //Si l"image a la bonne extension
              if (in_array($fileInfo["extension"], $extensions)) 
              {

                  //On peut commencer le traitement
                  $nom = htmlspecialchars(strip_tags($_POST['nom']));
                  $prix = htmlspecialchars(strip_tags($_POST['prix']));
                  $desc = htmlspecialchars(strip_tags($_POST['desc']));
                  $idU = (int)$_POST['idUtilisateur'];
                  $chemin = "images/produits/".$nom.$idU.".png";
                  $dos = __DIR__."//images//produits//".$nom.$idU.".png";
                  move_uploaded_file($_FILES["image"]["tmp_name"], $dos);
                  //echo "Le fichier a été envoyé sur le serveur";
                   
                    $result = ajouter($nom, $prix, $desc, $chemin, $idU);
                    var_dump($result); die();
              }
            }
          } 
        }
      }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <title></title>
</head>
<body>




<div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <form enctype="multipart/form-data" method="post">

<div class="mb-3">
  <label for="exampleInputPassword1" class="form-label">Nom du Produit</label>
  <input type="text" class="form-control"  name="nom" required>
</div>

<div class="mb-3">
  <label for="exampleInputPassword1" class="form-label">Prix</label>
  <input type="number" class="form-control" name="prix" required>
</div>

<div class="mb-3">
  <label for="exampleInputPassword1" class="form-label">Description</label>
  <textarea class="form-control" name="desc" required></textarea>
</div>

<div class="mb-3">
  <label for="exampleInputEmail1" class="form-label">Image du Produit</label>
  <input type="file" class="form-control" name="image" required>
</div>

<input type = "hidden" value= "<?=$_SESSION["id"]?>" name="idUtilisateur">

<button type="submit"  name="valider" class="btn btn-primary">Ajouter un nouveau produit</button>
</form>


      </div></div></div>
    

</body>
</html>

