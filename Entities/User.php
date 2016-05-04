<?php


class User extends  BaseEntity
{
    public $username;
    public $password;
    public $firstName;
    public $lastName;
    public $isAdmin;

    function __construct(){}

}