<?php

require_once('BaseRepository.php');
require_once('../Entities/Connection.php');
class ContactRepository extends BaseRepository
{

    function insert(Contact $contact)
    {
        $connection = new Connection();

        $query = "INSERT INTO `phonebookphp`.`contacts` (`firstName`, `lastName`, `user_id`) VALUES ('$contact->firstName','$contact->lastName','$contact->userId')";

        $result = $connection->returnQueryResult("phonebookphp",$query);

    }

    public function update(Contact $contact){
        $connection = new Connection();

        $query = "UPDATE contacts SET id='$contact->id',firstName='$contact->firstName',lastName='$contact->lastName',user_id='$contact->userId' WHERE id='$contact->id'";

        $result = $connection->returnQueryResult("phonebookphp",$query);
    }

    /**
     * @return array
     */
    public function getAll()
    {
        $connection = new Connection();
        $query = "SELECT * FROM contacts";

        $result = $connection->returnQueryResult("phonebookphp",$query);

        $contacts = array();
        while($rows =  $result->fetch(PDO::FETCH_ASSOC))
        {
            $contact = new Contact();
            $contact->id = $rows['id'];
            $contact->firstName  = $rows['firstName'];
            $contact->lastName  = $rows['lastName'];
            $contact->userId = $rows['user_id'];

            array_push($contacts,$contact);
        }

        return $contacts;
    }

    public function getNameById($id){
        $connection = new Connection();
        $query = "SELECT * FROM `contacts` WHERE id=$id";

        $result = $connection->returnQueryResult("phonebookphp",$query);

        $contact = new Contact();
        while($rows =  $result->fetch(PDO::FETCH_ASSOC))
        {

            $contact->id = $rows['id'];
            $contact->firstName  = $rows['firstName'];
            $contact->lastName  = $rows['lastName'];
            $contact->userId = $rows['user_id'];
        }

        return $contact->firstName . " " . $contact->lastName;
    }

    public function getById($id){
        $connection = new Connection();
        $query = "SELECT * FROM `contacts` WHERE id=$id";

        $result = $connection->returnQueryResult("phonebookphp",$query);

        $contact = new Contact();
        while($rows =  $result->fetch(PDO::FETCH_ASSOC))
        {

            $contact->id = $rows['id'];
            $contact->firstName  = $rows['firstName'];
            $contact->lastName  = $rows['lastName'];
            $contact->userId = $rows['user_id'];
        }

        return $contact;
    }

    public function save(Contact $item)
    {
        parent::save($item);
    }

    public function delete(Contact $item)
    {

        $connection = new Connection();
        $query = "DELETE FROM `contacts` WHERE id=$item->id";

        $result = $connection->returnQueryResult("phonebookphp",$query);
    }
}