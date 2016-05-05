<?php
require_once "header.php";

if(!isset($_SESSION['id'])){
    header("Location: error.php");
}
else{

echo '<div class="section">';
    if(isset($_SESSION['id']) && $_SESSION['isAdmin']==1){
        echo '<div class="left">
                        <h1>Add Contact</h1>
                        <form method="post" action="add_contact.php">

                            <input type="text" name="firstName" placeholder="First Name"/>
                            <input type="text" name="lastName" placeholder="Last Name"/>
                            <input type="text" name="userId" placeholder="User ID"/>
                            <input type="submit" value="Save"/>
                        </form>
                    </div>';
    }

    echo '<div class="right">';


        $repo = new ContactRepository();

        $contacts = $repo->getAll();

        echo '<h1>List of Contacts</h1>';
        echo "<table>";


        echo "<tr>
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


        echo '</table> </div></div>';
}

require_once "footer.php"; ?>
