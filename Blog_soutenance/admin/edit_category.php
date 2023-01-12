<?php
// Inclure le fichier header.php
include 'includes/header.php';
// Inclure le fichier sidebar.php
include 'includes/sidebar.php';
?>
<?php
// Si la méthode de requête est GET
if (isset($_GET['catid'])) {  
// Alors
//     Récupérer la valeur de catid
    $catid = $_GET['catid'];
//     Si catid est vide
//         Alors
    if ($catid == "") {
//             Rediriger vers category_list.php
        header("http://localhost/Blog_soutenance/admin/category_list.php");
    }
}
?>

<div class="grid_10">

    <div class="box round first grid">
        <h2>Update Category</h2>
        <div class="block copyblock">
            <!--                Category update query-->
            <?php
            // Si la méthode de requête est POST
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Alors
            //     Récupérer la valeur de name
                $name = $format->validation($_POST['name']);
                $name = mysqli_real_escape_string($db->link, $name);
            //     Si name est vide 
                if ($name == "") {
            //         Alors
            //             Afficher un message d'erreur
                    echo "<span class='error'> Un champ n'est pas renseigné.</span>";
            //         Sinon
                } else {
            //             Mettre à jour la catégorie dans la table category
                    $query = "UPDATE category SET name = '$name' WHERE category_id=$catid";
                    $update_cat =$db->update($query);
                    if ($update_cat) {
                        echo "<span class='success'> Le nouveau nom de catégorie est :</span>";
        //                 Sinon
        //                     Afficher un message d'erreur
                    } else {
                        echo "<span class='error'> Votre message n'a pas été envoyé.</span>";
                    }
                }
            }
            ?>
            <!--                Show selected Category -->
            <?php
            // Récupérer les données de la table category
            $query = "SELECT * FROM category WHERE category_id = $catid";
            $requete = $db->select($query);
            // Tant que les données sont récupérées
            //     Afficher les données
            if ($requete) {
                while ($donnees = $requete->fetch_assoc()) {
                    echo $donnees['name'];
                }
            }        
            ?>
            <form method="post">
                <table class="form">
                    <tr>
                        <td>
                            <input type="text" name="name" value="" class="medium" />
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