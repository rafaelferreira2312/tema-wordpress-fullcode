<?php
/**
 * Configurações básicas do tema
 */

add_action('after_setup_theme', 'rafael_base_theme_setup');

function rafael_base_theme_setup() {
    // Suporte a traduções
    load_theme_textdomain('rafael-base', get_template_directory() . '/languages');

    // Suporte a tags de título
    add_theme_support('title-tag');

    // Suporte a thumbnails
    add_theme_support('post-thumbnails');

    // Suporte a menus
    register_nav_menus([
        'primary' => __('Menu Principal', 'rafael-base'),
        'footer'  => __('Menu Rodapé', 'rafael-base')
    ]);

    // Suporte a HTML5
    add_theme_support('html5', [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script'
    ]);

    // Suporte a alinhamento wide/full no Gutenberg
    add_theme_support('align-wide');

    // Suporte a estilos padrão do Gutenberg
    add_theme_support('wp-block-styles');

    // Suporte a editor styles
    add_theme_support('editor-styles');
    add_editor_style('assets/css/editor-style.css');

    // Suporte a responsive embeds
    add_theme_support('responsive-embeds');

    // Definir tamanhos de imagens otimizados
    add_image_size('rafael_hero', 1920, 1080, true);
    add_image_size('rafael_thumbnail', 300, 300, true);
    add_image_size('rafael_medium', 720, 480, true);
}