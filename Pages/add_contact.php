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

        $contact->firstName = htmlspecialchars(trim($_POST['firstName']));
        $contact->lastName = htmlspecialchars(trim($_POST['lastName']));
        $contact->userId = htmlspecialchars(trim($_POST['userId']));

        $repo = new ContactRepository();
        $repo->save($contact);

        header("Location: contacts.php");
    }
    else {

        require_once "header.php";
        $userRepo = new UserRepository();
        $users = $userRepo->getAll();

        echo '<div class="section">';
        if (isset($_SESSION['id']) && $_SESSION['isAdmin'] == 1) :
            ?>

            <div class="left">
                <h1>Add Contact</h1>

                <form method="post" action="add_contact.php">
                    <input type="text" name="firstName" placeholder="First Name" required />
                    <input type="text" name="lastName" placeholder="Last Name" required/>
                    <select name="userId" required >
                        <?php
                        foreach ($users as $key=>$value) :
                            ?>
                            <option value="<?= $users[$key]->id ?>"  > <?= $users[$key]->firstName . ' '. $users[$key]->lastName ?> </option>
                            <?php
                        endforeach;

                        ?>
                    </select>
                    <input type="submit" value="Save"/>
                </form>
            </div>';

            <?php
        endif;
    }
}
