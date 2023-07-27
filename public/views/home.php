<?php require 'components/flash-message.php'; ?>

<!--<section class="container-initial w90 center mr-bottom-default">
    <div class="wrap">
        <div class="row items-flex align-center just-space-between mr-bottom-small">
            <h5>Top Content</h5>
            <!--<a href="<?php /*PATH_BASE*/ ?>/search-page?name=&search=" class="font-weak">See All</a>-->
<!--</div>
        <ul class="row list-channels items-flex">
            <?php
            /*foreach ($params['channels'] as $channel) {
                include 'components/box-single-small.php';
            }*/
            ?>
        </ul>
    </div>
</section>-->

<!--<section class="container-initial w90 center mr-bottom-default">
    <div class="wrap">
        <div class="row items-flex align-center just-space-between mr-bottom-small">
            <h5>Content:</h5>
            <!--<a href="<?php /*PATH_BASE*/ ?>/search-page?name=&search=" class="font-weak">See All</a>-->
<!--</div>
        <ul class="row list-channels items-flex">-->
<?php
/*foreach ($params['firstChannels'] as $channel) {
                include 'components/box-single-small.php';
            }*/
?>
<!--</ul>
    </div>
</section>-->

<section class="container-initial container-search w90 center mr-bottom-default">
    <div class="wrap">
        <div class="row items-flex align-center just-space-between mr-bottom-small">
            <h5>Content: <?= count($params['content']) ?></h5>
        </div>
        <ul class="row list-channels items-flex flex-wrap">
            <?php
            foreach ($params['content'] as $content) {
                include 'components/box-channel-content.php';
            }
            ?>
        </ul>
    </div>
</section>