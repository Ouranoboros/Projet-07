<?php
// Inclure le fichier header.php
// Inclure le fichier sidebar.php
?>

<?php
// Inclure la variable $db = new Database();

// Si la méthode de requête est GET
// Alors
//     Récupérer la valeur de del_postid
//     Si del_postid est vide
//         Alors
//             Rediriger vers post_list.php
//     Sinon
//         Récupérer la valeur de delete_id
//         Récupérer les données de la table post
//         Tant que les données sont récupérées
//             Récupérer la valeur de imglink
//             Supprimer l'image
//         Supprimer les données de la table post
//         Si les données sont supprimées
//             Alors
//                 Afficher un message de succès
//                 Rediriger vers post_list.php
//             Sinon
//                 Afficher un message d'erreur
//                 Rediriger vers post_list.php
?>
