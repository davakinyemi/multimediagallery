<?php

namespace src\Repository;

use app\Services\ConnectionFactory;

/**
 * Class ChannelRepository
 * 
 * @package src\Repository
 */
class ChannelRepository
{
    /**
     * @var string $subscribers
     */
    public static string $subscribers;

    /**
     * @param int $owner
     * @param string $title
     * @param string $about
     * @param string $content
     * @param string $subscribers
     * 
     * @return void
     */
    protected static function schemaNewChannel(int $owner, string $title, string $about, string $image, string $content, string $subscribers): void
    {
        $newChannel = ConnectionFactory::connect()->prepare("INSERT INTO channels (user_id, title, description, image, content, subscribers) VALUES (?,?,?,?,?,?)");
        $newChannel->execute(array((int) $owner, (string) $title, (string) $about, (string) $image, (string) $content, (string) $subscribers));
    }

    /*protected static function schemaChannels($query): array
    {
        $channels = ConnectionFactory::connect()->prepare("SELECT * FROM channels $query");
        $channels->execute();
        $channels = $channels->fetchAll(\PDO::FETCH_ASSOC);
        return $channels;
    }*/

    /**
     * Get content based on query passed.
     * 
     * @param mixed $query
     * 
     * @return array $content
     */
    protected static function schemaContent($query): array
    {
        $content = ConnectionFactory::connect()->prepare("SELECT * FROM content $query");
        $content->execute();
        $content = $content->fetchAll(\PDO::FETCH_ASSOC);
        return $content;
    }
    protected static function schemaGetChannelById($id): array
    {
        $channels = ConnectionFactory::connect()->prepare("SELECT * FROM channels WHERE id = $id");
        $channels->execute();
        $channels = $channels->fetch(\PDO::FETCH_ASSOC);
        return $channels;
    }

    /*protected static function schemaSearchChannels($key): array
    {
        $query = isset($name) ? "WHERE title LIKE '$key%' OR description LIKE '$key%'" : '';
        $results = ConnectionFactory::connect()->prepare("SELECT * FROM channels $query");
        $results->execute();
        $results = $results->fetchAll(\PDO::FETCH_ASSOC);
        return $results;
    }*/

    /**
     * Search for content based on key passed.
     * 
     * @param mixed $key
     * 
     * @return array $results
     */
    protected static function schemaSearchContent($key): array
    {
        $query = "WHERE title LIKE '%$key%' OR description LIKE '%$key%'";
        $results = ConnectionFactory::connect()->prepare("SELECT * FROM content $query");
        $results->execute();
        $results = $results->fetchAll(\PDO::FETCH_ASSOC);
        return $results;
    }

    /*protected static function schemaSearchUsersChannels($key): array
    {
        return ChannelRepository::schemaSearchChannels($key);
    }*/

    protected static function schemaGetChannelOwner($query): array
    {
        $owners = ConnectionFactory::connect()->prepare("SELECT * FROM users $query");
        $owners->execute();
        $owners = $owners->fetchAll(\PDO::FETCH_ASSOC);
        return $owners;
    }

    protected static function schemaAddSubscriber(int $channel, string $subscribers): void
    {
        $follow = ConnectionFactory::connect()->prepare("UPDATE channels SET subscribers = ? WHERE id = $channel");
        $follow->execute(array($subscribers));
    }

    protected static function schemaGetSubscribers(int $id): array
    {
        $subscribers = ConnectionFactory::connect()->prepare("SELECT (id, subscribers) FROM channels WHERE id = $id");
        $subscribers->execute();
        $subscribers = $subscribers->fetch();
        return $subscribers;
    }
}
