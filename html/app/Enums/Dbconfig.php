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
        return [
            'host' => self::DB_HOST->value,
            'dbname' => self::DB_NAME->value,
            'user' => self::DB_USER->value,
            'password' => self::DB_PASS->value,
        ];
    }
}
