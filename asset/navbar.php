<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion - Navbar</title>
    <style>
        /* Style général de la navbar */
        nav {
            background-color: #333;
            overflow: hidden;
            display: flex;
            justify-content: space-around;
            padding: 10px;
        }

        nav a {
            color: red;
            text-decoration: none;
            padding: 10px 15px;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        nav a:hover {
            background-color: #575757;
            border-radius: 5px;
        }

        /* Style pour le contenu principal */
        .container {
            margin: 20px;
        }

        
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav>
        <a href="index.php?controller=produit" class="<?= ($controller == 'produit') ? 'active' : '' ?>">Produits</a>
        <a href="index.php?controller=categorie"
            class="<?= ($controller == 'categorie') ? 'active' : '' ?>">Catégories</a>
        <a href="index.php?controller=user" class="<?= ($controller == 'user') ? 'active' : '' ?>">Utilisateurs</a>
    </nav>

    <!-- Contenu principal -->
    <div class="container">
        <!-- Ici le contenu spécifique de chaque section sera affiché -->
        <?php
        global $controller;
        // Inclusion du contenu dynamique en fonction des controllers/actions
        if ($controller == 'produit') {
            require_once './view/produit/list.php';
        } elseif ($controller == 'categorie') {
            require_once './view/categorie/list.php';
        } elseif ($controller == 'user') {
            require_once './view/user/list.php';
        }
        ?>
    </div>

</body>

</html>