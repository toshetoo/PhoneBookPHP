<?php
require_once "header.php";

if(!isset($_SESSION['id'])){
    header("Location: error.php");
}
else{


    echo '<div class="left">';


        $repo = new ContactRepository();

        $contacts = $repo->getAll();

        echo '<h1>List of Contacts</h1>';
        echo "<table>";


        echo "<tr class='head'>
                            <td>ID</td>
                            <td>First name</td>
                            <td>Last name</td>
                            <td>User ID</td>";
        if(isset($_SESSION['id']) && $_SESSION['isAdmin']==1){
            echo "<td>Edit</td><td>Delete</td>";
        }
        echo "</tr>";
        foreach($contacts as $key=>$value){
            echo "<tr>";
            echo '<td>' . $contacts[$key]->id . "</td><td>" . $contacts[$key]->firstName . "</td><td>" . $contacts[$key]->lastName . "</td><td>" . $contacts[$key]->userId . "</td>";
            if(isset($_SESSION['id']) && $_SESSION['isAdmin']==1){
                echo  '<td><a href="edit_contact.php?id=' . $contacts[$key]->id . '" ><img src="../img/file_edit.png" width="30px"></a> </td><td>' . ' <a href="delete_contact.php?id=' . $contacts[$key]->id . '" ><img src="../img/file_delete.png" width="30px"></a></td>';
            }
            echo "</tr>";
        }


        echo '</table>
            <div class="addNew"><a href="add_contact.php">Add new</a></div>
                </div></div>';
}

require_once "footer.php"; ?>
