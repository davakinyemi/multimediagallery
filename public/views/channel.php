<section class="container-channel mr-top-default mr-bottom-default">
    <div class="wrap w90 center">
        <figure style="background-image:url('<?= PATH_UPLOADS ?>/images/channels/<?= $params['channel']['image'] ?>')" class="img-bigger-channel items-flex align-end">
            <div class="pd-all-default">
                <p>Owner: <?= $params['ownerChannel']['name'] ?></p>
                <h2 class="font-size-bigger"><?= $params['channel']['name'] ?></h2>
            </div>
        </figure>
    </div>
</section>

<section class="container-channel-about mr-bottom-default">
    <div class="wrap w90 center items-flex just-space-between flex-wrap-dv-small">
        <div class="box w50 w100-dv-small mr-dv-bottom-default">
            <h4 class="mr-bottom-tiny">About Channel</h4>
            <p class="mr-bottom-small"><?= $params['channel']['about'] ?></p>
            <div class="items-flex align-center">
                <p>Subscribers: <?= count($params['subscribers']) ?></p>
            </div>
        </div>
        <div class="box w45 pos-relative w100-dv-small items-flex direction-column just-space-between">
            <div class="mr-bottom-small">
                <h4 class="mr-bottom-tiny">About Owner</h4>
                <p><?= $params['ownerChannel']['about'] ?></p>
            </div>
            <div>
                <?php if (!str_contains($params['channel']['subscribers'], $_SESSION['id'])) {  ?>
                    <form method="POST" action="<?= PATH_BASE ?>/channel/?id=<?= $params['channel']['id'] ?>" class="action-add w95 items-flex just-end">
                        <input type="hidden" name="channel" value="<?= $params['channel']['id'] ?>" />
                        <button type="submit" name="subscribe" value="<?= $params['channel']['subscribers'] . ',' . $_SESSION['id'] ?>" class="button-default w20">Subscribe</button>
                    </form>
                <?php } ?>
                <div>
                </div>
            </div>
</section>

<section class="container-initial container-search w90 center mr-bottom-default">
    <div class="wrap">
        <div class="row items-flex align-center just-space-between mr-bottom-small">
            <h5>Channel Content: <?= count($params['content']) ?></h5>
            <a href="<?= PATH_BASE ?>/search-page?name=&search=" class="font-weak">See All</a>
        </div>
        <ul class="row list-channels items-flex flex-wrap">
            <?php
            foreach ($params['content'] as $channel) {
                include 'components/box-channel-content.php';
            }
            ?>
        </ul>
    </div>
</section>