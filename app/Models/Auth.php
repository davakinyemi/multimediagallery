<?php

namespace app\Models;

use app\Services\ConnectionFactory;
use src\Repository\UserRepository;
use app\Models\Entities\User;
use src\Middlewares\UserAuth;
use src\Helpers\MessageAuth;

/**
 * Authentication class to handle user authentication.
 * 
 * Class Auth extends UserRepository.
 * 
 * @package app\Models
 */
class Auth extends UserRepository
{
    /**
     * Register.
     * 
     * @param string $name
     * @param string $email
     * @param string $password
     * @param string $about
     * @param array $image
     * 
     * @return void
     */
    protected static function register(string $name, string $email, string $password, string $about, array $image): void
    {
        $verifyName = UserAuth::verifyName($name);
        $verifyEmail = UserAuth::verifyEmail($email);
        $verifyPassword = UserAuth::verifyPassword($password);
        $verifyImage = UserAuth::verifyUserImage($image);

        if ($verifyName === false || $verifyEmail === false || $verifyPassword === false || $verifyImage === false) return;

        $signup = UserRepository::schemaRegister((string) $name, (string) $email, (string) $password, (string) $about, (string) $image['name']);
        $id = ConnectionFactory::connect()->lastInsertId();

        // move_uploaded_file($image['tmp_name'], 'multimediagallery/uploads/images/users/' . $image['name']);
        if (move_uploaded_file($image['tmp_name'], dirname(__DIR__, 2) . '/uploads/images/users/' . $image['name']) == false) {
            MessageAuth::setMessage('error', 'Error occurred while uploading image!');
            return;
        }

        if (!$signup) {
            MessageAuth::setMessage('error', 'Error occurred while registering!');
            return;
        }

        new User((int) $id, (string) $name, (string) $email, (string) $password, (string) $about, (string) $image['name']);

        header('Location: ' . PATH_BASE . '/home');
    }

    /**
     * Login.
     * 
     * @param string $email
     * @param string $password
     * 
     * @return void
     */
    protected static function login(string $email, string $password): void
    {
        $verifyEmail = UserAuth::verifyEmail($email);

        if ($verifyEmail === false) return;

        $user = UserRepository::schemaLogin((string) $email, (string) $password);

        if ($user === false) {
            MessageAuth::setMessage('error', 'User does not exist!');
            return;
        }

        new User((int) $user['id'], (string) $user['name'], (string) $email, (string) $password, (string) $user['about'], (string) $user['image']);
        header('Location: ' . PATH_BASE . '/home');
    }
}
