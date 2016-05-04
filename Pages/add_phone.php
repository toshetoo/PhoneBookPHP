<?php
session_start();
include "filter.php";
require_once('../Repositories/PhoneRepository.php');
require_once('../Entities/Phone.php');

$phone = new Phone();

$phone->type = $_POST['type'];
$phone->number = $_POST['number'];
$phone->contactId = $_POST['contactId'];

$repo = new PhoneRepository();
$repo->save($phone);

header("Location: index.php");