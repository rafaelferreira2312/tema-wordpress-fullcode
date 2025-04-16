<?php
/**
 * The template for displaying all pages
 *
 * @package Rafael Base
 */

get_header();
?>

<div class="container">
    <div class="content-area">
        <main class="site-main">

            <?php
            while (have_posts()) :
                the_post();

                get_template_part('template-parts/content', 'page');

                // If comments are open or we have at least one comment, load up the comment template.
                if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;

            endwhile; // End of the loop.
            ?>

        </main><!-- .site-main -->

        <?php get_sidebar(); ?>
    </div><!-- .content-area -->
</div><!-- .container -->

<?php
get_footer();