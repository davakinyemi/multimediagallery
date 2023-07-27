<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MMG</title>

    <link rel="stylesheet" href="<?= PATH_PUBLIC ?>/css/util/base.css" type="text/css">
    <link rel="stylesheet" href="<?= PATH_PUBLIC ?>/css/util/util.css" type="text/css">
    <link rel="stylesheet" href="<?= PATH_PUBLIC ?>/css/style.css" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
</head>

<body>
    <aside class="panel w17 h100vh hide-dv-small">
        <div class="wrap w90 center">
            <div class="logo mr-bottom-tiny">
                <a class="items-flex align-center">
                    <i class="ri-gallery-fill mr-right-tiny"></i>
                    <!--<span></span>
                    <span></span>
                    <span></span>-->
                    MultiMG
                </a>
            </div>
            <nav class="menu items-flex flex-wrap direction-column">
                <ul class="mr-bottom-small">
                    <h6 class="mr-bottom-tiny">Menu</h6>
                    <li><a href="<?= PATH_BASE ?>/home"> <i class="ri-home-fill"></i> Home </a></li>
                    <li><a href="<?= PATH_BASE ?>/search-page"> <i class="ri-search-fill"></i> Search </a></li>
                    <li><a href="<?= PATH_BASE ?>/create-content"> <i class="ri-folder-reduce-fill"></i> New Video </a></li>
                    <!--<li><a href="<?php /*PATH_BASE*/ ?>/search-page?name=&search="> <i class="ri-compass-3-fill"></i> Discover </a></li>-->
                    <!--<li><a href="<?php /*PATH_BASE*/ ?>/playlists"> <i class="ri-bookmark-2-fill"></i> Playlists </a></li>-->
                    <!--<li><a href="<?php /*PATH_BASE*/ ?>/content-creators"> <i class="ri-user-3-fill"></i> Content Creators </a></li>-->
                </ul>
                <!--<ul class="mr-bottom-small">
                    <h6 class="mr-bottom-tiny">Library</h6>-->
                <!--<li><a href="<?php /*PATH_BASE*/ ?>/recents"> <i class="ri-time-fill"></i> Recents </a></li>-->
                <!--<li><a href="<?php /*PATH_BASE*/ ?>/favourites"> <i class="ri-heart-fill"></i> Favourites </a></li>-->
                <!--</ul>-->
                <!--<ul class="mr-bottom-small">
                    <h6 class="mr-bottom-tiny">Channel</h6>
                    <li><a href="<?= PATH_BASE ?>/new-channel"> <i class="ri-add-fill"></i> Create New Channel </a></li>
                    <?php /*foreach ($params['userChannel'] as $key => $userChannel) {*/  ?>
                        <li><a href="<?= PATH_BASE ?>/channel/?id=<?php /*$userChannel['id'] */ ?>"> <i class="ri-file-list-2-fill"></i> <?php /*$userChannel['title']*/ ?> </a></li>
                    <?php /*}*/ ?>
                </ul>-->
                <ul>
                    <h6 class="mr-bottom-tiny">Account</h6>
                    <li><a href="<?= PATH_BASE ?>/profile"> <i class="ri-settings-4-fill"></i> Profile </a></li>
                    <li><a href="<?= PATH_BASE ?>/?logout"> <i class="ri-logout-box-r-fill"></i> Logout </a></li>
                    <li class="hide-dv-bigger toggle"><a> <i class="ri-arrow-left-line"></i> Close </a></li>
                </ul>
            </nav>
        </div>
    </aside>

    <main class="container">

        <header class="mr-bottom-small">
            <div class="wrap w90 center items-flex align-center">
                <nav class="col w50 items-flex align-center">
                    <!--<li class="mr-right-small hide-dv-small"> <a href="<?= PATH_BASE ?>"> Nav Item I </a> </li>
                    <li class="mr-right-small hide-dv-small"> <a href="<?= PATH_BASE ?>"> Nav Item II </a> </li>
                    <li class="mr-right-small hide-dv-small"> <a href="<?= PATH_BASE ?>"> Nav Item III </a> </li>
                    <li class="mr-right-small hide-dv-small"> <a href="<?= PATH_BASE ?>"> Nav Item IV </a> </li>-->
                    <li class="hide-dv-bigger toggle"> <a> <i class="ri-menu-line"></i> </a> </li>
                </nav>
                <div class="col w50 items-flex align-center just-end">
                    <a class="circles toggle-right items-flex align-center">
                        <span></span>
                        <span></span>
                    </a>
                </div>
            </div>
        </header>