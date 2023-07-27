<?php

namespace src\Repository;

use app\Services\ConnectionFactory;

/**
 * Class ContentRepository
 * 
 * @package src\Repository
 */
class ContentRepository
{
    /**
     * Create content (add content data to database).
     * 
     * @param int $creator
     * @param string $title
     * @param string $description
     * @param string $video
     * @param string $thumbnail
     * @param int $likes
     * @param int $dislikes
     * 
     * @return void
     */
    protected static function schemaCreateContent(int $creator, string $title, string $description, string $video, string $thumbnail, int $likes, int $dislikes): void
    {
        //$create = ConnectionFactory::connect()->prepare("INSERT INTO content (user_id, channel_id, title, description, media_file, thumbnail, likes, dislikes) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $create = ConnectionFactory::connect()->prepare("INSERT INTO content (user_id, title, description, media_file, thumbnail, likes, dislikes) VALUES (?, ?, ?, ?, ?, ?, ?)");
        //$create->execute(array((int) $creator, (int) $channel, (string) $title, (string) $description, (string) $video, (string) $thumbnail, (string) $likes, (int) $dislikes));
        $create->execute(array((int) $creator, (string) $title, (string) $description, (string) $video, (string) $thumbnail, (string) $likes, (int) $dislikes));
    }

    /*protected static function schemaGetChannelContent(int $id): array
    {
        $content = ConnectionFactory::connect()->prepare("SELECT * FROM content WHERE user_id = $id");
        $content->execute();
        $content = $content->fetchAll(\PDO::FETCH_ASSOC);
        return $content;
    }*/

    /**
     * Get content from database.
     * 
     * @return array $content
     */
    protected static function schemaGetContent(): array
    {
        $content = ConnectionFactory::connect()->prepare("SELECT * FROM content");
        $content->execute();
        $content = $content->fetchAll(\PDO::FETCH_ASSOC);
        return $content;
    }
    protected static function schemaGetUserChannelBySession(): array
    {
        $channel = ConnectionFactory::connect()->prepare("SELECT * FROM channels WHERE user_id = $_SESSION[id]");
        $channel->execute();
        $channel = $channel->fetchAll(\PDO::FETCH_ASSOC);
        return $channel;
    }

    protected static function schemaGetChannelOwnerByIdFromChannel(int $id): array
    {
        $owner = ConnectionFactory::connect()->prepare("SELECT * FROM users WHERE id = $id");
        $owner->execute();
        $owner = $owner->fetch(\PDO::FETCH_ASSOC);
        return $owner;
    }

    /**
     * @return array $content
     */
    protected static function schemaGetContentById(int $id): array
    {
        $content = ConnectionFactory::connect()->prepare("SELECT * FROM content WHERE id = $id");
        $content->execute();
        $content = $content->fetch();
        return $content;
    }

    /**
     * Add like to content.
     * 
     * @param int $content
     * @param int $like
     * 
     * @return void
     */
    protected static function schemaAddLike(int $content, int $like): void
    {
        $liked = ConnectionFactory::connect()->prepare("UPDATE content SET likes = ? WHERE id = $content");
        $liked->execute(array((int) $like));
    }

    /**
     * Add dislike to content.
     * 
     * @param int $content
     * @param int $dislike
     * 
     * @return void
     */
    protected static function schemaAddDislike(int $content, int $dislike): void
    {
        $liked = ConnectionFactory::connect()->prepare("UPDATE content SET dislikes = ? WHERE id = $content");
        $liked->execute(array((int) $dislike));
    }
}
