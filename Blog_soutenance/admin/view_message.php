<?php
// Inclure le fichier header.php
// Inclure le fichier sidebar.php
?>
<?php
// si la méthode de requête est GET
// Alors
//     Récupérer la valeur de msg_id
//     Si msg_id est vide
//         Alors
//             Rediriger vers inbox.php
//     Sinon
//         Récupérer la valeur de id
// Sinon
//     Rediriger vers inbox.php
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Voir les messages</h2>
        <?php
        // Si la méthode de requête est POST
        // Alors
        //     Rediriger vers inbox.php
        ?>
        <div class="block">
            <?php
            // Selecter tous les messages de la table contact
            // Si le message est sélectionné
            // Alors
            //     Tant que le message est sélectionné
            //         Alors
            //             Afficher le message
            ?>
            <form action="" method="post" enctype="multipart/form-data">
                <table class="form">
                    <tr>
                        <td>
                            <label>Nom</label>
                        </td>
                        <td>
                            <input type="text" readonly value="" class="medium" />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>Email</label>
                        </td>
                        <td>
                            <input type="text" readonly value="" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Objet</label>
                        </td>
                        <td>
                            <input type="text" readonly value="" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Message</label>
                        </td>
                        <td>
                            <textarea style="width: 60%" readonly rows="12"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" Value="ok" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<?php
// Inclure le fichier footer.php
?>