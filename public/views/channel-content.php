<section class="channel-content mr-top-default mr-bottom-default">
    <div class="wrap w90 center">
        <figure style="background-image:url('<?= PATH_UPLOADS ?>/images/thumbnails/<?= $params['content']['thumbnail'] ?>')" class="img-bigger-channel items-flex align-end">
            <video controls class="video-content">
                <source src="<?= PATH_UPLOADS ?>/media/videos/<?= $params['content']['media_file'] ?>">
            </video>
        </figure>
    </div>
</section>

<section class="container-channel-about mr-bottom-default">
    <div class="wrap w90 center items-flex just-space-between flex-wrap-dv-small">
        <div class="box w50 w100-dv-small mr-dv-bottom-default">
            <h4 class="mr-bottom-tiny">About</h4>
            <p class="mr-bottom-small"><?= $params['content']['description'] ?></p>
            <div class="items-flex align-center">
                <p class="mr-right-small">Likes: <span id="count-likes"> <?= $params['content']['likes'] ?></span></p>
                <p>Dislikes: <span id="count-dislikes"><?= $params['content']['dislikes'] ?></span></p>
            </div>
        </div>
        <div class="box w45 pos-relative w100-dv-small items-flex direction-column just-space-between">
            <div class="mr-bottom-small">
                <h4 class="mr-bottom-tiny">Title</h4>
                <p><?= $params['content']['title'] ?></p>
            </div>
            <div class="items-flex align-center just-space-between">
                <!--<form method="POST" action="<?php /*PATH_BASE*/ ?>/add-playlist" class="action-add">
                    <input type="hidden" name="content" value="<?php /*$params['content']['id']*/ ?>" />
                    <button type="submit" name="add-content"><i class="ri-heart-fill"></i></button>
                </form>-->
                <form method="GET" action="<?= PATH_BASE ?>/channel-content/?id=<?= $params['content']['id'] ?>" class="likes items-flex align-center">
                    <input type="hidden" name="content" id="channel_content" value="<?= $params['content']['id'] ?>" />
                    <button type="submit" name="like" id="btn-like" value="<?= $params['content']['likes'] + 1 ?>"><i id="like" class="ri-thumb-up-line"></i></button>
                    <button type="submit" name="dislike" id="btn-dislike" value="<?= $params['content']['dislikes'] + 1 ?>"><i id="dislike" class="ri-thumb-down-line"></i></button>
                </form>
            </div>
        </div>
    </div>
</section>

<!--<section class="container-initial container-search w90 center mr-bottom-default">
    <div class="wrap">
        <div class="row items-flex align-center just-space-between mr-bottom-small">
            <h5>Contents Channel: <?php /*count($params['contents'])*/ ?></h5>
            <a href="<?php /*PATH_BASE*/ ?>/search-page?name=&search=" class="font-weak">See All</a>
        </div>
        <ul class="row list-channels items-flex flex-wrap">
            <?php
            /*foreach ($params['contents'] as $channel) {
                include 'components/box-channel-content.php';
            }*/
            ?>
        </ul>
    </div>
</section>-->



<script src="<?= PATH_PUBLIC ?>/js/like.js"></script>