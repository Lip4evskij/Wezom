<?php
class Model_Database extends PDO
{
    function __construct()
    {
        parent::__construct('mysql:host=localhost;dbname=DB_News',
            'root','',[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

    }
}