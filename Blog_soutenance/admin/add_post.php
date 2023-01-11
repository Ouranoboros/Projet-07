<?php
// Inclure le fichier header.php
include 'includes/header.php';
// Inclure le fichier sidebar.php
include 'includes/sidebar.php';
?>
<div class="grid_10">

    <div class="box round first grid">
        <h2>Ajouter un nouveau post</h2>
        <?php
        // Si la méthode de requête est POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $title = $_POST['title'];
            $category_id = $_POST['category_id'];
            $author = $_POST['author'];
            $tags = $_POST['tags'];
            $body = $_POST['body'];
        //     Si title est vide
                if ($title == "") {
        //         Alors
        //             Afficher un message d'erreur
                    echo "<span class='success'> Le titre n'est pas renseigné.</span>";
        //         Sinon
                 } else {
        //             Insérer le post dans la table post
                    $query = "INSERT INTO post(title, category_id, author, tags, body) VALUES ('$title', '$category_id', '$author', '$tags', '$body')";
                    $insert_post = $db->crate($query);
        //             Si le post est inséré
        //                 Alors
        //                     Afficher un message de succès
                    if ($insert_post) {
                        echo "<span class='success'>Votre Post à été envoyé.</span>";
        //                 Sinon
        //                     Afficher un message d'erreur
                    } else {
                        echo "<span class='error'> Votre message n'a pas été envoyé.</span>";
                    }
                }
        }

        ?>
       <form action="" method="post" enctype="multipart/form-data">
                <table class="form">

                    <tr>
                        <td>
                            <label>Title</label>
                        </td>
                        <td>
                            <input type="text" name="title" placeholder="Entrez le titre du post" class="medium" />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>Category</label>
                        </td>
                        <td>
                            <select id="select" name="category_id">
                                <option>Select Category </option>
                                <?php
                                // Récupérer les catégories de la table category
                                // Tant que les catégories sont récupérées
                                //     Afficher les catégories dans la liste déroulante
                                ?>
                                <option value=""></option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Télecharger une image</label>
                        </td>
                        <td>
                            <input type="file" name="image" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Nom de l'auteur</label>
                        </td>
                        <td>
                            <input type="text" name="author" placeholder="Entrez le nom de l'auteur." />
                            </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Tags</label>
                        </td>
                        <td>
                            <input type="text" name="tags" placeholder="Entrez le tag ici ..." />
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top; padding-top: 9px;">
                            <label>Content</label>
                        </td>
                        <td>
                            <textarea class="tinymce" name="body"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" Value="Sauvegarder" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<?php
// Inclure le fichier footer.php
include 'includes/footer.php'
?>
