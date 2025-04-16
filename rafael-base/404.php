<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Rafael Base
 */

get_header();
?>

<div class="container">
    <div class="content-area">
        <main class="site-main">

            <section class="error-404 not-found">
                <header class="page-header">
                    <h1 class="page-title"><?php esc_html_e('Oops! Página não encontrada.', 'rafael-base'); ?></h1>
                </header><!-- .page-header -->

                <div class="page-content">
                    <p><?php esc_html_e('Parece que nada foi encontrado neste local. Talvez tente uma pesquisa?', 'rafael-base'); ?></p>

                    <?php get_search_form(); ?>

                    <div class="widget widget_categories">
                        <h2 class="widget-title"><?php esc_html_e('Categorias Populares', 'rafael-base'); ?></h2>
                        <ul>
                            <?php
                            wp_list_categories([
                                'orderby'    => 'count',
                                'order'      => 'DESC',
                                'show_count' => 1,
                                'title_li'   => '',
                                'number'     => 5,
                            ]);
                            ?>
                        </ul>
                    </div><!-- .widget -->

                    <?php
                    /* translators: %1$s: smiley */
                    $rafael_base_archive_content = '<p>' . sprintf(esc_html__('Tente olhar nos arquivos mensais. %1$s', 'rafael-base'), convert_smilies(':)')) . '</p>';
                    the_widget('WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$rafael_base_archive_content");

                    the_widget('WP_Widget_Tag_Cloud');
                    ?>

                </div><!-- .page-content -->
            </section><!-- .error-404 -->

        </main><!-- .site-main -->

        <?php get_sidebar(); ?>
    </div><!-- .content-area -->
</div><!-- .container -->

<?php
get_footer();