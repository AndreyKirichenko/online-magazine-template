<?php get_header(); ?>
    <div class="page">
        <section class="page__section">
            <main class="page__post">
                <article class="post">
                    <h1>Поиск по: "<?php echo $_GET['s'];?>"</h1>
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <a href="<?php the_permalink();?>"><?php the_title(); ?></a>
                        <?php the_content(''); ?>
                    <?php endwhile; else: ?>
                        <p>Поиск не дал результатов.</p>
                    <?php endif;?>
                </article>
            </main>
        </section>
    <div>
<?php get_footer(); ?>