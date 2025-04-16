<?php
/**
 * Hero Component
 * 
 * @package Rafael Base
 */

$hero_data = [
    'title'       => get_field('hero_title') ?: get_bloginfo('name'),
    'description' => get_field('hero_description') ?: get_bloginfo('description'),
    'button_text' => get_field('hero_button_text'),
    'button_link' => get_field('hero_button_link') ?: '#',
    'background'  => get_field('hero_background') ?: get_template_directory_uri() . '/assets/images/hero-default.webp',
    'overlay'     => get_field('hero_overlay_opacity') ?: 0.4
];
?>

<section class="hero-section" aria-label="<?php esc_attr_e('Seção Hero', 'rafael-base'); ?>">
    <div class="hero-background">
        <?php if (wp_http_validate_url($hero_data['background'])) : ?>
            <img 
                src="<?php echo esc_url($hero_data['background']); ?>" 
                alt="<?php echo esc_attr($hero_data['title']); ?>" 
                loading="eager"
                width="1920"
                height="1080"
            >
        <?php endif; ?>
        <div class="hero-overlay" style="opacity: <?php echo esc_attr($hero_data['overlay']); ?>"></div>
    </div>
    
    <div class="hero-content">
        <div class="container">
            <?php if ($hero_data['title']) : ?>
                <h1 class="hero-title"><?php echo esc_html($hero_data['title']); ?></h1>
            <?php endif; ?>
            
            <?php if ($hero_data['description']) : ?>
                <p class="hero-description"><?php echo esc_html($hero_data['description']); ?></p>
            <?php endif; ?>
            
            <?php if ($hero_data['button_text']) : ?>
                <a href="<?php echo esc_url($hero_data['button_link']); ?>" class="hero-button button">
                    <?php echo esc_html($hero_data['button_text']); ?>
                </a>
            <?php endif; ?>
        </div>
    </div>
</section>