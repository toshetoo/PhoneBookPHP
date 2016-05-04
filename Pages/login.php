<?php
session_start();
require_once('../Repositories/UserRepository.php');
require_once('../Entities/User.php');

if(isset($_POST['username']) && isset($_POST['password'])){

    $username = $_POST['username'];
    $password = $_POST['username'];

    $user = new User();
    $repo = new UserRepository();
    $user = $repo->getByUsernameAndPass($username,$password);

    if($user!=null){
        $_SESSION['id'] = $user->id;
        $_SESSION['firstName'] = $user->firstName;
        $_SESSION['lastName'] = $user->lastName;
        $_SESSION['username'] = $user->username;
        $_SESSION['password'] = $user->password;
        $_SESSION['isAdmin'] = $user->isAdmin;

        header("Location: index.php");
    }
    else{
        header("Location: index.php?error=msg");
    }




}
