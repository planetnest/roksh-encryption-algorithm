<?php

namespace Roksh;

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
