<?php
session_start();
if(!isset($_SESSION['id'])){
    header("Location: error.php");
}
else {
    require_once('../Repositories/ContactRepository.php');
    require_once('../Entities/Contact.php');
    if (isset($_GET['id'])) {
        $contact = new Contact();
        $repo = new ContactRepository();
        $contact = $repo->getById($_GET['id']);
    }
    ?>

    <form method="POST" action="edit_contact.php">
        <input type="hidden" name="id" value=<?= $contact->id ?> />
        <label for="firstName">First name: </label><input type="text" name="firstName"
                                                          value=<?= $contact->firstName ?> />
        <input type="text" name="lastName" value=<?= $contact->lastName ?> />
        <input type="text" name="userId" value=<?= $contact->userId ?> />

        <input type="submit" value="Edit"/>

    </form>

    <?php

    if (isset($_POST['id'])) {
        $repo = new ContactRepository();
        $contact = new Contact();

        $contact->id = $_POST['id'];
        $contact->firstName = $_POST['firstName'];
        $contact->lastName = $_POST['lastName'];
        $contact->userId = $_POST['userId'];

        $repo->save($contact);
        header("Location: index.php");
    }
}
?>