<?php

namespace App\Database;

use Illuminate\Support\Facades\DB;

class DatabaseConnectionManager
{
    private static $instance;
    private $connection;

    private function __construct()
    {
        $this->connection = DB::connection();
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function getConnection()
    {
        return $this->connection;
    }
}
