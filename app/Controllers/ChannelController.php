<?php

namespace app\Controllers;

use app\Services\MainView;
use app\Models\Channel;
use app\Models\ChannelContent;
use app\Models\Profile;

class ChannelController extends Channel
{
    public function index(): void
    {
        //$notification = Profile::getPlaylist("LIMIT 2", $_SESSION['id']);
        $notification = Profile::getPlaylist("", $_SESSION['id']);
        // $channels = Channel::getChannels("");
        //$owners = Channel::getOwner("LIMIT 6");
        $owners = Channel::getOwner("");
        MainView::render('new-channel', ['owners' => $owners /*, 'channels' => $channels*/, 'notification' => $notification]);
    }

    public function channelStore(): void
    {
        if (isset($_POST['new-channel'])) {
            Channel::newChannel($_SESSION['id'], $_POST['title'], $_POST['description'], $_FILES['image'], '0', '0');
        }
    }

    public function getChannel(): void
    {
        //$notification = Profile::getPlaylist("LIMIT 2", $_SESSION['id']);
        $notification = Profile::getPlaylist("", $_SESSION['id']);
        //$owners = Channel::getOwner("LIMIT 6");
        $owners = Channel::getOwner("");
        // $channels =  Channel::getChannels("");
        $content = ChannelContent::getChannelContent($_GET['id']);
        $channel = Channel::schemaGetChannelOwner($_GET['id']);
        $channelOwner = ChannelContent::getChannelOwner($channel['owner']);
        $subscribers = Channel::getSubscribers($_GET['id']);
        MainView::render('channel', ['channel' => $channel, 'owners' => $owners, 'notification' => $notification, /*'channels' => $channels,*/ 'content' => $content, 'ownerChannel' => $channelOwner, 'subscribers' => $subscribers]);
    }

    public function setSubscriber(): void
    {
        if (isset($_POST['subscribe'])) {
            Channel::addNewSubscriber($_POST['channel'], $_POST['subscribe']);
        }
    }

    public function creators(): void
    {
        //$notification = Profile::getPlaylist("LIMIT 2", $_SESSION['id']);
        $notification = Profile::getPlaylist("", $_SESSION['id']);
        $owners = Channel::getOwner("");
        //$channels = Channel::getChannels("");
        //$ownersSearch = Channel::searchUsersChannels(isset($_GET['key']) ? $_GET['key'] : '');
        MainView::render('content-creators', ['owners' => $owners, 'notification' => $notification/*, 'channels' => $channels, 'ownersSearch' => $ownersSearch*/]);
    }
}
