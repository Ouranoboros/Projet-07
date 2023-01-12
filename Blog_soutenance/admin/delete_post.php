<?php
// Inclure le fichier header.php
include 'includes/header.php';
// Inclure le fichier sidebar.php
include 'includes/sidebar.php';
?>

<?php
// Inclure la variable $db = new Database();
$db = new Database();


if (isset($_GET['del_postid'])) {    // Si la méthode de requête est GET
    $del_postid = $_GET['del_postid'];  //   Récupérer la valeur de del_postid
}
if ($del_postid == '0')  // Si del_postid est vide 
//         Alors
header("Location: .$post_list.php"); // Rediriger vers post_list.php
die();
//     Sinon

if (isset($_GET['delete_id'])) {  
    $delete_id = $_GET['delete_id'];  //  Récupérer la valeur de delete_id
}
//   Récupérer les données de la table post
$query = "SELECT * FROM post";
$requete = $db->select($query);
//   Tant que les données sont récupérées
while ($donnees = $requete->fetch()) {

}

$imglink = $_GET['imglink']; //   Récupérer la valeur de imglink
unlink('../images' . $imglink);    //   Supprimer l'image
$delete_query = "DELETE * FROM post";  //->Supprimer les données de la table post                                      
if ($delete_query){                  { // Si les données sont supprimées
echo "<span style='color:red;front-size:18px;'>Données de la table supprimées</span>";  //   Afficher un message de succès
}
}
header("Location: .$post_list.php");                  //    Rediriger vers post_list.php
die();
 else{ //   Sinon
echo  "<span style='color:red;front-size:18px;'>ERROR !</span>";  //    Afficher un message d'erreur
 }

header("Location: .$post_list.php");   //  Rediriger vers post_list.php
die();
?>
