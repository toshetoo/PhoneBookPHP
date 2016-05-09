<?php
require_once "header.php";

if(!isset($_SESSION['id'])){
    header("Location: error.php");
}
else{

    echo '<div class="left">';

        $usersRepo = new UserRepository();
        $repo = new ContactRepository();
        $contacts = $repo->getAll();

    if(isset($_SESSION['id']) && $_SESSION['isAdmin']==1) :
        ?>
        <h1>List of all Contacts</h1>
            <table>
                <tr class='head'>
                    <td>ID</td>
                    <td>First name</td>
                    <td>Last name</td>
                    <td>User</td>
                    <td>Edit</td>
                    <td>Delete</td>
                   </tr>
    <?php
    else :
    ?>
        <h1>List of your Contacts</h1>
            <table>
                <tr class='head'>
                   <td>ID</td>
                   <td>First name</td>
                   <td>Last name</td>
                   <td>User</td>

                </tr>

    <?php
    endif;

        foreach($contacts as $key=>$value) :
            ?>
            <tr>
                <td><?= $contacts[$key]->id ?></td>
                <td><?= $contacts[$key]->firstName ?></td>
                <td><?= $contacts[$key]->lastName ?></td>
                <td><?= $usersRepo->getNameById($contacts[$key]->userId) ?></td>";
            <?php
            if(isset($_SESSION['id']) && $_SESSION['isAdmin']==1) :
                ?>

                <td><a href="edit_contact.php?id=<?=$contacts[$key]->id ?>" ><img src="../img/file_edit.png" width="30px"></a></td>
                <td><a href="delete_contact.php?id=<?=$contacts[$key]->id ?>" ><img src="../img/file_delete.png" width="30px"></a></td>';

                <?php
            endif;
            echo "</tr>";
        endforeach;


        echo '</table>';

        if(isset($_SESSION['id']) && $_SESSION['isAdmin']==1){
            echo '<div class="addNew"><a href="add_contact.php">Add new</a></div>';
        }

        echo '</div></div>';
}
require_once "footer.php"; ?>
