<?php
/**
 * The template for displaying archive pages
 *
 * @package Rafael Base
 */

get_header();
?>

<div class="container">
    <div class="content-area">
        <main class="site-main">

            <?php if (have_posts()) : ?>

                <header class="page-header">
                    <?php
                    the_archive_title('<h1 class="page-title">', '</h1>');
                    the_archive_description('<div class="archive-description">', '</div>');
                    ?>
                </header><!-- .page-header -->

                <?php
                /* Start the Loop */
                while (have_posts()) :
                    the_post();

                    /*
                     * Include the Post-Type-specific template for the content.
                     * If you want to override this in a child theme, then include a file
                     * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                     */
                    get_template_part('template-parts/content', get_post_type());

                endwhile;

                the_posts_pagination([
                    'prev_text' => esc_html__('Anterior', 'rafael-base'),
                    'next_text' => esc_html__('Próximo', 'rafael-base'),
                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__('Página', 'rafael-base') . ' </span>',
                ]);

            else :

                get_template_part('template-parts/content', 'none');

            endif;
            ?>

        </main><!-- .site-main -->

        <?php get_sidebar(); ?>
    </div><!-- .content-area -->
</div><!-- .container -->

<?php
get_footer();