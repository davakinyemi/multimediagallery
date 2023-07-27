<?php

namespace app\Models;

use app\Models\Entities\User;
use src\Helpers\MessageAuth;
use src\Middlewares\UserAuth;
use src\Repository\UserRepository;

/**
 * Class Profile extends UserRepository.
 * 
 * @package app\Models
 */
class Profile extends UserRepository
{
    /**
     * Update user profile.
     * 
     * @param int $id
     * @param string $name
     * @param string $email
     * @param string $password
     * @param string $about
     * @param array $image
     * 
     * @return void
     */
    protected static function updateProfile(int $id, string $name, string $email, string $password, string $about, array $image): void
    {
        $verifyName = UserAuth::verifyName($name);
        $verifyEmail = UserAuth::verifyEmail($email);
        $verifyPassword = UserAuth::verifyPassword($password);
        $verifyImage = UserAuth::verifyUserImage($image);

        if ($verifyName === false || $verifyEmail === false || $verifyPassword === false || $verifyImage === false) return;

        $update = UserRepository::schemaUpdateProfile((int) $id, (string) $name, (string) $email, (string) $password, (string) $about, (string) $image['name']);

        if (!$update) {
            MessageAuth::setMessage('error', 'Error while updating profile!');
            return;
        };

        // move_uploaded_file($image['tmp_name'], dirname(__DIR__, 2) . '/uploads/images/users/' . $image['name']);
        if (move_uploaded_file($image['tmp_name'], dirname(__DIR__, 2) . '/uploads/images/users/' . $image['name']) == false) {
            MessageAuth::setMessage('error', 'Error occurred while uploading image!');
            return;
        }

        new User((int) $id, (string) $name, (string) $email, (string) $password, (string) $about, (string) $image['name']);

        header('Location: ' . PATH_BASE . '/profile');
    }

    protected function playlistAdd(int $user, int $content): void
    {
        $add = UserRepository::schemaPlaylistAdd((int) $user, (int) $content);

        MessageAuth::setMessage('success', 'Content successfully added to the playlist!');
        header('Location: ' . PATH_BASE . '/playlists');
    }

    public static function getPlaylist($query, $user): array
    {
        $playlist = UserRepository::schemaPlaylistGet($query, $user);
        return $playlist;
    }

    /**
     * Logout.
     * 
     * @return void
     */
    protected function logout(): void
    {
        unset($_SESSION['id']);
        unset($_SESSION['name']);
        unset($_SESSION['email']);
        unset($_SESSION['image']);
        unset($_SESSION['about']);
        session_destroy();
        header('Location: ' . PATH_BASE . '/sign-in');
    }
}
