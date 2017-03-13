<?php

// $range - сколько страниц выводить до и после текущей страницы
function oriolo_pagination($pages = '', $range = 1)
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