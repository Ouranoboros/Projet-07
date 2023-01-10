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
        // Si la méthode de requête est GET
        // Alors
        //     Récupérer la valeur de delid
        //     Supprimer la catégorie de la table category
        //     Si la catégorie est supprimée
        //         Alors
        //             Afficher un message de succès
        //         Sinon
        //             Afficher un message d'erreur
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
                    // Tant que la catégorie est récupérée
                    //     Afficher la catégorie
                    ?>
                    <tr class="odd gradeX">
                        <td></td>
                        <td></td>
                        <td><a href="edit_category.php?catid=">Modifier</a>
                            || <a onclick="return confirm('Êtes-vous sûr de vouloir supprimer?')" href="">Supprimer</a></td>
                    </tr>
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
// Inclure le fichier footer.php
include 'includes/footer.php';
?>