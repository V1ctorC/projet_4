<?php

class Manager
{
    protected function dbConnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=projet4;charset=utf8', 'root', 'root');
        return $db;
    }
}