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

    <script defer="true" type="text/javascript" src="//vk.com/js/api/openapi.js?140"></script>
    <script defer="true" src="https://use.fontawesome.com/2f1a761a4b.js"></script>
    <script defer="true" src="/wp-content/themes/mostmag/js/index.js"></script>
    <link rel="stylesheet" href="/wp-content/themes/mostmag/css/index.css?1" />


    <?php get_template_part( 'yandex-metrika' ); ?>
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
            <a href="/" title="Журнал Мост" class="header__logo"></a>
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

    <div class="layout__inner-wrapper js-layout__inner-wrapper">
        <div class="layout__page">