<?php

include_once ('includes/main-menu-walker.php');
include_once ('includes/drawer-menu-walker.php');

function enqueue_styles() {
    wp_enqueue_style( 'whitesquare-style', get_stylesheet_uri());
    wp_register_style('font-style', 'http://fonts.googleapis.com/css?family=Oswald:400,300');
    wp_enqueue_style( 'font-style');
}
add_action('wp_enqueue_scripts', 'enqueue_styles');

function enqueue_scripts () {
    wp_register_script('html5-shim', 'http://html5shim.googlecode.com/svn/trunk/html5.js');
    wp_enqueue_script('html5-shim');
}
add_action('wp_enqueue_scripts', 'enqueue_scripts');

if (function_exists('add_theme_support')) {
    add_theme_support('menus');
}

show_admin_bar(false);

if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
}

function wpdocs_custom_excerpt_length( $length ) {
    return 12;
}

function wpdocs_excerpt_more( $more ) {
    return '&nbsp;…';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

/*
* Pagination
*/

// $range - сколько страниц выводить до и после текущей страницы
function oriolo_pagination($pages = '', $range = 6)
{
    $showitems = ($range * 2)+1;
    global $paged;
    if(empty($paged)) $paged = 1;
    if($pages == '')
    {
        global $wp_query;

        // $pages - это общее число страницы, запомним это, дальше оно нам понадобится
        $pages = $wp_query->max_num_pages;

        if(!$pages)
        {
            $pages = 1;
        }
    }

    // здесь начинается вывод навигации
    if(1 != $pages)
    {

        // я изменила название класса на pager
        echo "<div class='pager'>";

        // изменен порядок вывода кнопок со ссылками на первую страницу и на предыдущую
        // добавлен класс button previous для кнопки со ссылкой на предыдущую страницу
        if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."' class='pager__button'>Предыдущая</a>";

        // добавлена строка с <div class='pages'> - внутри него будут кнопки со страницами
        echo "<div class='pager__pages'>";

        // кнопка первой страницы
        if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a class='pager__page' href='".get_pagenum_link(1)."'>1</a>";

        // вывод всех остальных страниц
        for ($i=1; $i <= $pages; $i++)
        {
            if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
            {
                // к текущей странице добавим класс active
                echo ($paged == $i)? "<a class='pager__page pager__page_active'>".$i."</a>":"<a class='pager__page' href='".get_pagenum_link($i)."' >".$i."</a>";
            }
        }

        // перед выводом кнопки с последней страницей добавлен <span> с многоточием
        // текстом ссылки будет общее количество страниц: $pages
        if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<span>…</span><a class='pager__page' href='".get_pagenum_link($pages)."'> $pages </a>";

        // закроем div со страницами
        echo "</div>";

        // выведем кнопку со следующей страницей
        if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."' class='pager__button pager__button_next'>Следующая</a>";

        echo "</div>\n";
    }
}
