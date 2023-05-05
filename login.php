<?php
session_start();

include "commandes.php";

if(isset($_POST['envoyer']))
{
    //var_dump($_POST); die();
    if(!empty($_POST['email']) AND  !empty($_POST['motdepasse']))
    {
        $email = htmlspecialchars($_POST['email']);
        $motdepasse = htmlspecialchars($_POST['motdepasse']);
        $admin = getAdmin($email, $motdepasse);

        
        if($admin)
        {
            foreach ($admin as $key => $value) 
            {
                $_SESSION[$key] = $value;
            }
            //var_dump($_SESSION);die();
            header("location: ../admin/index.php");
            die();
        }
        else
        {
            echo "Il y a un Problème au niveau de la connexion !";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login - DARLEEN & LICKH</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

</head>
<body>
    <div class="container-fluid">
        <div class="row">
           <div class ="col-md-3"></div>
           <div class ="col-md-6">
                <form method="post" action="">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" style="width: 80%" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="motdepasse" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" name="motdepasse" style="width: 80%">
                    </div>

                    <input type="submit" class="btn btn-danger"  name="envoyer" value="Se connecter">
                </form>
           </div> 

        </div>
    </div>
</body>
</html>





<?php