<li class="box">
    <figure class="img-small-channel pos-relative">
        <img src="<?= PATH_UPLOADS ?>/images/thumbnails/<?= $content['thumbnail'] ?>" />
        <a href="<?= PATH_BASE ?>/channel-content/?id=<?= $content['id'] ?>" class="button"><i class="ri-play-mini-fill"></i></a>
    </figure>
    <h5 class="limit-line-one"><?= $content['title'] ?></h5>
    <p class="font-size-tiny limit-line-one"><?= $content['description'] ?></p>
</li>