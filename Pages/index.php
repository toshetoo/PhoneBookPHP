<?php require "header.php";

var_dump($_SESSION);
?>

            <div id="right">
                <div class="section">
                    <?php
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

                    ?>

                    <div class="right">
                        <?php

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

                            echo '</table>';
                        ?>
                    </div>
                </div>
                <div class="section">
                    <?php
                    if(isset($_SESSION['id']) && $_SESSION['isAdmin']==1){
                    echo '<div class="left">
                        <h1>Add Contact</h1>
                        <form method="post" action="add_contact.php">

                            <input type="text" name="firstName" placeholder="First Name"/>
                            <input type="text" name="lastName" placeholder="Last Name"/>
                            <input type="text" name="userId" placeholder="User ID"/>
                            <input type="submit" value="Save"/>
                        </form>
                    </div>';}
                    ?>
                    <div class="right">
                        <?php

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


                        echo '</table>';
                        ?>
                    </div>
                </div>
                <div class="section">
                    <?php
                    if(isset($_SESSION['id']) && $_SESSION['isAdmin']==1) {
                        echo ' <div class="left">
                        <h1>Add phone</h1>
                        <form method="post" action="add_phone.php">

                            <input type="text" name="type" placeholder="Type"/>
                            <input type="text" name="number" placeholder="Number"/>
                            <input type="text" name="contactId" placeholder="Contact ID"/>
                            <input type="submit" value="Save"/>
                        </form>
                    </div>';
                    }
                    ?>
                    <div class="right">
                        <?php

                        $repo = new PhoneRepository();

                        $phones = $repo->getAll();

                        echo '<h1>List of phones</h1>';
                        echo "<table>";


                        echo "<tr>
                            <td>ID</td>
                            <td>Type</td>
                            <td>Number</td>
                            <td>Contact ID</td>";
                            if(isset($_SESSION['id']) && $_SESSION['isAdmin']==1){
                                echo "<td>Edit</td><td>Delete</td>";
                            }
                        echo "</tr>";
                        foreach($phones as $key=>$value){
                            echo "<tr>";
                            echo '<td>' . $phones[$key]->id . "</td><td>" . $phones[$key]->type . "</td><td>" . $phones[$key]->number . "</td><td>" . $phones[$key]->contactId . "</td>";
                            if(isset($_SESSION['id']) && $_SESSION['isAdmin']==1){
                                echo '<td><a href="edit_phone.php?id=' . $phones[$key]->id . '" ><img src="../img/file_edit.png" width="30px"></a> </td><td>' . ' <a href="delete_phone.php?id=' . $phones[$key]->id . '" ><img src="../img/file_delete.png" width="30px"></a></td>';
                            }
                            echo "</tr>";
                        }


                        echo '</table>';
                        ?>
                    </div>
                 </div>
            </div>
<?php require "footer.php"; ?>
