
<?php

// Inclure le fichier Session.php depuis le dossier classes
include '../classes/Session.php';
// Inclure la session et le checkLogin
Session::checkLogin();
?>
<?php
// Inclure le fichier config.php depuis le dossier config
include '../config/config.php';
// Inclure le fichier Database.php depuis le dossier db
include '../db/Database.php';
// Inclure le fichier format.php depuis le dossier classes
include '../classes/format.php';
?>

<?php
// Inclure la variable $db = new Database();
$db = new Database();
// Inclure la variable $format = new Format();
$format = new Format();
?>
<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>

<body>
    <div class="container">
        <section id="content">
            <?php
            // Si la méthode de requête est POST
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Alors
            //     Récupérer la valeur de username
                $username = $format->validation($_POST['username']);
            //     Récupérer la valeur de password
                $password = $format->validation(md5($_POST['password']));



             //    Si username et password sont égaux aux valeurs récupérées
                $username = mysqli_real_escape_string($db->link, $username);
                $password = mysqli_real_escape_string($db->link, $password);

            //     Récupérer la valeur de username et password
                $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
               
            //     Récupérer les données de la table user
               
                $result = $db->select($query);
            //     Tant que les données sont récupérées
            
                if ($result != false) {
                    $value = mysqli_fetch_array($result);
                    $row = mysqli_num_rows($result);

                    if ($row > 0) {
            //             Alors
            //      Définir la session login
                        Session::set("login", true);
            //      Définir la session username
                        Session::set("username", $value['username']);
            //      Définir la session userid                       
                        Session::set("userid", $value['id']);
            //      Rediriger vers index.php
                        header('location:index.php');
                    }
                    
            //      Sinon
            else
            {
            //      Afficher un message d'erreur
                        echo "<script>alert('No result !');</script>";
                    }
                } 
            //     Sinon
                else {            
            //         Afficher un message d'erreur
                    echo "<script>alert('Username et mot de passe ne corresponde pas !');</script>";
                }
            }
            ?>
            <form action="" method="post">
                <h1>Connexion Administrateur</h1>
                <div>
                    <input type="text" placeholder="Identifiant" required="" name="username" />
                </div>
                <div>
                    <input type="password" placeholder="Mot de passe" required="" name="password" />
                </div>
                <div>
                    <input type="submit" value="Se connecter" name="button" />
                </div>
            </form><!-- form -->
            <div class="button">
                <a href="#">Formation avec projet en direct</a>
            </div><!-- button -->
        </section><!-- content -->
    </div><!-- container -->
</body>

</html> 
