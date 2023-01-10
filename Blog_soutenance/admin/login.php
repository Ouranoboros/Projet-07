
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

                $username = $format->validation($_POST['username']);
                $password = $format->validation(md5($_POST['password']));

                $username = mysqli_real_escape_string($db->link, $username);
                $password = mysqli_real_escape_string($db->link, $password);

                $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
                $result = $db->select($query);

                if ($result != false) {
                    $value = mysqli_fetch_array($result);
                    $row = mysqli_num_rows($result);

                    if ($row > 0) {
                        Session::set("login", true);
                        Session::set("username", $value['username']);
                        Session::set("userid", $value['id']);
                        header('location:index.php');
                    } else {
                        echo "<script>alert('No result !');</script>";
                    }
                } else {
                    echo "<script>alert('Username et mot de passe ne corresponde pas !');</script>";
                }
            }

            // Alors
            //     Récupérer la valeur de username
            //     Récupérer la valeur de password
            //     Récupérer les données de la table user
            //     Tant que les données sont récupérées
            //         Récupérer la valeur de username et password
            //         Si username et password sont égaux aux valeurs récupérées
            //             Alors
            //                 Définir la session login
            //                 Définir la session username
            //                 Définir la session userid
            //                 Rediriger vers index.php
            //         Sinon
            //             Afficher un message d'erreur
            //     Sinon
            //         Afficher un message d'erreur
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







            

