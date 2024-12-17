<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un utilisateur</title>
    <style>
        /* Style général de la page */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Conteneur principal */
        .form-container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px 30px;
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

        /* Style des champs de formulaire */
        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box; /* Pour inclure padding dans la largeur */
        }

        input:focus {
            border-color: #007bff;
            outline: none;
        }

        /* Style des boutons */
        button {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
            width: 100%;
        }

        button:hover {
            background-color: #0056b3;
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
    <!-- Conteneur du formulaire -->
    <div class="form-container">
        <h1>Ajouter un utilisateur</h1>
        <form method="POST" action="index.php?controller=user&action=save">
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" placeholder="Entrez votre nom" required>

            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" placeholder="Entrez votre prénom" required>

            <label for="email">Email :</label>
            <input type="email" id="email" name="email" placeholder="Entrez votre email" required>

            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" placeholder="Entrez votre mot de passe" required>

            <button type="submit">Enregistrer</button>
        </form>
        <a href="index.php?controller=user&action=index">Retour</a>
    </div>
</body>
</html>
