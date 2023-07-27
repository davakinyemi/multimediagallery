<?php

namespace app\Models;

use src\Repository\ContentRepository;
use src\Helpers\MessageAuth;
use src\Middlewares\ChannelAuth;

/**
 * Class ChannelContent extends ContentRepository
 * 
 * @package app\Models
 */
class ChannelContent extends ContentRepository
{
    /**
     * Get content based on id.
     * 
     * @param int $id
     * 
     * @return array $content
     */
    protected static function getContent(int $id): array
    {
        $content = ContentRepository::schemaGetContentById($id);
        return $content;
    }

    /**
     * Add new content if verification passes.
     * 
     * @param int $owner
     * @param string $title
     * @param string $description
     * @param array $thumbnail
     * @param array $video
     * @param int $likes
     * @param int $dislikes
     * 
     * @return void
     */
    protected static function addNewContent(int $owner,/* int $channel, */ string $title, string $description, array $thumbnail, array $video, int $likes, int $dislikes): void
    {
        $verifyTitle = ChannelAuth::verifyTitle($title);
        $verifyThumbnail = ChannelAuth::verifyImage($thumbnail);
        $verifyVideo = ChannelAuth::verifyVideo($video);

        if ($verifyTitle === false || $verifyThumbnail === false || $verifyVideo === false) return;

        //ContentRepository::schemaCreateContent((int) $owner, (int) $channel, (string) $title, (string) $description, (string) $thumbnail['name'], (string) $video['name'], (int) $likes, (int) $dislikes);
        ContentRepository::schemaCreateContent((int) $owner, (string) $title, (string) $description, (string) $video['name'], (string) $thumbnail['name'], (int) $likes, (int) $dislikes);
        if (move_uploaded_file($thumbnail['tmp_name'], dirname(__DIR__, 2) . '/uploads/images/thumbnails/' . $thumbnail['name']) == false) {
            MessageAuth::setMessage('error', 'Error occurred while uploading image!');
            return;
        }
        if (move_uploaded_file($video['tmp_name'], dirname(__DIR__, 2) . '/uploads/media/videos/' . $video['name']) == false) {
            MessageAuth::setMessage('error', 'Error occurred while uploading video!');
            return;
        }

        MessageAuth::setMessage('success', 'Content successfully posted!');
    }

    /**
     * @param int $content
     * @param int $like
     * 
     * @return void
     */
    protected function addLike(int $content, int $like): void
    {
        ContentRepository::schemaAddLike($content, $like);
    }

    /**
     * @param int $content
     * @param int $dislike
     * 
     * @return void
     */
    protected function addDislike(int $content, int $dislike): void
    {
        ContentRepository::schemaAddDislike($content, $dislike);
    }

    /**
     * @param int $id
     * 
     * @return array $owner
     */
    public static function getChannelOwner(int $id): array
    {
        $owner = ContentRepository::schemaGetChannelOwnerByIdFromChannel((int) $id);
        return $owner;
    }

    /**
     * @param int $id
     * 
     * @return array $content
     */
    public static function getChannelContent($id): array
    {
        $content = ContentRepository::schemaGetContent($id);
        return $content;
    }
}
