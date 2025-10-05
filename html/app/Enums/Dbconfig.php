<?php

namespace App\Enums;

enum Dbconfig: string
{
    case DB_NAME = 'framework';
    case DB_USER = 'user';
    case DB_PASS = 'secret';
    case DB_HOST = 'mysql';

    public static function getConfig(): array
    {
        // Prefer env variables if present; fallback to enum defaults
        $host = $_ENV['DB_HOST'] ?? self::DB_HOST->value;
        $dbname = $_ENV['DB_NAME'] ?? self::DB_NAME->value;
        $user = $_ENV['DB_USER'] ?? self::DB_USER->value;
        $password = $_ENV['DB_PASS'] ?? self::DB_PASS->value;

        return [
            'host' => $host,
            'dbname' => $dbname,
            'user' => $user,
            'password' => $password,
        ];
    }
}
