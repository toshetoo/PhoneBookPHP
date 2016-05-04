<?php


class Connection
{
    private $url = "localhost";
    private $username = "root";
    private $password = "";
    private $conn;

    function returnQueryResult($dbName,$query){
       

        try{
            $conn = new PDO($url = "mysql:dbname=$dbName;host=127.0.0.1", $this->username, $this->password);
        }catch (PDOException $e){
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }

        try{
            $result = $conn->query($query);
        }catch (PDOException $e){
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
            $conn=null;
        }


        $conn=null;
        return $result;
    }
}