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
<html>
<head>
    <link rel="stylesheet" href="../CSS/styles.css" type="text/css">
</head>

<body>
<div id="wrapper">
    <div id="left">
        <?php
        if(isset($_SESSION['id'])){
            echo "Welcome " . $_SESSION['firstName'];
            echo '<div> <a href="logout.php">Exit </a></div>';
        }
        else{
            echo '<form action="login.php" method="POST">
						<table>
							<tr>
								<td>Username:</td>
								<td><input type="text" name="username"/></td>
							</tr>
							<tr>
								<td>Password</td>
								<td><input type="password" name="password"/></td>
							</tr>
							<tr>
								<td>
									<input type="submit" value="Login" id="btnLogin"/>
								</td>
							</tr>
						</table>
					</form>';
        }
        ?>
    </div>