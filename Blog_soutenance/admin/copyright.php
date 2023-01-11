<?php
// Inclure le fichier header.php
include 'includes/header.php';
// Inclure le fichier sidebar.php
include 'includes/sidebar.php';
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Mettre à jour le texte du droit d'auteur</h2>
        <!--   For update copyright media -->
        <?php
        // Si la méthode de requête est POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Alors
        //     Récupérer la valeur de copyright
        $copyright = $format->validation($_POST['copyright']);
        //     Si copyright est vide
            if (empty($copyright)){
            //         Alors
            //         Afficher un message d'erreur
                echo  "<script>alert('ERROR !');</script>";
            //         Sinon
            } else{
                //      Mettre à jour le copyright dans la table footer
                $query = "UPDATE footer SET copyright = '$copyright'";
                $result = $db->update($query);
            
            //      Si le copyright est mis à jour
                if(empty($copyright)!=true) {

        } else{
            //         Alors
            //          Afficher un message d'erreur
            echo "marche pas";
                }
            }
        }
        ?>

        <div class="block copyblock">
            <!--    For show social link from database-->
            <?php
            // Récupérer le copyright de la table footer
            $copy = $query
            // Tant que le copyright est récupéré

            //     Afficher le copyright

    
            ?>
            <form action="" method="post">
                <table class="form">
                    <tr>
                        <td>
                            <input type="text" value="" name="copyright" class="large" />
                        </td>
                    </tr>

                    <tr>
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

