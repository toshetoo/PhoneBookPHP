<?php

require_once('../Repositories/UserRepository.php');
require_once('../Entities/User.php');

if(isset($_POST['username']) && isset($_POST['password'])){
    session_start();
    $username = htmlspecialchars(trim($_POST['username']));
    $password = htmlspecialchars(trim($_POST['password']));

    $user = new User();
    $repo = new UserRepository();
    $user = $repo->getByUsernameAndPass($username,$password);

    if($user->id!=0){
        $_SESSION['id'] = $user->id;
        $_SESSION['firstName'] = $user->firstName;
        $_SESSION['lastName'] = $user->lastName;
        $_SESSION['username'] = $user->username;
        $_SESSION['password'] = $user->password;
        $_SESSION['isAdmin'] = $user->isAdmin;

        header("Location: index.php");
    }
    else{
        $msg = "Invalid username or password!";
        header("Location: login.php?error=$msg");
    }

}
else {

    require_once "header.php";
    if (!isset($_SESSION['id'])) :


        ?>
        <div class="login">
                    <form action="login.php" method="POST">
						<table>
							<tr>
								<td><label>Username:</label></td>
								<td><input type="text" name="username"/></td>
							</tr>
							<tr>
								<td><label>Password:</label></td>
								<td><input type="password" name="password"/></td>
							</tr>
                            <tr>
                                <td colspan="2">
                                    <?php
                                        if(isset($_GET['error'])){
                                            echo '<div class="error-message">' . $_GET['error'] . '</div>';
                                        }
                                    ?>
                                </td>
                            </tr>
							<tr>
								<td colspan="2">
									<input type="submit" value="Login" class="btnLogin"/>
								</td>
							</tr>
						</table>
					</form>
				</div>'
        <?php
    endif;
    require_once "footer.php";
}

