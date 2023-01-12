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
        // Alors
        //     Récupérer la valeur de title
            $title = $format->validation($_POST['title']);
            $title = mysqli_real_escape_string($db->link, $title);
        //     Récupérer la valeur de category_id
            $category_id = $format->validation($_POST['category_id']);
            $category_id = mysqli_real_escape_string($db->link, $category_id);
        //     Récupérer la valeur de author
            $author = $format->validation($_POST['author']);
            $author = mysqli_real_escape_string($db->link, $author);
        //     Récupérer la valeur de tags
            $tags = $format->validation($_POST['tags']);
            $tags = mysqli_real_escape_string($db->link, $tags);
        //     Récupérer la valeur de body
            $body = $format->validation($_POST['body']);
            $body = mysqli_real_escape_string($db->link, $body);
        
            //     Récupérer les valeurs de image
            $permited = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];
            // tmp_name = donne le nom du fichier stocké dans l'espace de stockage du serveur web

            // Divise une chaine de caractères
            $div = explode('.', $file_name);
            // Met en miniscule le dernier segment de $div (l'extension)
            $file_ext = strtolower(end($div));
            // Nomme le fichier à partir du temps d'upload / substr = retourne une partie d'une chaine de caractère 
            $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
            // Enregistre le chemin d'accès de l'image
            $uploaded_image = "uploads/" . $unique_image;
        //     Si title est vide
                if ($title == "" || $category_id == "" || $file_name == "" || $tags == "" || $body == "" ) {
        //         Alors
        //             Afficher un message d'erreur
                    echo "<span class='error'> Un champ n'est pas renseigné.</span>";
        //         Verifie la taille de l'image   
                } elseif ($file_size > 1048567) { 
                    echo "<span class='error'> La taille de l'image doit être inférieur à 1Mo.</span>";
        //         Verifie l'extension de l'image / implode = rassemble les éléments d'un tableau en une chaîne    
                } elseif (in_array($file_ext, $permited)== false) { 
                    echo "<span class='error'> Vous ne pouvez télécharger que :-" . implode(',' , $permited) . "</span>";
        //         Sinon
                } else {
        //             Télécharger l'image
                    move_uploaded_file($file_temp, $uploaded_image);
        //             Insérer le post dans la table post
                    $query = "INSERT INTO post(title, category_id, author, tags, body, image) VALUES ('$title', '$category_id', '$author', '$tags', '$body', '$uploaded_image')";
                    $insert_post = $db->crate($query);
        //             Si le post est inséré
        //                 Alors
        //                     Afficher un message de succès
                    if ($insert_post) {
                        echo "<span class='success'> Votre message à été envoyé.</span>";
        //                 Sinon
        //                     Afficher un message d'erreur
                    } else {
                        echo "<span class='error'> Votre message n'a pas été envoyé.</span>";
                    }
                }
        }
        ?>

        <div class="block">
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
                                <option value ="">Select Category </option>
                                <?php
                                // Récupérer les catégories de la table category
                                $query = "SELECT * FROM category";
                                $requete = $db->select($query);
                                // Tant que les catégories sont récupérées
                                //     Afficher les catégories dans la liste déroulante 
                                if ($requete) {
                                    while ($donnees = $requete->fetch_assoc()) {
                                ?>
                                <option value="<?php echo $donnees['category_id']?>"><?php echo $donnees['name']?></option>
                                <?php }
                                }
                                ?> 
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
include 'includes/footer.php';
?>