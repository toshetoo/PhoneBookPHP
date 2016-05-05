<?php
session_start();
if(!isset($_SESSION['id'])){
    header("Location: error.php");
}
else {
    require_once('../Repositories/UserRepository.php');
    require_once('../Entities/User.php');

    $user = new User();
    $repo = new UserRepository();
    $user = $repo->getById($_GET['id']);

    $repo->delete($user);

    header("Location: users.php");
}