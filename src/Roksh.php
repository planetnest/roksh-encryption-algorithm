<?php

namespace Roksh;

require_once('./roksh.crypto.php');

class Roksh
{
    public static function encrypt(string $message): string
    {
        return encrypt($message);
    }

    public static function decrypt(string $message): string
    {
        return decrypt($message);
    }
}
