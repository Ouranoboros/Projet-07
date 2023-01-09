<?php
// Inclure le fichier Session.php depuis le dossier classes
require '../classes/Session.php';
$test= new Session();
echo "bote";

// Inclure la session et le checkLogin
$test ->checkLogin();  

?>
<?php
// Inclure le fichier config.php depuis le dossier config
require '../config/config.php';

// Inclure le fichier Database.php depuis le dossier db
require '../db/Database.php';

// Inclure le fichier format.php depuis le dossier classes
require '../classes/format.php';

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
            if (isset($_POST["submit"])){
                echo "l";
                // Alors
                //     Récupérer la valeur de username
                $username = $_POST["username"];
                //     Récupérer la valeur de password
                $password = $_POST["password"];
                $command = $db->query("SELECT * FROM user");

            }
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
                    <input type="submit" value="Se connecter" name = "submit"/>
                </div>
            </form><!-- form -->
            <div class="button">
                <a href="#">Formation avec projet en direct</a>
            </div><!-- button -->
        </section><!-- content -->
    </div><!-- container -->
</body>

</html>