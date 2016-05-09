<?php
session_start();
if(!isset($_SESSION['id'])){
    header("Location: error.php");
}
else {
    require_once "header.php";
    require_once('../Repositories/ContactRepository.php');
    require_once('../Entities/Contact.php');

    if (isset($_GET['id'])) {
        $contact = new Contact();
        $repo = new ContactRepository();
        $contact = $repo->getById($_GET['id']);

        $userRepo = new UserRepository();
        $users = $userRepo->getAll();
    }
    ?>

    <form method="POST" action="edit_contact.php">
        <input type="hidden" name="id" value="<?= $contact->id ?>" required />
        <label for="firstName">First name: </label>
        <input type="text" name="firstName" value="<?= $contact->firstName ?>" required />
        <label for="lastName">Last name: </label>
        <input type="text" name="lastName" value="<?= $contact->lastName ?>" required />
        <label for="userId">User: </label>
        <select name="userId" required >
            <?php
            foreach ($users as $key=>$value) :
                ?>
                <option value="<?= $users[$key]->id ?>" <?php if($contact->userId==$users[$key]->id) {echo 'selected';} ?> > <?= $users[$key]->firstName . ' '. $users[$key]->lastName ?> </option>
                <?php
            endforeach;

            ?>
        </select>

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
        header("Location: contacts.php");
    }
}
?>