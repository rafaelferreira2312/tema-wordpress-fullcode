<?php
/**
 * Sobre Component
 * 
 * @package Rafael Base
 */

if (!get_field('mostrar_secao_sobre')) {
    return;
}

$sobre_data = [
    'titulo'   => get_field('sobre_titulo') ?: __('Sobre Nós', 'rafael-base'),
    'conteudo' => get_field('sobre_conteudo'),
    'imagem'   => get_field('sobre_imagem'),
    'inverter' => get_field('inverter_layout')
];

$classes = ['sobre-section'];
if ($sobre_data['inverter']) {
    $classes[] = 'layout-invertido';
}
?>

<section class="<?php echo esc_attr(implode(' ', $classes)); ?>">
    <div class="container">
        <div class="sobre-grid">
            <div class="sobre-content">
                <?php if ($sobre_data['titulo']) : ?>
                    <h2 class="section-title"><?php echo esc_html($sobre_data['titulo']); ?></h2>
                <?php endif; ?>
                
                <?php if ($sobre_data['conteudo']) : ?>
                    <div class="sobre-text">
                        <?php echo wp_kses_post($sobre_data['conteudo']); ?>
                    </div>
                <?php endif; ?>
                
                <?php if (have_rows('sobre_botoes')) : ?>
                    <div class="sobre-buttons">
                        <?php while (have_rows('sobre_botoes')) : the_row(); ?>
                            <a href="<?php echo esc_url(get_sub_field('link')); ?>" class="button <?php echo esc_attr(get_sub_field('estilo')); ?>">
                                <?php echo esc_html(get_sub_field('texto')); ?>
                            </a>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
            
            <?php if ($sobre_data['imagem']) : ?>
                <div class="sobre-image">
                    <img 
                        src="<?php echo esc_url($sobre_data['imagem']['url']); ?>" 
                        alt="<?php echo esc_attr($sobre_data['imagem']['alt']); ?>" 
                        loading="lazy"
                        width="<?php echo esc_attr($sobre_data['imagem']['width']); ?>"
                        height="<?php echo esc_attr($sobre_data['imagem']['height']); ?>"
                    >
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>