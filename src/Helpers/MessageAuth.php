<?php

namespace src\Helpers;

/**
 * Class MessageAuth
 */
class MessageAuth
{
    /**
     * Set error message in session array.
     * 
     * @param string $type
     * @param string $message
     * 
     * @return void
     */
    public static function setMessage(string $type, string $message): void
    {
        $_SESSION['message'] = $message;
        $_SESSION['type'] = $type;
    }
}
