<?php
require_once './asset/navbar.php';

// Vérification du paramètre "controller"
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'produit';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

if ($controller == 'produit') {
    require_once './controller/produitController.php';
} elseif ($controller == 'categorie') {
    require_once './controller/categorieController.php';
} elseif ($controller == 'user') { // Nouveau cas pour les utilisateurs
    require_once './controller/userController.php';
} else {
    die("Contrôleur inconnu !");
}

// Vérification du paramètre "action"
if (isset($_GET['action']) && !empty($_GET['action'])) {

    // Actions pour les produits
    if ($controller == 'produit') {
        if ($action == 'index') {
            index();
        } elseif ($action == 'add') {
            pageAdd();
        } elseif ($action == 'save') {
            save();
        } elseif ($action == 'edit' && isset($_GET['id'])) {
            edit($_GET['id']);
        } elseif ($action == 'update' && isset($_GET['id'])) {
            update($_GET['id']);
        } elseif ($action == 'delete' && isset($_GET['id'])) {
            delete($_GET['id']);
        }
    }                                 

    // Actions pour les catégories
    if ($controller == 'categorie') {
        if ($action == 'create') {
            pageAdd();
        } elseif ($action == 'delete') {
            remove();
        } elseif ($action == 'save') {
            save();
        } elseif ($action == 'edit') {
            getCategorie();
        } elseif ($action == 'update') {
            update();
        }
    }

    // Actions pour les utilisateurs
    if ($controller == 'user') {
        if ($action == 'index') {
            index(); // Afficher la liste des utilisateurs
        } elseif ($action == 'add') {
            pageAddUser(); // Formulaire pour ajouter un utilisateur
        } elseif ($action == 'save') {
            saveUser(); // Enregistrer un nouvel utilisateur
        } elseif ($action == 'edit' && isset($_GET['id'])) {
            edit($_GET['id']); // Récupérer un utilisateur à modifier
        } elseif ($action == 'update' && isset($_GET['id'])) {
            updateUser($_GET['id']); // Mettre à jour les informations de l'utilisateur
        } elseif ($action == 'delete' && isset($_GET['id'])) {
            deleteUser(); // Supprimer un utilisateur
        }
    }

} 
else {
        index(); // Pour les produits par défaut
    }

?>
