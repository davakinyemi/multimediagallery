<?php

namespace app\Controllers;

use app\Services\MainView;
use app\Models\Channel;
use app\Models\ChannelContent;
use app\Models\Profile;

/**
 * Content controller class which controls methods to handle user interaction with media content.
 * It extends the ChannelContent model class and is made up of the methods content, createContent, storeCreateContent and setLike.
 * 
 * Class ChannelContentController
 * @package app\Controllers
 */
class ChannelContentController extends ChannelContent
{
    /**
     * Content method gets uploaded content and calls the view render method to render the content.
     * 
     * Method content.
     * @return void
     */
    public function content(): void
    {
        // $notification = Profile::getPlaylist("LIMIT 2", $_SESSION['id']);
        //$notification = Profile::getPlaylist("", $_SESSION['id']);
        $content = ChannelContent::getContent($_GET['id']);
        //$contents = ChannelContent::schemaGetChannelContent($content['channel']);
        $contents = ChannelContent::schemaGetContent();
        //$owners = Channel::getOwner("LIMIT 6");
        //$owners = Channel::getOwner("");
        //$channels =  Channel::getChannels("");
        //MainView::render('channel-content', ['owners' => $owners, 'notification' => $notification, 'channels' => $channels, 'content' => $content, 'contents' => $contents]);
        MainView::render('channel-content', ['content' => $content, 'contents' => $contents]);
    }

    /**
     * Create content method calls the view render method to render the view with a form to create and upload content.
     * 
     * Method createContent.
     * @return void
     */
    public static function createContent(): void
    {
        //$notification = Profile::getPlaylist("LIMIT 2", $_SESSION['id']);
        //$notification = Profile::getPlaylist("", $_SESSION['id']);
        //$userChannel = ChannelContent::schemaGetUserChannelBySession();
        //$owners = Channel::getOwner("LIMIT 6");
        //$owners = Channel::getOwner("");
        //$channels =  Channel::getChannels("");
        //MainView::render('create-content', ['owners' => $owners, 'notification' => $notification, 'channels' => $channels, 'userChannel' => $userChannel]);
        MainView::render('create-content', []);
    }

    /**
     * Store created content method calls the addNewContent method on the ChannelContent model object, passing in the submitted content data.
     * 
     * Method storeCreateContent.
     * @return void
     */
    public function storeCreateContent(): void
    {
        if (isset($_POST['create-content'])) {
            //(new ChannelContent)->addNewContent($_SESSION['id'], $_POST['channel'], $_POST['title'], $_POST['description'], $_FILES['thumbnail'], $_FILES['video'], 0, 0);
            (new ChannelContent)->addNewContent($_SESSION['id'], $_POST['title'], $_POST['description'], $_FILES['thumbnail'], $_FILES['video'], 0, 0);
        }
    }

    /**
     * Set like method handles likes and dislikes.
     * 
     * Method setLike.
     * @return void
     */
    public function setLike(): void
    {
        if (isset($_GET['like'])) {
            (new ChannelContent)->addLike($_GET['content'], $_GET['like']);
        } elseif (isset($_GET['dislike'])) {
            (new ChannelContent)->addDislike($_GET['content'], $_GET['dislike']);
        }
    }
}
