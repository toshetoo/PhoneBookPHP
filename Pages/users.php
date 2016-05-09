<?php
require_once "header.php";

if(!isset($_SESSION['id'])){
    header("Location: error.php");
}
else {

echo '<div class="left">';
    if(isset($_SESSION['id']) && $_SESSION['isAdmin']==1) :
    ?>

            <h1>List of all users</h1>
                <table>
                    <tr class='head'>
                        <td>ID</td>
                        <td>First name</td>
                        <td>Last name</td>
                        <td>Username</td>
                        <td>Admin</td>
                        <td>Password</td>
                        <td>Edit</td>
                        <td>Delete</td>
                    </tr>
    <?php
    else :
    ?>
    <div class="left">
        <h1>List of all users</h1>
            <table>
                <tr class='head'>
                    <td>ID</td>
                    <td>First name</td>
                    <td>Last name</td>
                    <td>Username</td>
                    <td>Admin</td>
                </tr>
    <?php
    endif;

    $repo = new UserRepository();
    $users = $repo->getAll();



    foreach($users as $key=>$value) :
        ?>
        <tr>
            <td><?= $users[$key]->id ?></td>
            <td><?= $users[$key]->firstName ?></td>
            <td><?= $users[$key]->lastName ?></td>
            <td><?= $users[$key]->username ?></td>

        <?php
        if($users[$key]->isAdmin == 0)
            echo '<td>No</td>';

        else
            echo '<td>Yes</td>';

        if(isset($_SESSION['id']) && $_SESSION['isAdmin']==1) :
            ?>

            <td><?= $users[$key]->password ?></td>
            <td><a href="edit_user.php?id=<?= $users[$key]->id ?>" ><img src="../img/file_edit.png" width="30px"></a></td>
            <td><a href="delete_user.php?id=<?= $users[$key]->id ?>" ><img src="../img/file_delete.png" width="30px"></a></td>';

            <?php
        endif;

        echo "</tr>";


        endforeach;

    echo '</table>';
        if (isset($_SESSION['id']) && $_SESSION['isAdmin'] == 1) {
            echo '<div class="addNew"><a href="add_user.php">Add new</a></div>';
        }
    echo '</div></div>';
}
require_once "footer.php"; ?>
