<?php
/**
 * Carregamento otimizado de scripts e estilos
 */

add_action('wp_enqueue_scripts', 'rafael_base_enqueue_assets', 999);

function rafael_base_enqueue_assets() {
    // Remover jQuery padrão se não for necessário
    if (!is_admin()) {
        wp_deregister_script('jquery');
    }

    // CSS principal (carregado com técnica de non-critical CSS)
    wp_enqueue_style(
        'rafael-base-main-css',
        get_template_directory_uri() . '/assets/css/main.css',
        [],
        filemtime(get_template_directory() . '/assets/css/main.css'),
        'print'
    );
    
    // Adicionar atributo onload para mudar para 'all' após carregamento
    add_filter('style_loader_tag', 'rafael_base_style_loader_tag', 10, 2);
    
    // JS principal (carregado com defer)
    wp_enqueue_script(
        'rafael-base-main-js',
        get_template_directory_uri() . '/assets/js/main.js',
        [],
        filemtime(get_template_directory() . '/assets/js/main.js'),
        true
    );
    
    // Adicionar atributo defer
    add_filter('script_loader_tag', 'rafael_base_script_loader_tag', 10, 2);
}

function rafael_base_style_loader_tag($html, $handle) {
    if ('rafael-base-main-css' === $handle) {
        return str_replace(
            "media='print'",
            "media='print' onload=\"this.media='all'\"",
            $html
        );
    }
    return $html;
}

function rafael_base_script_loader_tag($tag, $handle) {
    if ('rafael-base-main-js' === $handle) {
        return str_replace(' src', ' defer src', $tag);
    }
    return $tag;
}