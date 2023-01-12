<?php
// Inclure le fichier header.php
include 'includes/header.php';
// Inclure le fichier sidebar.php
include 'includes/sidebar.php';
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Category List</h2>
        <?php
        if (isset($_GET['delid'])) {  // Si la méthode de requête est GET
            $delid = $_GET['delid'];  //     Récupérer la valeur de delid
            $delete_query = "DELETE FROM category WHERE category_id= '$delid'";   //     Supprimer la catégorie de la table category
            $delete_data = $db->delete($delete_quey);
            if ($delete_data) {   //     Si la catégorie est supprimée  // Alors
                echo "<span style='color:green;font-size:18px;'>Catégorie supprimée avec succès</span>";  //  Afficher un message de succès
            } else {
                echo "<span style='color:red;front-size:18px;'>Catégorie non supprimée</span>";  //  Afficher un message d'erreur
            }
        }
        ?>
        <div class="block">
            <table class="data display datatable" id="example">
                <thead>
                    <tr>
                        <th>N. De série</th>
                        <th>Nom Catégorie</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Récupérer toutes les catégories de la table category
                    $query = "SELECT * FROM  category ORDER BY category_id DESC ";
                    $category = $db->select($query);
                    if ($category) {
                    // Tant que la catégorie est récupérée
                    //     Afficher la catégorie
                        $i = 0;
                        while ($result = $category->fetch_assoc()) {
                            $i++;
                    ?>  
                    <tr class="odd gradeX">
                        <td><?php echo $i; ?></td>              
                        <td><?php echo $result['name']; ?></td>
                        <td><a href="edit_category.php?catid=<?php echo $result['category_id']; ?>">Modifier</a>
                            || <a onclick="return confirm('Êtes-vous sûr de vouloir supprimer?')" href="?delid=<?php echo $result['category_id']; ?>">Supprimer</a></td>
                    </tr>
                    <?php
                        }  
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        setupLeftMenu();

        $('.datatable').dataTable();
        setSidebarHeight();


    });
</script>

<?php
include 'includes/footer.php'; // Inclure le fichier footer.php
?>
