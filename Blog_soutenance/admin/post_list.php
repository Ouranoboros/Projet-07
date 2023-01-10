<?php
// Inclure le fichier header.php
include 'Blog_soutenance/includes/header.php';
// Inclure le fichier sidebar.php
include 'Blog_soutenance/includes/sidebar.php';
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Post List</h2>
        <div class="block">
            <table class="data display datatable" id="example">
                <thead>
                    <tr>
                        <th width="5%">SL No</th>
                        <th width="13%">Titre du post</th>
                        <th width="25%">Description</th>
                        <th width="10%">Categorie</th>
                        <th width="10%">Image</th>
                        <th width="10%">Autheur</th>
                        <th width="5%">Tags</th>
                        <th width="10%">Date</th>
                        <th width="12%"> Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Récupérer les données de la table post
                    $query = "SELECT * FROM post";
                    $requete = $db->select($query);
                    // Tant que les données sont récupérées
                    while ($donnees = $requete->fetch()) {
                    //     Afficher les données
                    ?>
                    <tr class="odd gradeX">
                        <td><?php $donnees['id']; ?></td>
                        <td><?php $donnees['title']; ?></td>
                        <td><?php $donnees['body']; ?></td>
                        <td><?php $donnees['category_id']; ?></td>
                        <td><img src="<?php $donnees['image']; ?>" height="40px" width="80px" alt=""></td>
                        <td><?php $donnees['author']; ?></td>
                        <td><?php $donnees['tags']; ?></td>
                        <td><?php $donnees['date']; ?></td>
                        <td><a href="edit_post.php?edit_postid=">Modifier</a>
                            || <a onclick="return confirm('Etes vous sur de vouloir supprimer ?')" href="delete_post.php?del_postid=">Supprimer</a></td>
                    </tr>
                    <?php 
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
// Inclure le fichier footer.php
include 'Blog_soutenance/includes/footer.php';
?>
