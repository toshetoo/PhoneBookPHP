<?php
session_start();
if(!isset($_SESSION['id'])){
    header("Location: error.php");
}
else {
    require_once('../Repositories/ContactRepository.php');
    require_once('../Entities/Contact.php');

    $contact = new Contact();
    $repo = new ContactRepository();
    $contact = $repo->getById($_GET['id']);

    $repo->delete($contact);

    header("Location: contacts.php");
}