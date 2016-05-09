<?php
session_start();
if(!isset($_SESSION['id'])){
    header("Location: error.php");
}
else {
    require_once "header.php";
    require_once('../Repositories/UserRepository.php');
    require_once('../Entities/User.php');
    if (isset($_GET['id'])) {
        $user = new User();
        $repo = new UserRepository();
        $user = $repo->getById($_GET['id']);
    }
    ?>
    <form method="POST" action="edit_user.php">
        <input type="hidden" name="id" value="<?= $user->id ?>" required />
        <label for="firstName">First name: </label>
        <input type="text" name="firstName" value="<?= $user->firstName ?>" required />
        <label for="lastName">Last name: </label>
        <input type="text" name="lastName" value="<?= $user->lastName ?>" required />
        <label for="username">Username: </label>
        <input type="text" name="username" value="<?= $user->username ?>" required />
        <label for="password">Password: </label>
        <input type="text" name="password" value="<?= $user->password ?>" required />
        <label for="isAdmin">Admin: </label>
        <select name="isAdmin" required >
            <option value="0" <?php if($user->isAdmin==0) {echo 'selected';} ?> > User </option>
            <option value="1" <?php if($user->isAdmin==1) {echo 'selected';} ?> > Admin </option>
        </select>

        <input type="submit" value="Edit"/>

    </form>
    <?php
    if (isset($_POST['id'])) {
        $repo = new UserRepository();
        $user = new User();

        $user->id = htmlspecialchars(trim($_POST['id']));
        $user->firstName = htmlspecialchars(trim($_POST['firstName']));
        $user->lastName = htmlspecialchars(trim($_POST['lastName']));
        $user->username = htmlspecialchars(trim($_POST['username']));
        $user->password = htmlspecialchars(trim($_POST['password']));
        $user->isAdmin = htmlspecialchars(trim($_POST['isAdmin']));

        $repo->save($user);


        //header("Location: users.php");
        echo "<script>location.href = 'http://localhost/PhoneBookPHP/Pages/users.php';</script>";


    }
}
?>