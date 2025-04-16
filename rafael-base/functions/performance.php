<?php
/**
 * Otimizações de performance
 */

// Remover emojis do WordPress
add_action('init', 'rafael_base_disable_emojis');

function rafael_base_disable_emojis() {
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
    add_filter('tiny_mce_plugins', 'rafael_base_disable_emojis_tinymce');
}

function rafael_base_disable_emojis_tinymce($plugins) {
    return is_array($plugins) ? array_diff($plugins, ['wpemoji']) : [];
}

// Remover embed script do WordPress
add_action('wp_footer', 'rafael_base_disable_embeds');

function rafael_base_disable_embeds() {
    wp_deregister_script('wp-embed');
}

// Limpar o head
add_action('init', 'rafael_base_clean_head');

function rafael_base_clean_head() {
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'start_post_rel_link');
    remove_action('wp_head', 'index_rel_link');
    remove_action('wp_head', 'adjacent_posts_rel_link');
}

// Lazy loading para iframes
add_filter('the_content', 'rafael_base_lazy_load_iframes');

function rafael_base_lazy_load_iframes($content) {
    return preg_replace('/<iframe([^>]+)?>/', '<iframe$1 loading="lazy">', $content);
}

// Adicionar lazy loading para imagens (exceto as primeiras 3)
add_filter('wp_get_attachment_image_attributes', 'rafael_base_lazy_load_images', 10, 3);

function rafael_base_lazy_load_images($attr, $attachment, $size) {
    static $count = 0;
    
    // Não aplicar lazy load nas primeiras 3 imagens
    if ($count < 3) {
        $count++;
        return $attr;
    }
    
    if (empty($attr['loading'])) {
        $attr['loading'] = 'lazy';
    }
    
    return $attr;
}