<?php
require_once('../Repositories/PhoneRepository.php');
require_once('../Entities/Phone.php');
if(isset($_GET['id'])){
    $phone = new Phone();
    $repo = new PhoneRepository();
    $phone = $repo->getById($_GET['id']);
}
?>

    <form method="POST" action="edit_phone.php">
        <input type="hidden" name="id" value=<?=$phone->id?> />
        <label for="type">Type: </label><input type="text" name="type" value=<?=$phone->type?> />
        <input type="text" name="number" value=<?=$phone->number?> />
        <input type="text" name="contactId" value=<?=$phone->contactId?> />

        <input type="submit" value="Edit" />

    </form>

<?php

if(isset($_POST['id'])){
    $repo = new PhoneRepository();
    $phone = new Phone();

    $phone->id = $_POST['id'];
    $phone->type  = $_POST['type'];
    $phone->number  = $_POST['number'];
    $phone->contactId = $_POST['contactId'];

    $repo->save($phone);
    header("Location: index.php");
}
?>