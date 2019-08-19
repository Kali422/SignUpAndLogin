<?php

namespace SignUpForm\config;

use SQLite3;

class Database
{
    const PATH = "/var/www/html/SignUpForm/config/database.db";
    private $handle;

    function __construct()
    {
        $this->handle = new SQLite3(self::PATH, SQLITE3_OPEN_CREATE | SQLITE3_OPEN_READWRITE);
    }

    function getHandle()
    {
        return $this->handle;
    }

}