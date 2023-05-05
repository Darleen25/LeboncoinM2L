<?php 
session_start();

  if(!isset($_SESSION['zWuppkTT6o0Y44'])){
    header("Location: ../login.php");
  }

  if(!empty($_SESSION['zWuppkTT6o0Y44'])){
    header("Location: ../login.php");
  }

require("../config/commandes.php");


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet
    " integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity=
    "sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    
    <title></title>
</head>
<body>

<div class="album py-5 bg-light">
    <div class="container">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
    
    <form method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Titre de l'image</label>
    <input type="name" class="form-control" name="image" required>
</div>

<div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Nom du produit</label>
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

  <button type="submit" name="valider" class="btn btn-primary">Ajouter un nouveau produit</button>
</form>
    
    </div></div></div>
    
</body>
</html>

<?php 
    if(isset($_POST['valider']))
    {
        if(isset($_POST['image']) AND isset($_POST['nom']) AND isset($_POST['prix']) AND isset($_POST['desc']))
        {
        if(!empty($_POST['image']) AND isset($_POST['nom']) AND isset($_POST['prix']) AND isset($_POST['desc'])
           )
           {
             $image = htmlspecialchars(strip_tags($_POST['image']));
             $nom = htmlspecialchars(strip_tags($_POST['nom']));
             $prix = htmlspecialchars(strip_tags($_POST['prix']));
             $desc = htmlspecialchars(strip_tags($_POST['desc']));
           
           //permet de filtrer les données strip_tags
           //ajouter : fonction php


           try
           {
            ajouter($image, $nom, $prix, $desc);
           }
           catch(Exception $e){
            $e->getMessage();
           }
          
            }
        }
    }
      
?>