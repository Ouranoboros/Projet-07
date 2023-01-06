<!DOCTYPE html>
<html lang="en">
	<?php
try {
	$bdd = new PDO('mysql:host=localhost;dbname=users_info;charset=utf8','root');

} catch (Exception $e) {
	die('Erreur : ' . $e ->
	getMessage()); } ?>

	<head>
		<!-- Required meta tags-->
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<meta name="description" content="Colorlib Templates" />
		<meta name="author" content="Colorlib" />
		<meta name="keywords" content="Colorlib Templates" />

		<!-- Title Page-->
		<title>Au Register Forms by Colorlib</title>

		<!-- Icons font CSS-->
		<link
			href="vendor/mdi-font/css/material-design-iconic-font.min.css"
			rel="stylesheet"
			media="all"
		/>
		<link
			href="vendor/font-awesome-4.7/css/font-awesome.min.css"
			rel="stylesheet"
			media="all"
		/>
		<!-- Font special for pages-->
		<link
			href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
			rel="stylesheet"
		/>

		<!-- Vendor CSS-->
		<link href="vendor/select2/select2.min.css" rel="stylesheet" media="all" />
		<link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all" />

		<!-- Main CSS-->
		<link href="style.css" rel="stylesheet" media="all" />
	</head>

	<body>
		<div class="page-wrapper bg-gra-01 p-t-180 p-b-100 font-poppins">
			<div class="wrapper wrapper--w780">
				<div class="card card-3">
					<div class="card-heading"></div>
					<div class="card-body">
						<h2 class="title">Registration Info</h2>
						<form method = "POST" id="form">
							<div class="input-group">
								<input
									class="input--style-3"
									type="text"
									placeholder="Name"
									name="name"
									id="name"
								/>
								<br />
								<small></small>
							</div>
							<div class="input-group">
								<input
									class="input--style-3 js-datepicker"
									type="text"
									placeholder="Birthdate"
									name="birthday"
									id="birthday"
								/>
								<i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
								<br />
								<small></small>
							</div>
							<div class="input-group">
								<input
									class="input--style-3"
									type="email"
									placeholder="Email"
									name="email"
									id="email"
								/>
								<br />
								<small></small>
							</div>
							<div class="input-group">
								<input
									class="input--style-3"
									type="text"
									placeholder="Phone"
									name="phone"
									id="phone"
								/>
								<br />
								<small></small>
							</div>
							<div class="input-group">
								<input
									class="input--style-3"
									type="password"
									placeholder="password"
									name="password"
									id="password"
								/>
								<br />
								<small></small>
							</div>
							<div class="p-t-10">
								<button class="btn btn--pill btn--green" type="submit" name="submit">
									Submit
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

<?php
if(isset($_POST['submit'])){

    $name = $_POST["name"];
    $birthday = $_POST["birthday"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $password = $_POST["password"];

    $in_bdd = $bdd->query("SELECT * FROM users WHERE email = '$email' OR phone='$phone'");

    $bol  = $in_bdd->fetch();
    echo gettype($bol);

    $hash = password_hash("$password", PASSWORD_DEFAULT);

    if ("$bol"==null) {
        echo "<script>alert('Votre user est enregistré')</script>";
        $bdd->exec("INSERT INTO `users` (`id`, `name`, `birthday`, `email`, `phone`, `password`) VALUES (NULL, '$name', '$birthday', '$email', '$phone','$hash')");
        header("location: ./login.php");

	}

    else {
        echo "<script>alert('Vous avez utilisé une adresse email ou un numéro déjà présent')</script>";
    }

}
?>
		<!-- Jquery JS-->
		<script type="text/javascript" src="test.js"></script>

		<script src="vendor/jquery/jquery.min.js"></script>
		<!-- Vendor JS-->
		<script src="vendor/select2/select2.min.js"></script>
		<script src="vendor/datepicker/moment.min.js"></script>
		<script src="vendor/datepicker/daterangepicker.js"></script>

		<!-- Main JS-->
		<script src="global.js"></script>
	</body>
	<!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
<!-- end document-->
