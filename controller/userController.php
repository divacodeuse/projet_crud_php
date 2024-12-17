<?php
require_once './model/db.php'; // Inclusion de la connexion à la base de données

// Afficher la liste des utilisateurs
function index()
{
    global $connexion;

    $sql = "SELECT * FROM utilisateur ORDER BY id";
    $result = pg_query($connexion, $sql);

    $users = [];
    if ($result) {
        while ($row = pg_fetch_assoc($result)) {
            $users[] = $row;
        }
    }

    // Inclure la vue pour afficher la liste des utilisateurs
    require_once './view/user/list.php';
}

// Afficher le formulaire pour ajouter un utilisateur
function pageAddUser()
{
    require_once './view/user/add.php';
}

// Enregistrer un nouvel utilisateur dans la base de données
function saveUser()
{
    global $connexion;

    // Récupération des données du formulaire
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Mot de passe sécurisé

    // Insertion dans la base de données
    $sql = "INSERT INTO utilisateur (nom, prenom, email, password) VALUES ('$nom', '$prenom', '$email', '$password')";
    pg_query($connexion, $sql);

    header("Location: index.php?controller=user&action=index");
    exit;
}
function edit()
{
    if (isset($_GET['id'])) { // Vérifie que l'ID de l'utilisateur est passé en paramètre
        global $connexion;
        $id = $_GET['id'];
        $sql = "SELECT * FROM utilisateur WHERE id = $id";
        $result = pg_query($connexion, $sql);
        $user = pg_fetch_assoc($result);// Fonction dans le modèle pour récupérer les infos de l'utilisateur

        if ($user) { // Vérifie si l'utilisateur existe
            require './view/user/edit.php'; // Affiche la vue pour modifier l'utilisateur
        } else {
            die("Utilisateur non trouvé !");
        }
    } else {
        die("ID utilisateur manquant !");
    }
}


// Mettre à jour un utilisateur dans la base de données
function updateUser($id)
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        global $connexion;
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];

        // Mettre à jour l'utilisateur dans la base de données
        $sql = "UPDATE utilisateur SET nom = '$nom', prenom = '$prenom', email = '$email' 
                WHERE id = $id";
        $result = pg_query($connexion, $sql);

        if ($result) {
            header("Location: index.php?controller=user&action=index");
            exit();
        } else {
            echo "Erreur lors de la mise à jour : " . pg_last_error($connexion);
        }
    }
   
}

// Supprimer un utilisateur
function deleteUser()
{
    global $connexion;

    $id = $_GET['id'];
    $sql = "DELETE FROM utilisateur WHERE id = $id";
    pg_query($connexion, $sql);

    header("Location: index.php?controller=user&action=index");
    exit;
}

               
// Afficher le formulaire pour modifier un utilisateur
// function getUser() {
//     global $connexion;

//     $id = $_GET['id'];
//     $sql = "SELECT * FROM utilisateur WHERE id = $id";
//     $result = pg_query($connexion, $sql);
//     $user = pg_fetch_assoc($result);

//     require_once './view/user/edit.php';
// }

?>