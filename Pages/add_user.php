<?php
session_start();
include "filter.php";
require_once('../Repositories/UserRepository.php');
require_once('../Entities/User.php');
var_dump($_SESSION);

$user = new User();

$user->username = $_POST['username'];
$user->firstName = $_POST['firstName'];
$user->lastName = $_POST['lastName'];
$user->password = $_POST['password'];
$user->isAdmin = $_POST['isAdmin'];

$repo = new UserRepository();
$repo->save($user);

header("Location: index.php");