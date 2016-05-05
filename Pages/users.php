<?php
require_once "header.php";

if(!isset($_SESSION['id'])){
    header("Location: error.php");
}
else{
    echo '<div id="right">
    <div class="section">';
        if(isset($_SESSION['id']) && $_SESSION['isAdmin']==1){
            echo '<div class="left">
                        <h1>Add user</h1>
                        <form method="post" action="add_user.php">

                            <input type="text" name="username" placeholder="Username"/>
                            <input type="text" name="firstName" placeholder="First Name"/>
                            <input type="text" name="lastName" placeholder="Last Name"/>
                            <input type="text" name="password" placeholder="Password" />
                            <input type="text" name="isAdmin" placeholder="Admin"/>
                            <input type="submit" value="Save"/>
                        </form>
                    </div>';
        }
        echo '<div class="right">';

    $repo = new UserRepository();
    $users = $repo->getAll();
    echo '<h1>List of users</h1>';
    echo "<table>";

    echo "<tr>
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
        echo '<td>' . $users[$key]->id . "</td><td>" . $users[$key]->firstName . "</td><td>" . $users[$key]->lastName . "</td><td>" . $users[$key]->username . "</td><td>" . $users[$key]->password . '</td><td>'. $users[$key]->isAdmin . '</td>';
        if(isset($_SESSION['id']) && $_SESSION['isAdmin']==1){
            echo '<td><a href="edit_user.php?id=' . $users[$key]->id . '" ><img src="../img/file_edit.png" width="30px"></a> </td><td>' . ' <a href="delete_user.php?id=' . $users[$key]->id . '" ><img src="../img/file_delete.png" width="30px"></a></td>';
        }
        echo "</tr>";
    }

    echo '</table></div></div>';
}
require_once "footer.php"; ?>
