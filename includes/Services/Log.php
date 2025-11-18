<?php

namespace MassdataFruits\Services;

class Log
{
    /**
     * Logs info message
     *
     * @param string $message
     * @return void
     */
    public static function info(string $message): void
    {
        echo "INFO: " . $message . "\n";
    }

    /**
     * Logs error message
     *
     * @param string $message
     * @return void
     */
    public static function error(string $message): void
    {
        echo "ERROR: " . $message . "\n";
    }
}
