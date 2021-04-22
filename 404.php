<?php get_header(); ?>

<main role="main">
    <!-- section -->
    <section>

        <!-- article -->
        <article id="post-404">

            <h1><?php echo('Nie znaleziono strony'); ?></h1>
            <h2>
                <a href="<?php echo home_url(); ?>"><?php echo('Wróc na strone główną.') ?></a>
            </h2>

        </article>
        <!-- /article -->

    </section>
    <!-- /section -->
</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>