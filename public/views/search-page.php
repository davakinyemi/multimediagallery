<section class="mr-bottom-default">
    <form method="GET" action="<?= PATH_BASE ?>/search-page" class="wrap w90 center items-flex">
        <input type="text" name="key" placeholder="Search..." autocomplete="off" class="w80 mr-right-small" />
        <button type="submit" name="search" class="w20 button-default"><span class="hide-dv-small">Search</span> <i class="ri-search-line mr-left-tiny mr-none"></i></button>
    </form>
</section>

<!--<section class="container-initial container-search w90 center mr-bottom-default">
    <div class="wrap">
        <div class="row items-flex align-center just-space-between mr-bottom-small block-dv-small">
            <h5>Results: <?php /*count($params['channels'])*/ ?></h5>
            <!--<a href="<?php /*PATH_BASE*/ ?>/search-page?name=&search=" class="font-weak">See All</a>-->
<!--</div>
        <ul class="row list-channels items-flex flex-wrap">-->
<?php
/*foreach ($params['channels'] as $channel) {
                include 'components/box-single-small.php';
            }*/
?>
<!--</ul>
    </div>
</section>-->

<section class="container-initial container-search w90 center mr-bottom-default">
    <div class="wrap">
        <div class="row items-flex align-center just-space-between mr-bottom-small">
            <h5>Found: <?= count($params['search-content']) ?></h5>
        </div>
        <ul class="row list-channels items-flex flex-wrap">
            <?php
            foreach ($params['search-content'] as $content) {
                include 'components/box-channel-content.php';
            }
            ?>
        </ul>
    </div>
</section>