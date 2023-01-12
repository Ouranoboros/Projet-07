<?php
// Inclure le fichier header.php
include 'includes/header.php';
// Inclure le fichier sidebar.php
include 'includes/sidebar.php';

include 'includes/footer.php';
?>

<?php
// Inclure la variable $db = new Database();
$db = new Database();

if (isset($_GET["del_postid"])){
    $post_id = $_GET['del_postid'];
    $im = $db->select("SELECT * FROM post WHERE id = $post_id");
    $im = $im->fetch_assoc()['image'];
    $db->delete("DELETE FROM post WHERE id = $post_id");
    unlink($im);
    echo "<script> alert('Le post à bien été supprimé.')</script>";
}
?>