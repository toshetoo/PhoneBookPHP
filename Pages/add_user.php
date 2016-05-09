<?php
session_start();
if(!isset($_SESSION['id'])){
    header("Location: error.php");
}
else
{
    if(isset($_POST['username']) && isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['password']) && isset($_POST['isAdmin'])) {
        require_once('../Repositories/UserRepository.php');
        require_once('../Entities/User.php');
        var_dump($_SESSION);

        $user = new User();

        $user->username = htmlspecialchars(trim($_POST['username']));
        $user->firstName = htmlspecialchars(trim($_POST['firstName']));
        $user->lastName = htmlspecialchars(trim($_POST['lastName']));
        $user->password = htmlspecialchars(trim($_POST['password']));
        $user->isAdmin = htmlspecialchars(trim($_POST['isAdmin']));

        $repo = new UserRepository();
        $repo->save($user);

        header("Location: users.php");
    }
    else {
        require_once "header.php";

        echo '<div class="section">';

        if(isset($_SESSION['id']) && $_SESSION['isAdmin']==1) :
            ?>

            <div class="left">
                        <h1>Add user</h1>
                        <form method="post" action="add_user.php">

                            <input type="text" name="username" placeholder="Username" required />
                            <input type="text" name="firstName" placeholder="First Name" required />
                            <input type="text" name="lastName" placeholder="Last Name" required />
                            <input type="text" name="password" placeholder="Password" required />
                            <select name="isAdmin" required >
                                <option value="0" > User </option>
                                <option value="1" > Admin </option>
                            </select>
                            <input type="submit" value="Save"/>
                        </form>
                    </div>
        <?php
        endif;
    }
}
