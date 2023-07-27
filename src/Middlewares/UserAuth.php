<?php

namespace src\Middlewares;

use src\Helpers\MessageAuth;

/**
 * Handle User authentication.
 * 
 * Class UserAuth extends MessageAuth
 * 
 * @package src\Middlewares
 */
class UserAuth extends MessageAuth
{
    /**
     * Verify user's name.
     * 
     * @param string $name
     * 
     * @return boolean
     */
    public static function verifyName(string $name): bool
    {
        $characters = preg_match("/[\[^\'£$%^&*()}{@:\'#~?><>]]/", $name);
        if ($characters || '') {
            MessageAuth::setMessage('error', 'Invalid name!');
            return false;
        } else {
            return true;
        }
    }

    /**
     * Verify User's email.
     * 
     * @param string $email
     * 
     * @return boolean
     */
    public static function verifyEmail(string $email): bool
    {
        $validation = filter_var($email, FILTER_VALIDATE_EMAIL);
        if (!$validation || $email == '') {
            MessageAuth::setMessage('error', 'Invalid email!');
            return false;
        } else {
            return true;
        }
    }

    /**
     * Verify user's password.
     * 
     * @param string $password
     * 
     * @return boolean
     */
    public static function verifyPassword(string $password): bool
    {
        $passwordStrip = strip_tags($password);


        /*$passwordStrengthValidation = filter_var(
            $password,
            FILTER_VALIDATE_REGEXP,
            array("options" => array("regexp" => "/^(?=.*[a-z])(?=.*[A-Z])[a-zA-Z\d]{8,}$/"))
        );*/

        // Validate password strength
        $uppercase = preg_match('@[A-Z]@', $passwordStrip);
        $lowercase = preg_match('@[a-z]@', $passwordStrip);
        $number    = preg_match('@[0-9]@', $passwordStrip);
        $specialChars = preg_match('@[^\w]@', $passwordStrip);

        if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
            MessageAuth::setMessage('error', 'Invalid password! Put at least one uppercase letter, one lowercase letter, one number and one special character.');
            return false;
        } else {
            return true;
        }

        /*if (!$passwordStrengthValidation) {
            MessageAuth::setMessage('error', 'Invalid password! Put at least one capital letter, numbers and one special character.');
            return false;
        } else {
            return true;
        }*/
    }

    /**
     * Verify user's profile image.
     * 
     * @param array $image
     * 
     * @return boolean
     */
    public static function verifyUserImage(array $image): bool
    {
        $imageValidation = preg_match('/^image\/(pjpeg|jpeg|png|gif|bmp|jpg)$/', $image['type']);
        $checkImage = getimagesize($image['tmp_name']);
        $fileExists = file_exists(dirname(__DIR__, 2) . '/uploads/images/users/' . $image['name']);
        if (!$imageValidation || !$checkImage) {
            MessageAuth::setMessage('error', "The file $image is invalid!");
            return false;
        } else if ($fileExists) {
            MessageAuth::setMessage('error', "The file $image is already uploaded!");
            return false;
        } else {
            return true;
        }
    }
}
