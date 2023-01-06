<!DOCTYPE html>
<html lang="en">
<?php
	try {
		$bdd = new PDO('mysql:host=localhost;dbname=users_info;charset=utf8','root');
		
	} catch (Exception $e) {
		die('Erreur : ' . $e ->
	getMessage()); } ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body><style>
table, th, td {
  border: 1px solid black;
}
</style>
    <?php
        $result = $bdd->query("SELECT * FROM users");


          echo "</table>";
          echo '<table>';
          echo '<tr>';
          echo '  <th>Name </th>';
          echo '  <th>Email </th>';
          echo '  <th>Phone number </th>';
          echo '</tr>';  

          while ($Row = $result->fetch()) {
              echo '<tr><td>' . $Row['name'] . '</td><td>' . $Row['email'] . '</td><td>' . $Row['phone'] . '</td></tr>';
          }
          echo '</table>';
    ?>
</body>
</html>


boutton ajouter -> page ajouter 
page modifier -> page d'inputs
pour chaque user 