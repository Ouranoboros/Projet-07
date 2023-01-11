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

        //     Si title est vide
        //$logo = gettype($logo);
        //echo "<script>alert('$logo')</script>";

            if ($title == '')
            {
                //         Alors
                //             Afficher un message d'erreur
                echo "<span style='color:red;font-size:18px;'> - Attention : Vous n'avez pas mit de titre</span> <br>";
   
            }
            //         Sinon
            else {
                //             Si logo est vide
                if ($logo_name == '')
                {
                    //          Alors
                    //          Mettre à jour le titre dans la table title
                    $query = "UPDATE title SET title = '$title'";
                    //          Si le titre est mis à jour
                    //                         Alors
                    //                             Afficher un message de succès
                    $db = $db->update($query);
                    if ($db){
                        echo "<span style='color:red;font-size:18px;'> - Titre modifié avec succès !</span> <br>";
   
                    } else {
                        //                         Sinon
                        //                             Afficher un message d'erreur
                        echo "alert('Non')";
                    }    

                }  else{
                        //                     Si l'extension du logo est permise
                        echo "('logo_size')";

                        if (getimagesize($logo['tmp_name']))
                        {
                            //                         Alors
                            //                             Si la taille du logo est inférieure à 1 Mo
                            echo "('$logo_size')";
            
                            //                                 Alors
            
                        }
                    }
                    
                
            }
        
        //                 Sinon
    }
        //                                     Déplacer le logo dans le dossier uploads
        //                                     Mettre à jour le titre et le logo dans la table title_slogan
        //                                     Si le titre et le logo sont mis à jour
        //                                         Alors
        //                                             Afficher un message de succès
        //                                         Sinon
        //                                             Afficher un message d'erreur
        //                                 Sinon
        //                                     Afficher un message d'erreur
        //                             Sinon
        //                                 Afficher un message d'erreur
        //                     Sinon
        //                         Afficher un message d'erreur
        
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
                <img src="" alt="logo">
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
