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

        $user->username = htmlspecialchars($_POST['username']);
        $user->firstName = htmlspecialchars($_POST['firstName']);
        $user->lastName = htmlspecialchars($_POST['lastName']);
        $user->password = htmlspecialchars($_POST['password']);
        $user->isAdmin = htmlspecialchars($_POST['isAdmin']);

        $repo = new UserRepository();
        $repo->save($user);

        header("Location: index.php");
    }
}
