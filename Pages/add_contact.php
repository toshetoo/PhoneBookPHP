<?php
session_start();
if(!isset($_SESSION['id'])){
    header("Location: error.php");
}
else {
    require_once('../Repositories/ContactRepository.php');
    require_once('../Entities/Contact.php');

    if(isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['userId'])) {
        $contact = new Contact();

        $contact->firstName = htmlspecialchars($_POST['firstName']);
        $contact->lastName = htmlspecialchars($_POST['lastName']);
        $contact->userId = htmlspecialchars($_POST['userId']);

        $repo = new ContactRepository();
        $repo->save($contact);

        header("Location: index.php");
    }
}