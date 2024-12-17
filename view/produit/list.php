<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Produits</title>
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
            margin: 20px 0;
        }

        /* Style du tableau */
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #007bff;
            color: #fff;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #d1ecf1;
        }

        /* Boutons */
        a.button, button {
            display: inline-block;
            padding: 8px 12px;
            text-decoration: none;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 5px;
        }
        a.button {
            background-color: #28a745;
        }
        a.button:hover {
            background-color: #218838;
        }
        button.delete {
            background-color: #dc3545;
        }
        button.delete:hover {
            background-color: #c82333;
        }
        button.update {
            background-color: #ffc107;
            color: #333;
        }
        button.update:hover {
            background-color: #e0a800;
        }

        /* Lien d'ajout */
        .add-product {
            display: block;
            width: 200px;
            margin: 20px auto;
            text-align: center;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
        .add-product:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <h1>Liste des Produits</h1>

    <!-- Bouton pour ajouter un produit -->
    <a href="?controller=produit&&action=add" class="add-product">Ajouter un Produit</a>

    <!-- Vérifie si des produits existent -->
    <?php if (!empty($produits)): ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Libellé</th>
                    <th>Quantité</th>
                    <th>Prix Unitaire</th>
                    <th>Catégorie</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Parcourir les produits -->
                <?php foreach ($produits as $produit): ?>
                    <tr>
                        <td><?= htmlspecialchars($produit['id']); ?></td>
                        <td><?= htmlspecialchars($produit['libelle']); ?></td>
                        <td><?= htmlspecialchars($produit['qt']); ?></td>
                        <td><?= htmlspecialchars($produit['pu']); ?> </td>
                        <td><?= htmlspecialchars($produit['categorie']); ?></td>
                        <td>
                            <!-- Bouton Mettre à jour -->
                            <a href="?controller=produit&&action=edit&id=<?= $produit['id']; ?>" class="button update">Modifier</a>
                            
                            <!-- Bouton Supprimer -->
                            <form action="?controller=produit&&action=delete&id=<?= $produit['id']; ?>" method="POST" style="display:inline;">
                                <button type="submit" class="delete">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p style="text-align: center;">Aucun produit trouvé.</p>
    <?php endif; ?>

</body>
</html>
