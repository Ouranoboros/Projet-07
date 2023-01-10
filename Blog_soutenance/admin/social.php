<?php
// Inclure le fichier header.php
include 'includes/header.php';


// Inclure le fichier sidebar.php
include 'includes/sidebar.php';

?>
<div class="grid_10">

    <div class="box round first grid">
        <h2>Mettre à jour les médias sociaux</h2>
        <!--   For update social media -->
        <?php
        // Si la méthode de requête est POST
        // Alors
        //     Récupérer la valeur de facebook
        //     Récupérer la valeur de github
        //     Récupérer la valeur de skype
        //     Récupérer la valeur de linkedin
        //     Récupérer la valeur de google
        //     Si facebook, github, skype, linkedin ou google est vide
        //         Alors
        //             Afficher un message d'erreur
        //         Sinon
        //             Mettre à jour les médias sociaux dans la table tbl_social
        //             Si les médias sociaux sont mis à jour
        //                 Alors
        //                     Afficher un message de succès
        //                 Sinon
        //                     Afficher un message d'erreur
        ?>

        <div class="block">
            <!--     For show social link from database-->
            <?php
            // Récupérer les données de la table tbl_social
            // Tant que les données sont récupérées
            //     Afficher les données
            ?>
            <form action="" method="post">
                <table class="form">
                    <tr>
                        <td>
                            <label>Facebook</label>
                        </td>
                        <td>
                            <input type="text" name="facebook" value="" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Github</label>
                        </td>
                        <td>
                            <input type="text" name="github" value="" class=" medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Skype</label>
                        </td>
                        <td>
                            <input type="text" name="skype" value="" class="medium" />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>LinkedIn</label>
                        </td>
                        <td>
                            <input type="text" name="linkedin" value="" class="medium" />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>Google </label>
                        </td>
                        <td>
                            <input type="text" name="google" value="" class="medium" />
                        </td>
                    </tr>

                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" Value="Modifier" />
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