<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <?php wp_head(); ?>
    
    <!-- CSS Crítico Inline -->
    <style>
        <?php include get_template_directory() . '/assets/css/critical.css'; ?>
    </style>
</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    
    <a class="skip-link screen-reader-text" href="#main-content">
        <?php esc_html_e('Ir para o conteúdo', 'rafael-base'); ?>
    </a>
    
    <header class="site-header">
        <div class="container">
            <?php if (has_custom_logo()) : ?>
                <div class="site-logo">
                    <?php the_custom_logo(); ?>
                </div>
            <?php else : ?>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="site-title">
                    <?php bloginfo('name'); ?>
                </a>
            <?php endif; ?>
            
            <nav class="site-navigation" aria-label="<?php esc_attr_e('Menu Principal', 'rafael-base'); ?>">
                <?php
                wp_nav_menu([
                    'theme_location' => 'primary',
                    'container'      => false,
                    'menu_class'     => 'primary-menu',
                    'fallback_cb'    => false,
                    'depth'          => 2
                ]);
                ?>
            </nav>
            
            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                <?php esc_html_e('Menu', 'rafael-base'); ?>
            </button>
        </div>
    </header>
    
    <main id="main-content" class="site-main">