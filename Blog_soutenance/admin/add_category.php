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
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {// Si la méthode de requête est POST
            // Alors
            $name = $_POST['name'];//     Récupérer la valeur de name
            if ($name == "") { //     Si name est vide
            //         Alors
            echo "<span class='error'> ERROR !.</span>"; //             Afficher un message d'erreur
            }else{ //         Sinon
                $query = "INSERT INTO category(title, category_id, author, tags, body) VALUES ('')";
                $insert_category = $db->crate($query);//             Insérer la catégorie dans la table category
            }
            if ($insert_post) { //             Si la catégorie est insérée
            //   Alors
            echo "<span class='success'>VCatégorie ajoutée.</span>";//                     Afficher un message de succès
            }else{//                 Sinon
                echo "<span class='error'> La catégorie n'a pas pu être ajoutée.</span>";//                     Afficher un message d'erreur
            }
        }
                
        
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
