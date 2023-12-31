<section class="mr-bottom-default">
    <form method="GET" action="<?= PATH_BASE ?>/content-creators" class="wrap w90 center items-flex">
        <input type="text" name="name" placeholder="Search..." autocomplete="off" class="w80 mr-right-small" />
        <button type="submit" name="search-user" class="w20 button-default"><span class="hide-dv-small">Search</span> <i class="ri-search-line mr-left-tiny mr-none"></i></button>
    </form>
</section>

<section class="container-initial container-search w90 center mr-bottom-default">
    <div class="wrap">
        <div class="row items-flex align-center just-space-between mr-bottom-small block-dv-small">
            <h5>Results: <?= count($params['ownersSearch']) ?></h5>
            <!--<a href="<?php /*PATH_BASE*/ ?>/content-creators?name=&search-user=" class="font-weak">See All</a>-->
        </div>
        <ul class="row list-channels items-flex flex-wrap">
            <?php
            foreach ($params['ownersSearch'] as $user) {
                include 'components/box-content-creator.php';
            }
            ?>
        </ul>
    </div>
</section>