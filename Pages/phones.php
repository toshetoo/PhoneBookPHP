<?php require_once "header.php";

if(!isset($_SESSION['id'])){
    header("Location: error.php");
}
else {

    echo '<div class="left">';

    $contactRepo = new ContactRepository();

    $repo = new PhoneRepository();
    $phones = $repo->getAll();

    if (isset($_SESSION['id']) && $_SESSION['isAdmin'] == 1) :
        ?>

        <h1>List of all phones</h1>
        <table>
            <tr class='head'>
                <td>ID</td>
                <td>Type</td>
                <td>Number</td>
                <td>Contact</td>
                <td>Edit</td>
                <td>Delete</td>
            </tr>
    <?php

    else :
        ?>

        <h1>List of All phones</h1>
        <table>
            <tr class='head'>
                <td>ID</td>
                <td>Type</td>
                <td>Number</td>
                <td>Contact</td>
            </tr>

     <?php
        endif;
        foreach ($phones as $key => $value) :
    ?>
            <tr>
                <td> <?= $phones[$key]->id ?> </td>
                <td> <?= $phones[$key]->type ?> </td>
                <td> <?= $phones[$key]->number ?> </td>
                <td> <?= $contactRepo->getNameById($phones[$key]->contactId) ?> </td>

            <?php


        if (isset($_SESSION['id']) && $_SESSION['isAdmin'] == 1) :
        ?>
            <td><a href="edit_phone.php?id=<?=$phones[$key]->id ?>" ><img src="../img/file_edit.png" width="30px"></a> </td>
            <td><a href="delete_phone.php?id=<?=$phones[$key]->id ?>" ><img src="../img/file_delete.png" width="30px"></a></td>
        <?php
        endif;
        endforeach;

        echo "</tr>";
}
    echo '</table>';

    //adds the ADD button for admins
    if (isset($_SESSION['id']) && $_SESSION['isAdmin'] == 1) {
        echo '<div class="addNew"><a href="add_phone.php">Add new</a></div>';
    }

    echo '</div></div></div>';

require_once "footer.php"; ?>