<?php
require_once './model/db.php'; // Inclusion de la connexion à la base de données

// Fonction pour afficher la page d'ajout d'un produit avec les catégories
function pageAdd() {
    global $connexion;

    // Récupérer la liste des catégories
    $sql = "SELECT * FROM categorie";
    $result = pg_query($connexion, $sql);

    $categories = []; // Tableau pour stocker les catégories
    if ($result) {
        while ($row = pg_fetch_assoc($result)) {
            $categories[] = $row;
        }
    } else {
        echo "Erreur lors de la récupération des catégories : " . pg_last_error($connexion);
        exit();
    }

    // Inclure la vue d'ajout de produit
    require_once './view/produit/add.php';
}

// Fonction pour sauvegarder un produit en base de données
function save() {
    global $connexion;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Récupérer les données du formulaire
        $libelle = $_POST['libelle'];
        $qt = (int)$_POST['quantite'];
        $pu = (float)$_POST['prix'];
        $id_cat = (int)$_POST['id_categorie'];

        // Validation des champs
        if (empty($libelle) || $qt <= 0 || $pu <= 0 || $id_cat <= 0) {
            echo "Erreur : Tous les champs sont requis et doivent être valides.";
            return;
        }

        // Requête pour insérer le produit
        $sql = "INSERT INTO produit (libelle, qt, pu, id_cat) 
                VALUES ('$libelle', $qt, $pu, $id_cat)";
        $result = pg_query($connexion, $sql);

        if ($result) {
            header("Location: index.php?controller=produit&action=index");
            exit();
        } else {
            echo "Erreur lors de l'insertion du produit : " . pg_last_error($connexion);
        }
    }
}

// Fonction pour afficher la liste des produits
function index() {
    global $connexion;

    $sql = "SELECT p.*, c.libelle AS categorie 
            FROM produit p 
            LEFT JOIN categorie c ON p.id_cat = c.id";
    $result = pg_query($connexion, $sql);

    $produits = [];
    if ($result) {
        while ($row = pg_fetch_assoc($result)) {
            $produits[] = $row;
        }
    } else {
        echo "Erreur lors de la récupération des produits : " . pg_last_error($connexion);
        exit();
    }

    // Inclure la vue pour afficher les produits
    require_once './view/produit/list.php';
}


function edit($id) {
    global $connexion;

    // Récupérer les informations du produit par ID
    $sqlProduit = "SELECT * FROM produit WHERE id = $id";
    $resultProduit = pg_query($connexion, $sqlProduit);

    if ($resultProduit && $produit = pg_fetch_assoc($resultProduit)) {
        // Récupérer toutes les catégories pour le menu déroulant
        $sqlCategories = "SELECT * FROM categorie";
        $resultCategories = pg_query($connexion, $sqlCategories);

        $categories = [];
        while ($row = pg_fetch_assoc($resultCategories)) {
            $categories[] = $row;
        }

        // Inclure la vue d'édition
        require_once './view/produit/edit.php';
    } else {
        echo "Erreur : Produit non trouvé.";
        exit();
    }
}

function update($id) {
    global $connexion;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $libelle = $_POST['libelle'];
        $qt = (int)$_POST['quantite'];
        $pu = (float)$_POST['prix'];
        $id_cat = (int)$_POST['id_categorie'];

        // Validation des champs
        if (empty($libelle) || $qt <= 0 || $pu <= 0 || $id_cat <= 0) {
            echo "Erreur : Tous les champs sont requis et doivent être valides.";
            return;
        }

        // Mettre à jour le produit dans la base de données
        $sql = "UPDATE produit SET libelle = '$libelle', qt = $qt, pu = $pu, id_cat = $id_cat 
                WHERE id = $id";
        $result = pg_query($connexion, $sql);

        if ($result) {
            header("Location: index.php?controller=produit&action=index");
            exit();
        } else {
            echo "Erreur lors de la mise à jour : " . pg_last_error($connexion);
        }
    }
}
function delete($id) {
    global $connexion;

    // Vérifie si l'ID est valide
    if (!is_numeric($id)) {
        echo "Erreur : ID invalide.";
        return;
    }

    // Requête pour supprimer le produit
    $sql = "DELETE FROM produit WHERE id = $id";
    $result = pg_query($connexion, $sql);

    if ($result) {
        header("Location: index.php?controller=produit&action=index");
        exit();
    } else {
        echo "Erreur lors de la suppression : " . pg_last_error($connexion);
    }
}


?>
