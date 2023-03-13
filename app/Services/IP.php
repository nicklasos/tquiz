<?php

declare(strict_types=1);

namespace App\Services;

class IP
{
    public static function get(): string
    {
        return $_SERVER['HTTP_CF_CONNECTING_IP'] ?? $_SERVER['REMOTE_ADDR'] ?? '';
    }
}
