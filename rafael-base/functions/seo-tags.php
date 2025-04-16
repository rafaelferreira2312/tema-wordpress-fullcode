<?php
/**
 * Funções de SEO e metatags dinâmicas
 */

add_action('wp_head', 'rafael_base_meta_tags', 1);

function rafael_base_meta_tags() {
    global $post;
    
    $site_name = get_bloginfo('name');
    $title = wp_get_document_title();
    $description = get_bloginfo('description');
    $url = home_url('/');
    $image = get_template_directory_uri() . '/assets/images/default-social.jpg';
    
    // Páginas individuais
    if (is_singular()) {
        $description = has_excerpt() ? get_the_excerpt() : wp_trim_words(get_the_content(), 30);
        
        // Usar imagem destacada se disponível
        if (has_post_thumbnail()) {
            $image = get_the_post_thumbnail_url($post->ID, 'large');
        }
    }
    
    // Canonical URL
    echo '<link rel="canonical" href="' . esc_url($url) . '" />' . "\n";
    
    // Meta tags básicas
    echo '<meta name="description" content="' . esc_attr($description) . '">' . "\n";
    
    // Open Graph / Facebook
    echo '<meta property="og:type" content="website">' . "\n";
    echo '<meta property="og:url" content="' . esc_url($url) . '">' . "\n";
    echo '<meta property="og:title" content="' . esc_attr($title) . '">' . "\n";
    echo '<meta property="og:description" content="' . esc_attr($description) . '">' . "\n";
    echo '<meta property="og:image" content="' . esc_url($image) . '">' . "\n";
    echo '<meta property="og:site_name" content="' . esc_attr($site_name) . '">' . "\n";
    
    // Twitter Card
    echo '<meta name="twitter:card" content="summary_large_image">' . "\n";
    echo '<meta name="twitter:title" content="' . esc_attr($title) . '">' . "\n";
    echo '<meta name="twitter:description" content="' . esc_attr($description) . '">' . "\n";
    echo '<meta name="twitter:image" content="' . esc_url($image) . '">' . "\n";
    
    // Favicon (usando versão moderna)
    echo '<link rel="icon" href="' . get_template_directory_uri() . '/assets/images/favicon.ico" sizes="any">' . "\n";
    echo '<link rel="icon" href="' . get_template_directory_uri() . '/assets/images/favicon.svg" type="image/svg+xml">' . "\n";
    echo '<link rel="apple-touch-icon" href="' . get_template_directory_uri() . '/assets/images/apple-touch-icon.png">' . "\n";
    echo '<link rel="manifest" href="' . get_template_directory_uri() . '/assets/images/site.webmanifest">' . "\n";
}