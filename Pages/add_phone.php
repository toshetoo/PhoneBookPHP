<?php
session_start();
if(!isset($_SESSION['id'])){
    header("Location: error.php");
}
else {
    if(isset($_POST['type']) && isset($_POST['number']) && isset($_POST['contactId'])) {

        require_once('../Repositories/PhoneRepository.php');
        require_once('../Entities/Phone.php');

        $phone = new Phone();

        $phone->type = htmlspecialchars($_POST['type']);
        $phone->number = htmlspecialchars($_POST['number']);
        $phone->contactId = htmlspecialchars($_POST['contactId']);

        $repo = new PhoneRepository();
        $repo->save($phone);

        header("Location: phones.php");
    }
    else {
        require_once "header.php";

        echo '<div class="section">';

        if (isset($_SESSION['id']) && $_SESSION['isAdmin'] == 1) {
            echo ' <div class="left">
                        <h1>Add phone</h1>
                        <form method="post" action="add_phone.php">

                            <input type="text" name="type" placeholder="Type"/>
                            <input type="text" name="number" placeholder="Number"/>
                            <input type="text" name="contactId" placeholder="Contact ID"/>
                            <input type="submit" value="Save"/>
                        </form>
                    </div>';
        }
    }
}