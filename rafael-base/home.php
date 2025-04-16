<?php
/**
 * Template for the homepage
 * Utiliza componentes da pasta components/
 *
 * @package Rafael Base
 */

get_header();
?>

<main class="home-page">
    <?php
    // Componente Hero
    get_template_part('components/hero');

    // Componente Sobre
    get_template_part('components/sobre');

    // Componente Serviços
    if (get_field('mostrar_secao_servicos')) {
        get_template_part('components/servicos');
    }

    // Componente Depoimentos
    if (get_field('mostrar_secao_depoimentos')) {
        get_template_part('components/depoimentos');
    }

    // Componente Contato
    if (get_field('mostrar_secao_contato')) {
        get_template_part('components/contato');
    }
    ?>
</main>

<?php
get_footer();