<?php
// Inclure le fichier header.php
include 'includes/header.php';
// Inclure le fichier sidebar.php
include 'includes/sidebar.php';
?>
<style>
    .left {
        float: left;
        width: 60%;
    }

    .right {
        float: left;
        width: 40%;
    }

    .right img {
        height: 140px;
        width: 150px;
    }
</style>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Mettre à jour le titre et la description du site</h2>
        <!--            For Update website Title & Logo-->
        <?php

        // Si la méthode de requête est POST

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Alors
        //     Récupérer la valeur de title
        $title = $format->validation($_POST['title']);
        //echo "<script>alert('$title');</script>";
        //     Récupérer la valeur de logo
        
        $logo = ($_FILES['logo']);
        $logo_name = $logo['name'];
        $logo_size = $logo['size']; 
        $logo_type = $logo['type']; 
        $div = explode('.', $logo_name);
        $file_ext = strtolower(end($div));
        //     Si title est vide
        //$logo = gettype($logo);
        //echo "<script>alert('$logo')</script>";

        if ($title == '')
        {
            //         Alors
            //             Afficher un message d'erreur
            echo "<span class='success'>Vous n'avez pas entré de titre</span>";
        }
        //         Sinon
        else {
            //             Si logo est vide
            if ($logo_name == '')
            {
                //                 Alors
                //                     Mettre à jour le titre dans la table title
                $query = "UPDATE title SET title = '$title'";
                $db->update($query);
                //                     Si le titre est mis à jour
                //                         Alors
                //                             Afficher un message de succès
                echo "<span class='success'>Titre modifié avec succès</span>";
            }
            //                 Sinon
            else {
                
                $permitted = array('png','jpg','gif');
                
                //                     Si l'extension du logo est permise
                //                         Alors
                //                             Si la taille du logo est inférieure à 1 Mo
                if (in_array($file_ext,$permitted)==1) {
                    //                                 Alors
                    //                                         Alors
                    if ($logo_size < 1048567) {
                        //                                     Déplacer le logo dans le dossier uploads
                        //                                     Mettre à jour le titre et le logo dans la table title_slogan
                        move_uploaded_file($logo['tmp_name'], "uploads/".$logo_name);
                        
                        $query = "UPDATE title SET logo = 'uploads/$logo_name', title = '$title'";
                        $db->update($query);

                        //                                     Si le titre et le logo sont mis à jour
                        echo "<span class='success'>Données modifiée avec succès</span>";

                    }

                }

            }
        }
        }
        ?>
        <!--               For show blog title  & logo from database-->
        <?php
        // Récupérer les données de la table title_slogan
        // Tant que les données sont récupérées
        //     Afficher les données
        ?>
        <div class="block sloginblock">
            <div class="left">
                <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">
                        <tr>
                            <td>
                                <label>Titre du site Web</label>
                            </td>
                            <td>
                                <input type="text" value="" name="title" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Télécharger le logo</label>
                            </td>
                            <td>
                                <input type="file" name="logo" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                            </td>
                            <td>
                                <input type="submit" name="submit" Value="Modifier" />
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            <div class="right">
                <img src="<?php 
                        $query = "SELECT * FROM title";
                        $name = $db->select($query)->fetch_assoc()['logo'];
                        echo "$name"; 

                ?>" alt="logo">
            </div>
        </div>
    </div>
</div>
<div class="clear">
</div>
</div>

<?php
// Inclure le fichier footer.php
include 'includes/footer.php';
?>