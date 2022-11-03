<?php

class User
{
    private $id;
    private $username;
    private $password;

    public static function auth($username, $password)
    {
        gloabl $dbc;
        $sql = "SELECT * FROM `logins` WHERE username = :username LIMIT 1;";
        $bindVal = ['username' => $username];
        $userRecord = $dbc->fetchArray($sql, $bindVal);
    }
    public function __construct($id, $username, $password)
    {

    }
}