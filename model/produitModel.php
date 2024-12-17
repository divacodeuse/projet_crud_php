<?php

require_once('./model/db.php');

function getAll(){
    global $connexion;
    $sql ="SELECT * FROM produit";
    return pg_query($connexion,$sql);
}

function delete($id){
    global $connexion;
    $sql ="DELETE FROM produit WHERE id =$id";
   return pg_query($connexion,$sql);
}

function add($libelle, $quantite, $prix, $idcat) {
    global $connexion;
    $sql = "INSERT INTO produit (libelle, qt, pu, idcat) 
            VALUES ('$libelle', $quantite, $prix, $idcat)";
    return pg_query($connexion, $sql);
}


function update($id,$libelle,$quantite,$prix){
    global $connexion;
    $sql ="UPDATE produit SET libelle='$libelle',qt=$quantite,pu=$prix
    where id=$id";
   return pg_query($connexion,$sql);
}



?>


