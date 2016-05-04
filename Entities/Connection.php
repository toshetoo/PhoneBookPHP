<?php


class Connection
{
    private $url = "localhost";
    private $username = "root";
    private $password = "";
    private $conn;

    function returnQueryResult($dbName,$query){
        $conn = new mysqli($this->url,$this->username,$this->password,$dbName);

        mysqli_set_charset($conn,"utf8");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);

        }

        if ($conn->query($query) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $query . "<br>" . $conn->error;
        }

        $result = $conn->query($query);

        $conn->close();

        return $result;
    }
}