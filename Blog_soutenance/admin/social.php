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
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Alors
        //     Récupérer la valeur de facebook
        $facebook = $format->validation($_POST['facebook']);
        //     Récupérer la valeur de github
        $github = $format->validation($_POST['github']);
        //     Récupérer la valeur de skype
        $skype = $format->validation($_POST['skype']);
        //     Récupérer la valeur de linkedin
        $linkedin = $format->validation($_POST['linkedin']);
        //     Récupérer la valeur de google
        $google = $format->validation($_POST['google']);

        //     Si facebook, github, skype, linkedin ou google est vide
        //         Alors
        //             Afficher un message d'erreur
        //         Sinon
       if (empty($facebook or $github or $skype or $linkedin or $google ))
       {echo "Un champ est vide attention step bro";

        }
        //             Mettre à jour les médias sociaux dans la table tbl_social
        //             Si les médias sociaux sont mis à jour
        //                 Alors
        //                     Afficher un message de succès
        //                 Sinon
        //                     Afficher un message d'erreur
        
         if  ($facebook != NULL) {

             $query = "UPDATE social SET facebook = '$facebook'";
             $result = $db->update($query);
         }
        else{
        
         echo "<span style='color:red;font-size:18px;'> - Attention : le champ facebook est vide</span> <br>";

         }

        // pour github
         if  ($github != NULL) {

            $query = "UPDATE social SET github = '$github'";
            $result = $db->update($query);
        }
        else{
        
            echo "<span style='color:red;font-size:18px;'> - Attention : le champ github est vide</span> <br>";
   
            }
        // pour skype
        if  ($skype != NULL) {

            $query = "UPDATE social SET skype = '$skype'";
            $result = $db->update($query);
        }
        else{
        
            echo "<span style='color:red;font-size:18px;'> - Attention : le champ skype est vide</span> <br>";
   
            }
        // pour linkedin
        if  ($linkedin != NULL) {

            $query = "UPDATE social SET linkedin = '$linkedin'";
            $result = $db->update($query);
        }
        else{
        
            echo "<span style='color:red;font-size:18px;'> - Attention : le champ linkedin est vide</span> <br>";
   
            }


        // pour google
        if  ($google != NULL) {

            $query = "UPDATE social SET google = '$google'";
            $result = $db->update($query);
        }
        else{
            echo "<span style='color:red;font-size:18px;'> - Attention : le champ google est vide</span> <br>";
            }
        }

        ?>

        <div class="block">
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
