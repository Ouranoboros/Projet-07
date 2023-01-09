<?php
// Inclure le fichier header.php
// Inclure le fichier sidebar.php
?>
<?php
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
        // Si la méthode de requête est POST
        // Alors
        //     Récupérer la valeur de title
        //     Récupérer la valeur de category_id
        //     Récupérer la valeur de author
        //     Récupérer la valeur de tags
        //     Récupérer la valeur de body
        //     Récupérer la valeur de image
        //     Si title est vide
        //         Alors
        //             Afficher un message d'erreur
        //         Sinon
        //             Insérer le post dans la table post
        //             Si le post est inséré
        //                 Alors
        //                     Afficher un message de succès
        //                 Sinon
        //                     Afficher un message d'erreur
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
                            <input type="text" name="title" value="" class="medium" />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>Categories</label>
                        </td>
                        <td>
                            <select id="select" name="category_id">
                                <option>Selectionner une catégorie</option>
                                <?php
                                // Récupérer les catégories de la table category
                                // Tant que les catégories sont récupérées
                                //     Afficher les catégories dans la liste déroulante
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Télécharger une image</label>
                        </td>
                        <td>
                            <img src="" height="60px" width="100px" alt="">
                            <input type="file" name="image" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Nom de l'auteur</label>
                        </td>
                        <td>
                            <input type="text" name="author" value="" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Tags</label>
                        </td>
                        <td>
                            <input type="text" name="tags" value="" />
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top; padding-top: 9px;">
                            <label>Contenu</label>
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
?>