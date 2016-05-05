<?php
session_start();
require_once('../Repositories/UserRepository.php');
require_once('../Repositories/ContactRepository.php');
require_once('../Repositories/PhoneRepository.php');
require_once('../Entities/Connection.php');
require_once('../Entities/User.php');
require_once('../Entities/Contact.php');
require_once('../Entities/Phone.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>React - Bootstrap Theme</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<!-- stylesheets -->
	<link rel="stylesheet" type="text/css" href="../CSS/bootstrap-theme.css">
	<link rel="stylesheet" type="text/css" href="../CSS/bootstrap.min.css">
	<link rel="stylesheet" href="../CSS/styles.css" type="text/css">

	<!-- javascript -->
	<script src="../js/bootstrap.min.js"></script>

</head>
<body id="home">
<header class="navbar navbar-inverse hero" role="banner">
	<div class="container">
		<div class="navbar-header">
			<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<?php
			if(isset($_SESSION['id'])) {
				echo '<a href="index.php" class="navbar-brand">PhoneBook Ultimate - Hello, ' . $_SESSION['firstName'] . '!</a>';
			}
			else{
				echo '<a href="index.php" class="navbar-brand">PhoneBook Ultimate</a>';
			}
			?>
		</div>
		<nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
			<ul class="nav navbar-nav navbar-right">
				<a href="users.php" class="navbar-brand">Users</a>
				<a href="contacts.php" class="navbar-brand">Contacts</a>
				<a href="phones.php" class="navbar-brand">Phones</a>
				<?php
					if(isset($_SESSION['id'])){
						echo '<a href="logout.php" class="navbar-brand">Logout</a>';
					}
					else {
						echo '<a href="login.php" class="navbar-brand">Login</a>';
					}
				?>
			</ul>
		</nav>
	</div>
</header>

<div id="hero">
<div id="wrapper">
    <div id="left">

    </div>