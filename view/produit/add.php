<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Produit</title>
    <style>
        /* Style général */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            color: #333;
        }
        h1 {
            text-align: center;
            margin-top: 20px;
            color: #007bff;
        }

        /* Conteneur du formulaire */
        .form-container {
            width: 400px;
            margin: 30px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Styles pour les labels et champs */
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

        input, select {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input:focus, select:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        /* Bouton d'ajout */
        button {
            display: inline-block;
            width: 100%;
            padding: 10px;
            font-size: 16px;
            color: #fff;
            background-color: #28a745;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-transform: uppercase;
        }
        button:hover {
            background-color: #218838;
        }

        /* Pour les messages d'erreur ou de validation (optionnel) */
        .message {
            text-align: center;
            margin: 10px 0;
            color: red;
        }
    </style>
</head>
<body>
    <h1>Ajouter un Produit</h1>
    <div class="form-container">
        <form action="?controller=produit&&action=save" method="POST">
            <label for="libelle">Libellé</label>
            <input type="text" name="libelle" id="libelle" placeholder="Entrez le libellé du produit" required>

            <label for="quantite">Quantité</label>
            <input type="number" name="quantite" id="quantite" placeholder="Entrez la quantité" min="1" required>

            <label for="prix">Prix Unitaire</label>
            <input type="number" step="0.01" name="prix" id="prix" placeholder="Entrez le prix unitaire" required>

            <label for="id_categorie">Catégorie</label>
            <select name="id_categorie" id="id_categorie" required>
                <option value="">Sélectionnez une catégorie</option>
                <?php foreach ($categories as $categorie): ?> 
                    <option value="<?php echo $categorie['id']; ?>">
                        <?php echo htmlspecialchars($categorie['libelle']); ?>
                    </option>
                <?php endforeach; ?>
            </select>                      

            <button type="submit">Ajouter</button>
        </form>
    </div>
</body>
</html>
