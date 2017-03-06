<?php get_header(); ?>
    <div class="page">
        <section class="page__section">
            <aside class="page__post-before">
                <?php
                    previous_post_link('%link', 'Предыдущая статья');
                ?>
            </aside>

            <main class="page__post">
                <?php while ( have_posts() ) : the_post(); ?>
                    <article class="post">
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
                        $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'your_thumb_handle' );
                        ?>
                        <img class="post__main-image" src="<?php echo $thumbnail['0']; ?>" />

                        <?php
                        $content = get_the_content();
                        $content = preg_replace( '/(width|height|sizes)=/', "", $content );
                        $content = apply_filters('the_content', $content);
                        echo $content;
                        ?>
                    </article>
                <?php endwhile; ?>

                <div class="vk-group">
                    <div class="vk-group__widget" id="vk_groups"></div>
                </div>
            </main>

            <aside class="page__post-after">
                <?php
                    next_post_link('%link', 'Следующая статья');
                ?>
            </aside>
        </section>
    </div>
<?php get_footer(); ?>