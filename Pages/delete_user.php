<?php
include "filter.php";
session_start();
require_once('../Repositories/UserRepository.php');
require_once('../Entities/User.php');

$user = new User();
$repo = new UserRepository();
$user = $repo->getById($_GET['id']);

$repo->delete($user);

header("Location: index.php");