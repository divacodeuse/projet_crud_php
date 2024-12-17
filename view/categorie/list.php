<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Catégories</title>
    <style>
        /* Style général */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f8f9fa;
            color: #333;
        }

        /* Bouton "Add Catégorie" */
        .add-button {
            display: inline-block;
            padding: 10px 15px;
            margin-bottom: 20px;
            text-decoration: none;
            color: #fff;
            background-color: #28a745;
            border-radius: 5px;
            font-weight: bold;
        }

        .add-button:hover {
            background-color: #218838;
        }

        /* Tableau stylisé */
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            overflow: hidden;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #007bff;
            color: #fff;
            text-transform: uppercase;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #e9ecef;
        }

        /* Boutons d'action */
        .action-button {
            display: inline-block;
            padding: 5px 10px;
            text-decoration: none;
            color: #fff;
            border-radius: 5px;
            font-size: 14px;
        }

        .delete-button {
            background-color: #dc3545;
        }

        .delete-button:hover {
            background-color: #c82333;
        }

        .update-button {
            background-color: #ffc107;
            color: #333;
        }

        .update-button:hover {
            background-color: #e0a800;
        }
    </style>
</head>
<body>
    <!-- Lien pour ajouter une catégorie -->
    <a href="?controller=categorie&&action=add" class="add-button">ajouter une Catégorie</a>

    <!-- Tableau pour afficher les catégories -->
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Libellé</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($c = pg_fetch_assoc($categories)): ?>
                <tr>
                    <td><?= htmlspecialchars($c['id']); ?></td>
                    <td><?= htmlspecialchars($c['libelle']); ?></td>
                    <td>
                        <!-- Boutons Delete et Update -->
                        <a href="?controller=categorie&&action=delete&&id=<?= $c['id']; ?>" class="action-button delete-button">Supprimer</a>
                        <a href="?controller=categorie&&action=edit&&id=<?= $c['id']; ?>" class="action-button update-button">Modifier</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
