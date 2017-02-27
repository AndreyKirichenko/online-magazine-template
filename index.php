<?php get_header(); ?>
    <div class="page">
        <section class="page__section">
            <main class="page__main">
                <div class="teasers">
                    <h3 class="teasers__header">Читайте в номере</h3>
                    <ul class="teasers__list">
                        <?php while ( have_posts() ) : the_post(); ?>
                            <li class="teasers__item">

                            <a href="<?php echo my_permalink(); ?>" class="teasers__item-link">
                                <?php
                                    $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'your_thumb_handle' );
                                ?>
                                <img src="<?php echo $thumbnail['0']; ?>" class="teasers__item-img">
                                <div class="teasers__item-info">
                                    <div class="info">
                                        <time datetime="<?php the_time('d-m-Y'); ?>" pubtime="pubtime" class="info__pubtime"><?php the_time('d-m-Y'); ?></time>
                                        <div class="info__category"></div>
                                    </div>
                                </div>

                                <h3 class="teasers__item-header">
                                    <?php the_title(); ?>
                                </h3>

                                <div class="teasers__item-text">
                                    <?php the_excerpt(); ?>
                                </div>

                                <div class="teasers__item-button">Читать</div>
                            </a>
                        </li>
                        <?php endwhile; ?>
                    </ul>

                    <?php oriolo_pagination(); ?>
                </div>
            </main>
            <aside class="page__side">
                <?php get_sidebar( $name ); ?>
            </aside>
        </section>
    </div>
<?php get_footer(); ?>
