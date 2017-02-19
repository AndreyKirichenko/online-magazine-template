<?php get_header(); ?>

    <div class="page">
        <section class="page__section">
            <main class="page__main">
                <div class="teasers">
                    <h3 class="teasers__header">Читайте в номере</h3>
                    <ul class="teasers__list">
                        <li class="teasers__item"><a href="/" class="teasers__item-link"><img src="http://kulick.ru/wp-content/uploads/2017/02/252-900x400.jpg" class="teasers__item-img">
                                <div class="teasers__item-info">
                                    <div class="info">
                                        <time datetime="2011-09-28" pubtime="pubtime" class="info__pubtime">2011-09-28</time>
                                        <div class="info__category">Теория</div>
                                    </div>
                                </div>
                                <h3 class="teasers__item-header">АФИША ПЕТЕРБУРГА 5 ФЕВРАЛЯ — 26 ФЕВРАЛЯ</h3>
                                <div class="teasers__item-text">Как бы много дел не появлялось, не забывайте находить хотя бы час на то, чтобы порадовать свою душу.</div>
                                <div class="teasers__item-button">Читать</div>
                            </a>
                        </li>
                    </ul>
                </div>
            </main>
            <aside class="page__side">
                <?php get_sidebar( $name ); ?>
            </aside>
        </section>
    </div>
<?php get_footer(); ?>