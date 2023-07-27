<?php

namespace app\Models\Entities;

/**
 * Class User.
 * 
 * @package app\Models\Entities
 */
class User
{
    /**
     * User id.
     * 
     * @var int $id
     */
    protected int $id;

    /**
     * User name, email, password, and about.
     * 
     * @var string $name
     * @var string $email
     * @var string $password
     * @var string $about
     */
    protected string $name, $email, $password, $about, $image;

    /**
     * Constructor.
     * 
     * @param int $id
     * @param string $name
     * @param string $email
     * @param string $password
     * @param string $about
     * @param string $image
     * 
     * @return static
     */
    public function __construct(int $id, string $name, string $email, string $password, string $about, string $image)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->about = $about;
        $this->image = $image;

        $this->getId($this->id);
        $this->getName($this->name);
        $this->getEmail($this->email);
        $this->getPassword($this->password);
        $this->getAbout($this->about);
        $this->getImage($this->image);

        $_SESSION['login'] = true;
        return $this;
    }

    /**
     * Get user id.
     * 
     * @return int $id
     */
    public function getId(): int
    {
        $_SESSION['id'] = $this->id;
        return $this->id;
    }

    /**
     * Get user's name.
     * 
     * @return string $name
     */
    public function getName(): string
    {
        $_SESSION['name'] = $this->name;
        return $this->name;
    }

    /**
     * Get user's email.
     * 
     * @return string $email
     */
    public function getEmail(): string
    {
        $_SESSION['email'] = $this->email;
        return $this->email;
    }

    /**
     * Get user's password.
     * 
     * @return string $password
     */
    public function getPassword(): string
    {
        $_SESSION['password'] = $this->password;
        return $this->password;
    }

    /**
     * Get user's about.
     * 
     * @return string $about
     */
    public function getAbout(): string
    {
        $_SESSION['about'] = $this->about;
        return $this->about;
    }

    /**
     * Get user's profile image
     * 
     * @return string $image
     */
    public function getImage(): string
    {
        $_SESSION['image'] = $this->image;
        return $this->image;
    }
}
