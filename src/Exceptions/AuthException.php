<?php

namespace src\Exceptions;

use src\Helpers\MessageAuth;

/**
 * Class AuthException extends \DomainException
 * 
 * @package src\Exceptions
 */
class AuthException extends \DomainException
{
    /**
     * Constructor.
     * 
     * @param string $message
     */
    public function __construct(string $message)
    {
        $this->handle($message);
    }

    /**
     * Set error message.
     * 
     * @param mixed message
     * 
     * @return void
     */
    public function handle($message): void
    {
        if ($message) {
            MessageAuth::setMessage('error', $message);
            header('Location: ' . PATH_BASE . '/exception-handler');
        }
    }
}
