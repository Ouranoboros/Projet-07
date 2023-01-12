<?php
// Inclure le fichier header.php
include 'includes/header.php';
// Inclure le fichier sidebar.php
include 'includes/sidebar.php';
?>
<?php


if (isset($_GET["edit_postid"])){
    $G_post_id = $_GET['edit_postid'];
    $query = "SELECT * FROM post WHERE id = $G_post_id";
    $result = $db->select($query)->fetch_assoc();
    $G_title = $result["title"];
    $G_category_id = $result["category_id"];
    $G_author = $result["author"];
    $G_tags = $result["tags"];
    $G_body = $result["body"];
    $G_image = $result["image"];

}

// Si la méthode de requête est GET
// Alors
//     Récupérer la valeur de edit_postid
//     Si edit_postid est vide
//         Alors
//             Rediriger vers post_list.php
//     Sinon
//         Récupérer la valeur de id
?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Ajouter un nouveau post</h2>
        <?php

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
            if ($title == "" || $category_id == "" || $tags == "" || $body == "" ) {
                echo "<span class='error'> Un champ n'est pas renseigné.</span>";
    //         Alors
    //             Afficher un message d'erreur
            }
            else {
    
                if ($file_name != "")
                {
                if ($file_size > 1048567) { 
                    echo "<span class='error'> La taille de l'image doit être inférieur à 1Mo.</span>";
                //         Verifie l'extension de l'image / implode = rassemble les éléments d'un tableau en une chaîne    
                } elseif (in_array($file_ext, $permited)== false) { 
                    echo "<span class='error'> Vous ne pouvez télécharger que :-" . implode(',' , $permited) . "</span>";
                //         Sinon
                } 
                move_uploaded_file($file_temp, $uploaded_image);
                }
                else {
                    $uploaded_image = $G_image;
                }
                }
    //         Verifie la taille de l'image   
    //             Télécharger l'image
    //             Insérer le post dans la table post
                $query = "INSERT INTO post(title, category_id, author, tags, body, image) VALUES ('$title', '$category_id', '$author', '$tags', '$body', '$uploaded_image')";
                $query = "UPDATE post SET category_id = '$category_id', title = '$title', body =  '$body', image = '$uploaded_image', author = '$author', tags = '$tags' WHERE id =  $G_post_id";
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

        ?>
        <div class="block">
            <?php

            // Récupérer le post de la table post
            // Tant que le post est récupéré
            //     Afficher les valeurs de title, category_id, author, tags, body et image dans les champs correspondants
            ?>
            <form action="" method="post" enctype="multipart/form-data">
                <table class="form">

                    <tr>
                        <td>
                            <label>Title</label>
                        </td>
                        <td>
                            <input type="text" name="title" value="<?php echo "$G_title"?>" class="medium" />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>Categories</label>
                        </td>
                        <td>
                            <select id="select" name="category_id">
                                    <option>Select Category </option>
                                    <?php
                                    $query = "SELECT * FROM category";
                                    $requete = $db->select($query);
                                    if ($requete) {
                                        while ($result = $requete->fetch_assoc()) {
                                    ?>
                                    <option <?php
                                    
                                    if ($result['category_id']==$G_category_id)
                                    {
                                        echo "selected ";
                                    }
                                    
                                    ?> value="<?php echo $result['category_id'];?>"><?php echo $result['name'];?></option>
                                    <?php }}?>


                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Télécharger une image</label>
                        </td>
                        <td>
                            <img src="<?php echo "$G_image"?>" height="60px" width="100px" alt="">
                            <input type="file" name="image" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Nom de l auteur</label>
                        </td>
                        <td>
                            <input type="text" name="author" value="<?php echo $G_author;?>" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Tags</label>
                        </td>
                        <td>
                            <input type="text" name="tags" value="<?php echo $G_tags;?>" />
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top; padding-top: 9px;">
                            <label>Contenu</label>
                        </td>
                        <td>
                            <textarea class="tinymce" name="body"><?php echo $G_body;?></textarea>
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
<script type="text/javascript">
    $(document).ready(function() {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<?php
// Inclure le fichier footer.php
include 'includes/footer.php';
?>