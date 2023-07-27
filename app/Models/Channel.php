<?php

namespace app\Models;

use src\Helpers\MessageAuth;
use src\Repository\ChannelRepository;
use src\Middlewares\ChannelAuth;

/**
 * Class Channel extends ChannelRepository.
 * 
 * @package app\Models
 */
class Channel extends ChannelRepository
{
    /**
     * @param mixed $id
     * 
     * @return array $channel
     */
    protected static function getUserChannel($id): array
    {
        $channel = ChannelRepository::schemaGetChannelById($id);
        return $channel;
    }

    /**
     * @param int $owner
     * @param string $title
     * @param string $description
     * @param array $image
     * @param string $content
     * @param string $subscribers
     * 
     * @return void
     */
    protected static function newChannel(int $owner, string $title, string $description, array $image, string $content, string $subscribers): void
    {
        $verifyTitle = ChannelAuth::verifyTitle($title);
        $verifyImage = ChannelAuth::verifyImage($image);

        if ($verifyTitle === false || $verifyImage === false) return;

        ChannelRepository::schemaNewChannel((int) $owner, (string) $title, (string) $description, (string) $image['name'], (string) $content, (string) $subscribers);
        if (move_uploaded_file($image['tmp_name'], dirname(__DIR__, 2) . '/uploads/images/channels/' . $image['name']) == false) {
            MessageAuth::setMessage('error', 'Error occurred while uploading image!');
            return;
        }
        MessageAuth::setMessage('success', 'Channel created successfully!');
    }

    /*public static function getChannels($query): array
    {
        $channels = ChannelRepository::schemaChannels($query);
        return $channels;
    }*/

    /**
     * Get content based on query parameter.
     * 
     * @param mixed $query
     * 
     * @return array $content
     */
    public static function getContent($query): array
    {
        $content = ChannelRepository::schemaContent($query);
        return $content;
    }

    /*public static function searchChannels($key): array
    {
        $search = ChannelRepository::schemaSearchChannels($key);
        return $search;
    }*/

    /**
     * Search for content based on search key.
     * 
     * @param mixed $key
     * 
     * @return array $content
     */
    public static function searchContent($key): array
    {
        $search = ChannelRepository::schemaSearchContent($key);
        return $search;
    }

    /*public static function searchUsersChannels($key): array
    {
        $search = ChannelRepository::schemaSearchUsersChannels($key);
        return $search;
    }*/

    /**
     * @param mixed $query
     * 
     * @return array $owners
     */
    public static function getOwner($query): array
    {
        $owners = ChannelRepository::schemaGetChannelOwner($query);
        return $owners;
    }

    /**
     * @param int $channel
     * @param string $subscribers
     * 
     * @return void
     */
    protected static function addNewSubscriber(int $channel, string $subscribers): void
    {
        ChannelRepository::schemaAddSubscriber((int) $channel, (string) $subscribers);
    }

    /**
     * @param int $id
     * 
     * @return array $subscribers
     */
    protected static function getSubscribers(int $id): array
    {
        $subscribers = ChannelRepository::schemaGetSubscribers((int) $id);
        return $subscribers;
    }

    /*public static function getChannelsAsJSON(): string | false
    {
        $channels = ChannelRepository::schemaChannels("");
        return json_encode($channels);
    }*/
}
