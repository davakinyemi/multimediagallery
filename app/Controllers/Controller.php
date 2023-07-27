<?php

namespace app\Controllers;

use app\Services\MainView;
use app\Models\Channel;
use app\Models\ChannelContent;
use app\Models\Profile;

/**
 * Main Controller class
 * 
 * Class Controller.
 * @package app\Controllers
 */
class Controller
{
    /**
     * Home method class the view method to render the home view, passing along the content to be rendered within the view.
     * 
     * Method home.
     * @return void
     */
    public function home(): void
    {
        //$notification = Profile::getPlaylist("LIMIT 2", $_SESSION['id']);
        //$notification = Profile::getPlaylist("", $_SESSION['id']);
        //$owners = Channel::getOwner("LIMIT 6");
        //$owners = Channel::getOwner("");
        //$channels = Channel::getChannels("ORDER BY id DESC LIMIT 4");
        $content = Channel::getContent("ORDER BY id DESC");
        //$firstChannels = Channel::getChannels("ORDER BY id ASC LIMIT 4");
        //$firstChannels = Channel::getChannels("ORDER BY id ASC");
        //MainView::render('home', ['channel' => $channels, 'owners' => $owners, 'firstChannels' => $firstChannels, 'notification' => $notification]);
        MainView::render('home', ['content' => $content]);
    }

    /**
     * Search page method calls the render method, passing in the searched content if any found to render the search page view.
     * 
     * Method searchPage.
     * @return void
     */
    public function searchPage(): void
    {
        //$notification = Profile::getPlaylist("LIMIT 2", $_SESSION['id']);
        //$notification = Profile::getPlaylist("", $_SESSION['id']);
        //$owners = Channel::getOwner("LIMIT 6");
        //$owners = Channel::getOwner("");
        //$channels = Channel::searchChannels(isset($_GET['key']) ? $_GET['key'] : '');
        $content = Channel::searchContent(isset($_GET['key']) ? $_GET['key'] : 'none');
        MainView::render('search-page', ['search-content' => $content]);
    }

    /**
     * Exception handler method calls the render method on the view to render (display) and generated errors.
     * 
     * Method exceptionHandler.
     * @return void
     */
    public function exceptionHandler(): void
    {
        MainView::renderAuth('exception-handler', []);
    }
}
