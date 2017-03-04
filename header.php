<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <meta http-equiv="Content-type" content="text/html; charset=<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <title><?php wp_title('«', true, 'right'); ?> <?php bloginfo('name'); ?></title>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

    <?php wp_head(); ?>

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&amp;amp;subset=cyrillic-ext" rel="stylesheet">
    <script async="true" type="text/javascript" src="//vk.com/js/api/openapi.js?140"></script>
    <script async="true" src="https://use.fontawesome.com/2f1a761a4b.js"></script>
    <script async="true" src="/wp-content/themes/mostmag/js/index.js"></script>
</head>
<body class="layout">
<div class="layout__outer-wrapper">
    <div class="layout__drawer">
        <div aria-hidden="true" class="drawer">
            <input id="drawer__checkbox" type="checkbox" class="drawer__checkbox">
            <label for="drawer__checkbox" class="drawer__handler"><span class="drawer__hamburger"><span class="drawer__hamburger-icon"><span class="drawer__hamburger-icon-line-1"></span><span class="drawer__hamburger-icon-line-2"></span><span class="drawer__hamburger-icon-line-3"></span></span></span></label>
            <nav class="drawer__navigation">
                <?
                    wp_nav_menu(
                        array(
                            'container'       => '',
                            'container_id'    => FALSE,
                            'menu_class'      => 'drawer__navigation-list',
                            'menu_id'         => FALSE,
                            'depth'           => 1,
                            'walker' => new Drawer_menu_walker
                        )
                    );
                ?>
            </nav>
        </div>
    </div>
    <div class="layout__header">
        <header class="header">
            <div class="header__imaginator"></div>
            <div title="Site logo" class="header__logo"></div>
            <nav class="header__navigation">
                <?
                    wp_nav_menu(
                        array(
                            'container'       => '',
                            'container_id'    => FALSE,
                            'menu_class'      => 'header__navigation-list',
                            'menu_id'         => FALSE,
                            'depth'           => 1,
                            'walker' => new Main_menu_walker
                        )
                    );
                ?>
            </nav>
        </header>
    </div>

    <div class="layout__inner-wrapper">
        <div class="layout__page">