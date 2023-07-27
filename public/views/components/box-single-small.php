<li class="box">
    <figure class="img-small-channel pos-relative">
        <img src="<?= PATH_UPLOADS ?>/images/channels/<?= $channel['image'] ?>" />
        <a href="<?= PATH_BASE ?>/channel/?id=<?= $channel['id'] ?>" class="button"><i class="ri-play-mini-fill"></i></a>
    </figure>
    <h5 class="limit-line-one"><?= $channel['name'] ?></h5>
    <p class="font-size-tiny limit-line-one"><?= $channel['about'] ?></p>
</li>