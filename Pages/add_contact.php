<?php
session_start();
include "filter.php";
require_once('../Repositories/ContactRepository.php');
require_once('../Entities/Contact.php');

$contact = new Contact();

$contact->firstName = $_POST['firstName'];
$contact->lastName = $_POST['lastName'];
$contact->userId = $_POST['userId'];

$repo = new ContactRepository();
$repo->save($contact);

header("Location: index.php");