<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un Produit</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        form {
            width: 400px;
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input, select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        button {
            background-color: #28a745;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <form action="?controller=produit&action=update&id=<?= $produit['id']; ?>" method="POST">
        <h2>Modifier un Produit</h2>
        <label for="libelle">Libellé :</label>
        <input type="text" name="libelle" id="libelle" value="<?= htmlspecialchars($produit['libelle']); ?>" required>

        <label for="quantite">Quantité :</label>
        <input type="number" name="quantite" id="quantite" value="<?= htmlspecialchars($produit['qt']); ?>" min="1" required>

        <label for="prix">Prix Unitaire :</label>
        <input type="number" name="prix" id="prix" step="0.01" value="<?= htmlspecialchars($produit['pu']); ?>" required>

        <label for="id_categorie">Catégorie :</label>
        <select name="id_categorie" id="id_categorie" required>
            <?php foreach ($categories as $categorie): ?>
                <option value="<?php echo $categorie['id']; ?>">
                <?php echo htmlspecialchars($categorie['libelle']); ?>
            </option>
            <?php endforeach; ?>
        </select>

        <button type="submit">Mettre à jour</button>
    </form>
</body>
</html>
