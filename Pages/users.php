<?php
require_once "header.php";

if(!isset($_SESSION['id'])){
    header("Location: error.php");
}
else{

    echo '<div class="left">';

    $repo = new UserRepository();
    $users = $repo->getAll();

    echo '<h1>List of users</h1>';
    echo "<table>";

    echo "<tr class='head'>
               <td>ID</td>
               <td>First name</td>
               <td>Last name</td>
               <td>Username</td>
               <td>Password</td>
               <td>Admin</td>";

    if(isset($_SESSION['id']) && $_SESSION['isAdmin']==1){
        echo "<td>Edit</td><td>Delete</td>";
    }

    echo "</tr>";

    foreach($users as $key=>$value){
        echo "<tr>";
        echo "<td>" . $users[$key]->id . "</td><td>" . $users[$key]->firstName . "</td><td>" . $users[$key]->lastName . "</td><td>" . $users[$key]->username . "</td><td>" . $users[$key]->password . '</td>';

        if($users[$key]->isAdmin == 0){
            echo '<td>No</td>';
        }
        else
            echo '<td>Yes</td>';

        if(isset($_SESSION['id']) && $_SESSION['isAdmin']==1){
            echo '<td><a href="edit_user.php?id=' . $users[$key]->id . '" ><img src="../img/file_edit.png" width="30px"></a> </td><td>' . ' <a href="delete_user.php?id=' . $users[$key]->id . '" ><img src="../img/file_delete.png" width="30px"></a></td>';
        }
        echo "</tr>";
    }

    echo '</table>
               <div class="addNew"><a href="add_user.php">Add new</a></div>
            </div></div>';
}
require_once "footer.php"; ?>
