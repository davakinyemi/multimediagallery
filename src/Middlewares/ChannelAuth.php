<?php

namespace src\Middlewares;

use src\Helpers\MessageAuth;

/**
 * Handle Channel authentication.
 * 
 * Class ChannelAuth extends MessageAuth.
 * 
 * @package src\Middlewares
 */
class ChannelAuth extends MessageAuth
{
    /**
     * @param string $title
     * 
     * @return boolean
     */
    public static function verifyTitle(string $title): bool
    {
        $characters = preg_match("/[\[^\'£$%^&*()}{@:\'#~?><>]]'/", $title);
        if ($characters || $title == '') {
            MessageAuth::setMessage('error', "The title $title is invalid!");
            return false;
        } else {
            return true;
        }
    }

    /**
     * @param array $image
     * 
     * @return boolean
     */
    public static function verifyImage(array $image): bool
    {
        $imageValidation = preg_match('/^image\/(pjpeg|jpeg|png|gif|bmp|jpg)$/', $image['type']);
        $checkImage = getimagesize($image['tmp_name']);
        $fileExists = file_exists(dirname(__DIR__, 2) . '/uploads/images/channels/' . $image['name']);
        if (!$imageValidation || !$checkImage) {
            MessageAuth::setMessage('error', "The file $image is invalid!");
            return false;
        } else if ($fileExists) {
            MessageAuth::setMessage('error', "The file $image is already uploaded!");
            return false;
        } else {
            return true;
        }
    }

    /**
     * @param array $video
     * 
     * @return boolean
     */
    public static function verifyVideo(array $video): bool
    {
        $videoValidation = preg_match('/^video\/(mp4|MOV|AVCHD|WebM)$/', $video['type']);
        $checkVideo = getimagesize($video['tmp_name']);
        $fileExists = file_exists(dirname(__DIR__, 2) . '/uploads/media/videos/' . $video['name']);
        if (!$videoValidation || $checkVideo) {
            MessageAuth::setMessage('error', "The file $video is invalid!");
            return false;
        } else if ($fileExists) {
            MessageAuth::setMessage('error', "The file $video is already uploaded!");
            return false;
        } else {
            return true;
        }
    }
}
