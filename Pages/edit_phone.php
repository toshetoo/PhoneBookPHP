<?php
session_start();
if(!isset($_SESSION['id'])){
    header("Location: error.php");
}
else {
    require_once "header.php";
    require_once('../Repositories/PhoneRepository.php');
    require_once('../Entities/Phone.php');
    if (isset($_GET['id'])) {
        $phone = new Phone();
        $repo = new PhoneRepository();
        $phone = $repo->getById($_GET['id']);

        $contactRepo = new ContactRepository();
        $contacts = $contactRepo->getAll();
    }
    ?>

    <form method="POST" action="edit_phone.php">
        <input type="hidden" name="id" value="<?= $phone->id ?>" />
        <label for="type">Type: </label>
        <input type="text" name="type" value="<?= $phone->type ?>" />
        <label for="number">Number: </label>
        <input type="text" name="number" value="<?= $phone->number ?>" />
        <label for="contactId">Contact: </label>
        <select name="contactId">
            <?php
                foreach ($contacts as $key=>$value) :
            ?>
                    <option value="<?= $contacts[$key]->id ?>" <?php if($phone->contactId==$contacts[$key]->id) {echo 'selected';} ?> > <?= $contacts[$key]->firstName . ' '. $contacts[$key]->lastName ?> </option>
             <?php
                endforeach;

            ?>
        </select>

        <input type="submit" value="Edit"/>

    </form>

    <?php

    if (isset($_POST['id'])) {
        $repo = new PhoneRepository();
        $phone = new Phone();

        $phone->id = $_POST['id'];
        $phone->type = $_POST['type'];
        $phone->number = $_POST['number'];
        $phone->contactId = $_POST['contactId'];

        $repo->save($phone);
        header("Location: phones.php");
    }
}
?>