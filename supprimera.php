<?php


if(!isset($_SESSION['Popo2#']))
{
    header("Location: loginconfig.php");
}

if(empty($_SESSION['Popo2#']))
{
    header("Location: loginconfig.php");
}


require("commandesconfig.php");
$Produits=afficher();
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
<form method="post">


<div class="mb-3">
  <label for="exampleInputPassword1" class="form-label">Identifiant du produit</label>
  <input type="number" class="form-control" name="idproduit" required>
</div>


<button type="submit"  name="valider" class="btn btn-primary">Supprimer le produit</button>
</form>


      </div>
    
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
    
      <?php foreach($Produits as $produit): ?>
      <div class="col">
          <div class="card shadow-sm">
           
           <img src="<?= $produit-> image ?>">
           
           <h3><?= $produit->id ?></h3>
            <div class="card-body">
             
            </div>
          </div>
        </div>
       
        <?php endforeach; ?>  
    
    
    </div>    
    
    
    </div></div>
    

</body>
</html>

<?php
 if(isset($_POST['valider'])) 
 {
   if( isset($_POST['idproduit']))
   {
    if(!empty($_POST['idproduit'])AND is_numeric($_POST['idproduit']))
    {
        $idproduit = htmlspecialchars(strip_tags($_POST['idproduit']));
   
try
{
    supprimer($idproduit);
} catch (Exception $e)
{
$e->getMessage();
}
    }   
   } 
 }
?>