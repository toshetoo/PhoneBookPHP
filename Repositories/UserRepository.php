<?php

require_once('BaseRepository.php');
require_once('../Entities/Connection.php');
class UserRepository extends BaseRepository
{
    /**
     * @param User $user
     */
    function insert(User $user)
    {
        $connection = new Connection();

        $query = "INSERT INTO users(username, password, firstName,lastName,isAdmin) VALUES ('$user->username','$user->password','$user->firstName','$user->lastName','$user->isAdmin')";

        $result = $connection->returnQueryResult("phonebookphp",$query);

    }

    public function update(User $user){
        $connection = new Connection();

        $query = "UPDATE `users` SET `id`='$user->id',`firstName`='$user->firstName',`lastName`='$user->lastName',`username`='$user->username',`password`='$user->password',`isAdmin`='$user->isAdmin'  WHERE id=$user->id";

        $result = $connection->returnQueryResult("phonebookphp",$query);
    }

    /**
     * @return array
     */
    public function getAll()
    {
		$connection = new Connection();
		$query = "SELECT * FROM `users`";
		
		$result = $connection->returnQueryResult("phonebookphp",$query);
		
		$users = array();
		while($rows = $result->fetch(PDO::FETCH_ASSOC))
		{
			$user = new User();
			$user->id = $rows['id'];
			$user->firstName  = $rows['firstName'];
			$user->lastName  = $rows['lastName'];
			$user->username  = $rows['username'];
			$user->password  = $rows['password'];
            $user->isAdmin  = $rows['isAdmin'];
			
			array_push($users,$user);
		}
		
		return $users;
    }

    public function getByUsernameAndPass($username, $password){
        $connection = new Connection();
        $query = "SELECT * FROM `users` WHERE username='$username' && password='$password'";

        $result = $connection->returnQueryResult("phonebookphp",$query);

        $user = new User();
        while($rows = $result->fetch(PDO::FETCH_ASSOC))
        {

            $user->id = $rows['id'];
            $user->firstName  = $rows['firstName'];
            $user->lastName  = $rows['lastName'];
            $user->username  = $rows['username'];
            $user->password  = $rows['password'];
            $user->isAdmin = $rows['idAdmin'];
        }

        return $user;
    }

    /**
     * @param $id
     * @return User
     */
    public function getById($id){
        $connection = new Connection();
        $query = "SELECT * FROM `users` WHERE id=$id";

        $result = $connection->returnQueryResult("phonebookphp",$query);

        $user = new User();
        while($rows = $result->fetch(PDO::FETCH_ASSOC))
        {

            $user->id = $rows['id'];
            $user->firstName  = $rows['firstName'];
            $user->lastName  = $rows['lastName'];
            $user->username  = $rows['username'];
            $user->password  = $rows['password'];
            $user->isAdmin = $rows['idAdmin'];
        }

        return $user;
    }

    public function save(User $item)
    {
        parent::save($item);
    }

    public function delete(User $item)
    {

        $connection = new Connection();
        $query = "DELETE FROM `users` WHERE id=$item->id";

        $result = $connection->returnQueryResult("phonebookphp",$query);
    }
}