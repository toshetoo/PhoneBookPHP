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

        $phone->type = htmlspecialchars(trim($_POST['type']));
        $phone->number = htmlspecialchars(trim($_POST['number']));
        $phone->contactId = htmlspecialchars(trim($_POST['contactId']));

        $repo = new PhoneRepository();
        $repo->save($phone);



        header("Location: phones.php");
    }
    else {
        require_once "header.php";

        $contactRepo = new ContactRepository();
        $contacts = $contactRepo->getAll();

        echo '<div class="section">';

        if (isset($_SESSION['id']) && $_SESSION['isAdmin'] == 1) :
            ?>

            <div class="left">
                <h1>Add phone</h1>
                <form method="post" action="add_phone.php">
                    <label for="type">Type: </label>
                    <select name="type" required >
                        <option value="Home" > Home </option>
                        <option value="Mobile" > Mobile </option>
                        <option value="Fax" > FAX </option>
                    </select> <br>
                    <label for="number">Number: </label>
                    <input type="text" name="number" placeholder="Number" required />
                    <label for="contactId">Contact: </label>
                    <select name="contactId" required >
                        <?php
                        foreach ($contacts as $key=>$value) :
                            ?>
                            <option value="<?= $contacts[$key]->id ?>" > <?= $contacts[$key]->firstName . ' '. $contacts[$key]->lastName ?> </option>
                            <?php
                        endforeach;

                        ?>
                    </select>
                    <input type="submit" value="Save"/>
                </form>
            </div>

            <?php
        endif;
    }
}