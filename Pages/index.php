<?php

    require_once('../Repositories/UserRepository.php');
    require_once('../Repositories/ContactRepository.php');
    require_once('../Repositories/PhoneRepository.php');
    require_once('../Entities/Connection.php');
    require_once('../Entities/User.php');
    require_once('../Entities/Contact.php');
    require_once('../Entities/Phone.php');
?>
<html>
    <head>
        <link rel="stylesheet" href="../CSS/styles.css" type="text/css">
    </head>
    <hr>
<h1>Add user</h1>
<form method="post" action="add_user.php">

    <input type="text" name="username" value="Username"/>
    <input type="text" name="firstName" value="First Name"/>
    <input type="text" name="lastName" value="Last Name"/>
    <input type="text" name="password"/>
    <input type="text" name="isAdmin" value="Admin"/>
    <input type="submit" value="Save"/>
</form>

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
        <td>Admin</td>
        <td>Edit</td>
        <td>Delete</td>
    </tr>";
	foreach($users as $key=>$value){
            echo "<tr>";
				echo '<td>' . $users[$key]->id . "</td><td>" . $users[$key]->firstName . "</td><td>" . $users[$key]->lastName . "</td><td>" . $users[$key]->username . "</td><td>" . $users[$key]->password . '</td><td>'. $users[$key]->isAdmin . '</td><td><a href="edit_user.php?id=' . $users[$key]->id . '" ><img src="../img/file_edit.png" width="30px"></a> </td><td>' . ' <a href="delete_user.php?id=' . $users[$key]->id . '" ><img src="../img/file_delete.png" width="30px"></a></td>';
			echo "</tr>";
    }
	
	
    echo '</table>';
?>
    <hr>
    <h1>Add Contact</h1>
    <form method="post" action="add_contact.php">

        <input type="text" name="firstName" value="First Name"/>
        <input type="text" name="lastName" value="Last Name"/>
        <input type="text" name="userId" value="User ID"/>
        <input type="submit" value="Save"/>
    </form>

    <?php

    $repo = new ContactRepository();

    $contacts = $repo->getAll();

    echo '<h1>List of Contacts</h1>';
    echo "<table>";


    echo "<tr>
        <td>ID</td>
        <td>First name</td>
        <td>Last name</td>
        <td>User ID</td>
        <td>Edit</td>
        <td>Delete</td>
    </tr>";
    foreach($contacts as $key=>$value){
        echo "<tr>";
        echo '<td>' . $contacts[$key]->id . "</td><td>" . $contacts[$key]->firstName . "</td><td>" . $contacts[$key]->lastName . "</td><td>" . $contacts[$key]->userId . "</td>" . '<td><a href="edit_contact.php?id=' . $contacts[$key]->id . '" ><img src="../img/file_edit.png" width="30px"></a> </td><td>' . ' <a href="delete_contact.php?id=' . $contacts[$key]->id . '" ><img src="../img/file_delete.png" width="30px"></a></td>';
        echo "</tr>";
    }


    echo '</table>';
    ?>

    <hr>
    <h1>Add phone</h1>
    <form method="post" action="add_phone.php">

        <input type="text" name="type" value="Type"/>
        <input type="text" name="number" value="Number"/>
        <input type="text" name="contactId" value="Contact ID"/>
        <input type="submit" value="Save"/>
    </form>

    <?php

    $repo = new PhoneRepository();

    $phones = $repo->getAll();

    echo '<h1>List of phones</h1>';
    echo "<table>";


    echo "<tr>
        <td>ID</td>
        <td>Type</td>
        <td>Number</td>
        <td>Contact ID</td>
        <td>Edit</td>
        <td>Delete</td>
    </tr>";
    foreach($phones as $key=>$value){
        echo "<tr>";
        echo '<td>' . $phones[$key]->id . "</td><td>" . $phones[$key]->type . "</td><td>" . $phones[$key]->number . "</td><td>" . $phones[$key]->contactId . "</td>" . '<td><a href="edit_phone.php?id=' . $phones[$key]->id . '" ><img src="../img/file_edit.png" width="30px"></a> </td><td>' . ' <a href="delete_phone.php?id=' . $phones[$key]->id . '" ><img src="../img/file_delete.png" width="30px"></a></td>';
        echo "</tr>";
    }


    echo '</table>';
    ?>
</html>
