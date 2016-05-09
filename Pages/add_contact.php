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

        header("Location: contacts.php");
    }
    else {

        require_once "header.php";

        echo '<div class="section">';
        if (isset($_SESSION['id']) && $_SESSION['isAdmin'] == 1) :
            ?>

            <div class="left">
                <h1>Add Contact</h1>

                <form method="post" action="add_contact.php">
                    <input type="text" name="firstName" placeholder="First Name"/>
                    <input type="text" name="lastName" placeholder="Last Name"/>
                    <input type="text" name="userId" placeholder="User ID"/>
                    <input type="submit" value="Save"/>
                </form>
            </div>';

            <?php
        endif;
    }
}
