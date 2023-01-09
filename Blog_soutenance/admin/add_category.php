<?php
// Inclure le fichier header.php
// Inclure le fichier sidebar.php
?>
<div class="grid_10">

    <div class="box round first grid">
        <h2>Ajouter une nouvelle catégorie</h2>
        <div class="block copyblock">
            <?php
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
?>