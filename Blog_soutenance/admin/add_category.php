<?php
// Inclure le fichier header.php
include 'includes/header.php';
// Inclure le fichier sidebar.php
include 'includes/sidebar.php';
?>
<div class="grid_10">

    <div class="box round first grid">
        <h2>Ajouter une nouvelle catégorie</h2>
        <div class="block copyblock">
            <?php

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $name = $format->validation($_POST['name']);

                if ($name == '') {
                    echo "Un titre doit être renseigné pour creer un post !";
                } else {
                    $query = "INSERT INTO category(category_id, name) VALUES(NULL, '$name')";
                    $event = $db->crate($query);
                }
            }

            // Si la méthode de requête est POST
            // Alors
            //     Récupérer la valeur de name
            //     Si name est vide
            //         Alors
            //             Afficher un message d'erreur
            //         Sinon
            //             Insérer la catégorie dans la table category
            //             Si la catégorie est insérée
            //                 Alors
            //                     Afficher un message de succès
            //                 Sinon
            //                     Afficher un message d'erreur
            ?>
            <form method="post">
                <table class="form">
                    <tr>
                        <td>
                            <input type="text" name="name" placeholder="Entrez le nom de la catégorie..." class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" name="submit" Value="Sauvegarder" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<?php
// Inclure le fichier footer.php
include 'includes/footer.php';
?>
