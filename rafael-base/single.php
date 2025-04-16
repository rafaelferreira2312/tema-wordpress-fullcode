<?php
/**
 * The template for displaying all single posts
 * Utiliza componentes da pasta components/
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

                get_template_part('components/content', get_post_type());

                the_post_navigation([
                    'prev_text' => '<span class="nav-subtitle">' . esc_html__('Anterior:', 'rafael-base') . '</span> <span class="nav-title">%title</span>',
                    'next_text' => '<span class="nav-subtitle">' . esc_html__('Próximo:', 'rafael-base') . '</span> <span class="nav-title">%title</span>',
                ]);

                if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;

            endwhile;
            ?>

        </main><!-- .site-main -->

        <?php get_sidebar(); ?>
    </div><!-- .content-area -->
</div><!-- .container -->

<?php
get_footer();