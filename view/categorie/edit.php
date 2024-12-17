<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une Catégorie</title>
    <style>
        /* Style général */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f2f5;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Conteneur du formulaire */
        .form-container {
            background-color: #fff;
            padding: 20px;
            width: 350px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        /* Titre */
        h2 {
            text-align: center;
            color: #007bff;
            margin-bottom: 20px;
        }

        /* Labels et champs de saisie */
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 14px;
        }

        input:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        /* Bouton de mise à jour */
        button {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            color: #fff;
            background-color: #28a745;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-transform: uppercase;
            font-weight: bold;
        }

        button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Modifier une Catégorie</h2>
        <form action="?controller=categorie&&action=update" method="POST">
            <!-- Champ caché pour l'ID -->
            <input type="hidden" name="id" value="<?= htmlspecialchars($categorie['id']) ?>">

            <!-- Champ pour le Libellé -->
            <label for="libelle">Libellé</label>
            <input type="text" name="libelle" id="libelle" value="<?= htmlspecialchars($categorie['libelle']) ?>" required>

            <!-- Bouton de soumission -->
            <button type="submit">Modifier</button>
        </form>
    </div>
</body>
</html>
