<?php
/**
 * Serviços Component
 * 
 * @package Rafael Base
 */

if (!get_field('mostrar_secao_servicos')) {
    return;
}

$servicos_data = [
    'titulo'       => get_field('servicos_titulo') ?: __('Nossos Serviços', 'rafael-base'),
    'descricao'    => get_field('servicos_descricao'),
    'servicos'     => get_field('servicos_itens'),
    'layout'       => get_field('servicos_layout') ?: 'grid',
    'max_col'      => get_field('servicos_max_col') ?: 3
];

$grid_class = 'grid-' . $servicos_data['max_col'];
?>

<section class="servicos-section layout-<?php echo esc_attr($servicos_data['layout']); ?>">
    <div class="container">
        <?php if ($servicos_data['titulo']) : ?>
            <h2 class="section-title text-center"><?php echo esc_html($servicos_data['titulo']); ?></h2>
        <?php endif; ?>
        
        <?php if ($servicos_data['descricao']) : ?>
            <p class="section-description text-center"><?php echo esc_html($servicos_data['descricao']); ?></p>
        <?php endif; ?>
        
        <?php if ($servicos_data['servicos']) : ?>
            <div class="servicos-container <?php echo esc_attr($grid_class); ?>">
                <?php foreach ($servicos_data['servicos'] as $servico) : ?>
                    <div class="servico-card">
                        <?php if ($servico['icone']) : ?>
                            <div class="servico-icon">
                                <img 
                                    src="<?php echo esc_url($servico['icone']['url']); ?>" 
                                    alt="<?php echo esc_attr($servico['icone']['alt']); ?>" 
                                    loading="lazy"
                                    width="60"
                                    height="60"
                                >
                            </div>
                        <?php endif; ?>
                        
                        <h3 class="servico-title"><?php echo esc_html($servico['titulo']); ?></h3>
                        
                        <?php if ($servico['descricao']) : ?>
                            <p class="servico-description"><?php echo esc_html($servico['descricao']); ?></p>
                        <?php endif; ?>
                        
                        <?php if ($servico['link']) : ?>
                            <a href="<?php echo esc_url($servico['link']['url']); ?>" 
                               class="servico-link" 
                               target="<?php echo esc_attr($servico['link']['target'] ?: '_self'); ?>">
                                <?php echo esc_html($servico['link']['title'] ?: __('Saiba mais', 'rafael-base')); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>