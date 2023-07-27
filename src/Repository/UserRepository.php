<?php

namespace src\Repository;

use app\Services\ConnectionFactory;

/**
 * Class UserRepository
 * 
 * @package src\Repository
 */
class UserRepository
{
    /**
     * Register user.
     * 
     * @param string $name
     * @param string $email
     * @param string $password
     * @param string $about
     * @param string $image
     * 
     * @return boolean
     */
    protected static function schemaRegister(string $name, string $email, string $password, string $about, string $image): bool
    {
        $signUp = ConnectionFactory::connect()->prepare("INSERT INTO users (name, email, password, about, image) VALUES (?, ?, ?, ?, ?)");
        $signUp->execute(array((string) $name, (string) $email, (string) $password, (string) $about, (string) $image));
        return $signUp ? true : false;
    }

    /**
     * Login user.
     * 
     * @param string $email
     * @param string $password
     * 
     * @return mixed
     */
    protected static function schemaLogin(string $email, string $password)
    {
        $signIn = ConnectionFactory::connect()->prepare("SELECT * FROM users WHERE email = ? AND PASSWORD = ?");
        $signIn->execute(array((string) $email, (string) $password));
        $signIn = $signIn->fetch(\PDO::FETCH_ASSOC);
        return $signIn ? $signIn : false;
    }

    /**
     * Update user profile.
     * 
     * @param int $id
     * @param string $name
     * @param string $email
     * @param string $password
     * @param string $about
     * @param string $image
     * 
     * @return boolean
     */
    protected static function schemaUpdateProfile(int $id, string $name, string $email, string $password, string $about, string $image): bool
    {
        $update = ConnectionFactory::connect()->prepare("UPDATE users SET name = ?, email = ?, password = ?, about = ?, image = ? WHERE id = $id");
        $update->execute(array((string) $name, (string) $email, (string) $password, (string) $about, (string) $image));
        return $update ? true : false;
    }

    /**
     * @param int $user
     * @param int $content
     * 
     * @return void
     */
    protected static function schemaPlaylistAdd(int $user, int $content): void
    {
        $add = ConnectionFactory::connect()->prepare("INSERT INTO playlist (user_id, content_id VALUES (?, ?)");
        $add->execute(array((int) $user, (int) $content));
    }

    /**
     * @param mixed $query
     * @param mixed $user
     * 
     * @return array $playlist
     */
    protected static function schemaPlaylistGet($query, $user): array
    {
        $playlist = ConnectionFactory::connect()->prepare("SELECT * FROM playlist JOIN content ON playlist.content_id = content.id WHERE playlist.user_id = $user $query");
        $playlist->execute();
        $playlist = $playlist->fetchAll(\PDO::FETCH_ASSOC);
        return $playlist;
    }
}
