<?php
/**
 * Contato Component
 * 
 * @package Rafael Base
 */

if (!get_field('mostrar_secao_contato')) {
    return;
}

$contato_data = [
    'titulo'     => get_field('contato_titulo') ?: __('Entre em Contato', 'rafael-base'),
    'descricao'  => get_field('contato_descricao'),
    'formulario' => get_field('contato_formulario'),
    'info'       => get_field('contato_informacoes'),
    'mapa'       => get_field('contato_mapa')
];

$has_map = !empty($contato_data['mapa']);
?>

<section class="contato-section <?php echo $has_map ? 'has-map' : ''; ?>">
    <div class="container">
        <div class="contato-grid">
            <div class="contato-content">
                <?php if ($contato_data['titulo']) : ?>
                    <h2 class="section-title"><?php echo esc_html($contato_data['titulo']); ?></h2>
                <?php endif; ?>
                
                <?php if ($contato_data['descricao']) : ?>
                    <div class="contato-description">
                        <?php echo wp_kses_post($contato_data['descricao']); ?>
                    </div>
                <?php endif; ?>
                
                <?php if ($contato_data['info']) : ?>
                    <div class="contato-info">
                        <?php foreach ($contato_data['info'] as $info) : ?>
                            <div class="info-item">
                                <?php if ($info['icone']) : ?>
                                    <div class="info-icon">
                                        <img 
                                            src="<?php echo esc_url($info['icone']['url']); ?>" 
                                            alt="<?php echo esc_attr($info['icone']['alt']); ?>" 
                                            loading="lazy"
                                            width="24"
                                            height="24"
                                        >
                                    </div>
                                <?php endif; ?>
                                
                                <div class="info-content">
                                    <?php if ($info['titulo']) : ?>
                                        <h4 class="info-title"><?php echo esc_html($info['titulo']); ?></h4>
                                    <?php endif; ?>
                                    
                                    <?php if ($info['conteudo']) : ?>
                                        <div class="info-text">
                                            <?php echo wp_kses_post($info['conteudo']); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
            
            <div class="contato-form">
                <?php if ($contato_data['formulario']) : ?>
                    <?php echo do_shortcode($contato_data['formulario']); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
    
    <?php if ($has_map) : ?>
        <div class="contato-map">
            <?php echo $contato_data['mapa']; ?>
        </div>
    <?php endif; ?>
</section>