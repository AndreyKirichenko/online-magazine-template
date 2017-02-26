<?php get_header(); ?>
    <div class="page">
        <section class="page__section">
            <main class="page__main">
                <?php while ( have_posts() ) : the_post(); ?>
                    <article class="post">

                        <?php
                        $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'your_thumb_handle' );
                        ?>
                        <img src="<?php echo $thumbnail['0']; ?>" />

                        <div class="post__info">
                            <div class="info">
                                <time datetime="<?php the_time('d-m-Y'); ?>" pubtime="pubtime" class="info__pubtime">
                                    <?php the_time('d/m/Y'); ?>
                                </time>
                            </div>
                        </div>

                        <h1>
                            <?php the_title(); ?>
                        </h1>

                        <?php
                        $content = get_the_content();
                        $content = preg_replace( '/(width|height|sizes)=\"\d*\"\s/', "", $content );
                        $content = apply_filters('the_content', $content);
                        echo $content;
                        ?>
                    </article>
                <?php endwhile; ?>
            </main>
            <aside class="page__side">
                <?php get_sidebar( $name ); ?>
            </aside>
        </section>
    </div>
<?php get_footer(); ?>