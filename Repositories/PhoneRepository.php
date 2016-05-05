<?php
require_once('BaseRepository.php');
require_once('../Entities/Connection.php');
class PhoneRepository extends BaseRepository
{
    function insert(Phone $phone)
    {
        $connection = new Connection();

        $query = "INSERT INTO phones (type, number, contact_id) VALUES ('$phone->type','$phone->number','$phone->contactId')";

        $result = $connection->returnQueryResult("phonebookphp",$query);

    }

    public function update(Phone $phone){
        $connection = new Connection();

        $query = "UPDATE phones SET `id`='$phone->id',`type`='$phone->type',`number`='$phone->number',`contact_id`='$phone->contactId' WHERE id='$phone->id'";

        $result = $connection->returnQueryResult("phonebookphp",$query);
    }

    /**
     * @return array
     */
    public function getAll()
    {
        $connection = new Connection();
        $query = "SELECT id,type,number,contact_id FROM `phones`";

        $result = $connection->returnQueryResult("phonebookphp",$query);

        $phones = array();
        while($rows = $result->fetch(PDO::FETCH_ASSOC))
        {
            $phone = new Phone();
            $phone->id = $rows['id'];
            $phone->type  = $rows['type'];
            $phone->number  = $rows['number'];
            $phone->contactId = $rows['contact_id'];

            array_push($phones,$phone);
        }

        return $phones;
    }

    public function getById($id){
        $connection = new Connection();
        $query = "SELECT * FROM `phones` WHERE id=$id";

        $result = $connection->returnQueryResult("phonebookphp",$query);

        $phone = new Phone();
        while($rows = $result->fetch(PDO::FETCH_ASSOC))
        {
            $phone->id = $rows['id'];
            $phone->type  = $rows['type'];
            $phone->number  = $rows['number'];
            $phone->contactId = $rows['contact_id'];
        }

        return $phone;
    }

    public function save(Phone $item)
    {
        parent::save($item);
    }

    public function delete(Phone $item)
    {

        $connection = new Connection();
        $query = "DELETE FROM `phones` WHERE id=$item->id";

        $result = $connection->returnQueryResult("phonebookphp",$query);
    }

}