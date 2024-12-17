<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un utilisateur</title>
    <style>
        /* Style général de la page */
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Conteneur principal */
        .form-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 25px 30px;
            width: 350px;
            text-align: center;
        }

        /* Titre */
        h1 {
            font-size: 1.8em;
            color: #333;
            margin-bottom: 20px;
        }

        /* Style des labels */
        label {
            display: block;
            font-weight: bold;
            text-align: left;
            margin-bottom: 5px;
            color: #555;
        }

        /* Champs de formulaire */
        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box; /* Inclut le padding dans la largeur */
            font-size: 1em;
        }

        input:focus {
            border-color: #007bff;
            outline: none;
        }

        /* Bouton de soumission */
        button {
            background-color: #28a745;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
            width: 100%;
        }

        button:hover {
            background-color: #218838;
        }

        /* Lien Retour */
        a {
            display: inline-block;
            margin-top: 10px;
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <!-- Conteneur principal du formulaire -->
    <div class="form-container">
        <h1>Modifier un utilisateur</h1>
        <form method="POST" action="index.php?controller=user&action=update&id=<?= $user['id'] ?>">
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" value="<?= htmlspecialchars($user['nom']) ?>" required>

            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" value="<?= htmlspecialchars($user['prenom']) ?>" required>

            <label for="email">Email :</label>
            <input type="email" id="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required>

            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" placeholder="Laisser vide pour ne pas modifier">

            <button type="submit">Mettre à jour</button>
        </form>
        <a href="index.php?controller=user&action=index">Retour</a>
    </div>
</body>
</html>
s