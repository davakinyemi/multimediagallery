<?php

namespace app\Controllers;

use app\Services\MainView;
use app\Models\Channel;
use app\Models\Profile;

/**
 * Class UserController
 * @package app\Controllers
 */
class UserController extends Profile
{
    /**
     * Call render function for user profile.
     * 
     * @return void
     */
    public function profile(): void
    {
        //$notification = Profile::getPlaylist("LIMIT 2", $_SESSION['id']);
        //$notification = Profile::getPlaylist("", $_SESSION['id']);
        //$channels = Channel::getChannels("");
        //$owners = Channel::getOwner("LIMIT 6");
        //$owners = Channel::getOwner("");
        MainView::render('profile', []);
    }

    /**
     * Set and update profile data.
     * 
     * @return void
     */
    public function setProfile(): void
    {
        if (isset($_POST['update-profile'])) {
            Profile::updateProfile($_SESSION['id'], $_POST['name'], $_POST['email'], $_POST['password'], $_POST['about'], $_FILES['image']);
        }
    }

    /*public function playlists(): void
    {
        //$notification = Profile::getPlaylist("LIMIT 2", $_SESSION['id']);
        $notification = Profile::getPlaylist("", $_SESSION['id']);
        //$channels = Channel::getChannels("");
        $playlist = Profile::getPlaylist("", $_SESSION['id']);
        //$owners = Channel::getOwner("LIMIT 6");
        $owners = Channel::getOwner("");
        MainView::render('playlists', ['owners' => $owners, 'channels' => $channels, 'playlist' => $playlist, 'notification' => $notification]);
    }*/

    /**
     * Add content to playlist.
     * 
     * @return void
     */
    public function addToPlaylist(): void
    {
        if (isset($_POST['add-content'])) {
            Profile::schemaPlaylistAdd($_SESSION['id'], $_POST['content']);
        }
    }

    /**
     * Logout.
     * 
     * @return void
     */
    public function setLogout(): void
    {
        if (isset($_GET['logout'])) {
            (new Profile)->logout();
        }
    }
}
