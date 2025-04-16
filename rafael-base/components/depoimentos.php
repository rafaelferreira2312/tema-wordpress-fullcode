<?php
/**
 * Depoimentos Component
 * 
 * @package Rafael Base
 */

if (!get_field('mostrar_secao_depoimentos')) {
    return;
}

$depoimentos_data = [
    'titulo'      => get_field('depoimentos_titulo') ?: __('O que dizem sobre nós', 'rafael-base'),
    'depoimentos' => get_field('depoimentos_itens'),
    'background'  => get_field('depoimentos_background'),
    'overlay'     => get_field('depoimentos_overlay') ?: 0.7
];

$classes = ['depoimentos-section'];
if ($depoimentos_data['background']) {
    $classes[] = 'has-background';
}
?>

<section class="<?php echo esc_attr(implode(' ', $classes)); ?>">
    <?php if ($depoimentos_data['background']) : ?>
        <div class="depoimentos-background">
            <img 
                src="<?php echo esc_url($depoimentos_data['background']['url']); ?>" 
                alt="<?php echo esc_attr($depoimentos_data['background']['alt']); ?>" 
                loading="lazy"
                width="1920"
                height="1080"
            >
            <div class="depoimentos-overlay" style="opacity: <?php echo esc_attr($depoimentos_data['overlay']); ?>"></div>
        </div>
    <?php endif; ?>
    
    <div class="container">
        <?php if ($depoimentos_data['titulo']) : ?>
            <h2 class="section-title text-center"><?php echo esc_html($depoimentos_data['titulo']); ?></h2>
        <?php endif; ?>
        
        <?php if ($depoimentos_data['depoimentos']) : ?>
            <div class="depoimentos-slider">
                <?php foreach ($depoimentos_data['depoimentos'] as $depoimento) : ?>
                    <div class="depoimento-card">
                        <div class="depoimento-content">
                            <?php if ($depoimento['texto']) : ?>
                                <blockquote class="depoimento-text">
                                    <?php echo wp_kses_post($depoimento['texto']); ?>
                                </blockquote>
                            <?php endif; ?>
                            
                            <?php if ($depoimento['autor']) : ?>
                                <div class="depoimento-author">
                                    <?php if ($depoimento['autor']['foto']) : ?>
                                        <div class="author-avatar">
                                            <img 
                                                src="<?php echo esc_url($depoimento['autor']['foto']['url']); ?>" 
                                                alt="<?php echo esc_attr($depoimento['autor']['foto']['alt']); ?>" 
                                                loading="lazy"
                                                width="80"
                                                height="80"
                                            >
                                        </div>
                                    <?php endif; ?>
                                    
                                    <div class="author-info">
                                        <strong class="author-name"><?php echo esc_html($depoimento['autor']['nome']); ?></strong>
                                        <?php if ($depoimento['autor']['cargo']) : ?>
                                            <span class="author-role"><?php echo esc_html($depoimento['autor']['cargo']); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>