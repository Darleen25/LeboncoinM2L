<?php

session_start();

function getAdmin($email, $motdepasse)
{
    if(require("connexionconfig.php"))
    {
        $req = $bd->prepare("select * from `admin` where `email`= ? and `motdepasse` = ?");
        $req->execute(array($email, $motdepasse));
        $res = $req->fetch(PDO::FETCH_ASSOC);
    
        
       
        if($res)
        {
            return $res;
        }
        else
        {
            return false;
        }
           
        $req->closeCursor();
        
    }
}



function ajouter($nom, $prix, $desc, $chemin, $idU)
{
    if(require("connexionconfig.php"))
    {
        $req = $bd->prepare("INSERT INTO produits (nom, prix, description, image, idUser) VALUES (?,?,?,?,?)");
       
        $res = $req->execute(array($nom, $prix, $desc, $chemin, $idU));
       
        $req->closeCursor();
        return $res;
    }
}

function afficher()
{
    if(require("connexionconfig.php"))
    {
        $req=$bd->prepare("SELECT * FROM  produits ORDER BY id DESC");
   
        $req->execute();
   
        $data = $req->fetchAll(PDO::FETCH_OBJ);

        return $data;

        $req->closeCursor();
    }
}

function supprimer($id)
{
    if(require("connexionconfig.php"))
    {
        $req=$bd->prepare("DELETE  FROM produits WHERE id=?");
        $req->execute(array($id));
    }
}


?>