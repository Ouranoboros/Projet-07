<!-- 
CONNECT / OPERATIONS (CRUD)

mysql_ => mySQL, veilles, =/=
mysqli_ => mySQL, améliorées, ~
PDO => très sécurisée, mySQL, Oracle, PostgreSQL, +++++++


Activation des erreurs
;extension=php_pdo_firebird.dll
;extension=php_pdo_mssql.dll
;extension=php_pdo_mysql.dll
;extension=php_pdo_oci.dll
;extension=php_pdo_odbc.dll

display_errors = On
 -->

<?php
// Pour la connexion à la base de données il faut :
// HOTE : localhost - sql.monserveur.com
// NOM DE LA BASE : users_info
// LOGIN : root
// MDP : root (pour linux)



// Connexion à la base de données

// try {
//     $bdd = new PDO('mysql:host=localhost;dbname=users_info;charset=utf8', 'root');
// } catch (Exception $e) {
//     die('Erreur : ' . $e->getMessage());
// }


// Lire des informations
// $requete = $bdd->query('SELECT * FROM users');


// $requete = $bdd->query('SELECT * FROM users WHERE prenom = "Imen"');
// echo $requete; En PHP on ne peut pas afficher directement un objet
// Solution créer une boucle

// echo '<table>
//             <tr>
//                 <th>Prénom</th>
//                 <th>Nom</th>
//                 <th>Profession</th>';


// while ($donnees = $requete->fetch()) {
//     // echo $donnees['id'] . ' ' . $donnees['nom'] . ' ' . $donnees['prenom'] . ' ' . $donnees['profession'] . '<br>';
//     // Créer un tableau pour mieux répertorié les données

//     echo '<tr>
//                 <td>' . $donnees['prenom'] . '</td>
//                 <td>' . $donnees['nom'] . '</td>
//                 <td>' . $donnees['profession'] . '</td>
//                 </tr>';
// }
// echo '</tr>
//                 </table>';


// Ajouter un utilisateur
// $requete = $bdd->exec('INSERT INTO users(nom, prenom, profession) VALUES("Zuckerberg", "Mark", "PDG-Facebook")');


// Modifier un utilisateur
// $requete = $bdd->exec('UPDATE users SET profession = "Directeur" WHERE prenom = "Mark"');


// Supprimer un utilisateur
// $requete = $bdd->exec('DELETE FROM users WHERE prenom = "Mark"');

















?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <title>PHP</title>
</head>

<body>
</body>

</html>