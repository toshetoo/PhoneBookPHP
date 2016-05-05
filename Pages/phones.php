<?php require_once "header.php";

if(!isset($_SESSION['id'])){
    header("Location: error.php");
}
else {

    echo '<div class="left">';

    $repo = new PhoneRepository();
    $phones = $repo->getAll();

    echo '<h1>List of phones</h1>';
    echo "<table>";


    echo "<tr class='head'>
             <td>ID</td>
              <td>Type</td>
              <td>Number</td>
              <td>Contact ID</td>";

    if (isset($_SESSION['id']) && $_SESSION['isAdmin'] == 1) {
        echo "<td>Edit</td><td>Delete</td>";
    }

    echo "</tr>";

    foreach ($phones as $key => $value) {
        echo "<tr>";
        echo '<td>' . $phones[$key]->id . "</td><td>" . $phones[$key]->type . "</td><td>" . $phones[$key]->number . "</td><td>" . $phones[$key]->contactId . "</td>";

        if (isset($_SESSION['id']) && $_SESSION['isAdmin'] == 1) {
            echo '<td><a href="edit_phone.php?id=' . $phones[$key]->id . '" ><img src="../img/file_edit.png" width="30px"></a> </td><td>' . ' <a href="delete_phone.php?id=' . $phones[$key]->id . '" ><img src="../img/file_delete.png" width="30px"></a></td>';
        }

        echo "</tr>";
    }

}
    echo '</table>
                <div class="addNew"><a href="add_phone.php">Add new</a></div>
            </div></div></div>';

require_once "footer.php"; ?>