# Tema WordPress Rafael Base

Tema WordPress de alto desempenho, componentizado e otimizado para PageSpeed.

## Recursos Principais

- 100% otimizado para performance (Google PageSpeed Insights)
- Estrutura componentizada para fácil manutenção
- Suporte a ACF, Elementor e Gutenberg
- SEO otimizado com metatags dinâmicas
- Imagens em WebP com lazy loading
- CSS crítico inline para renderização mais rápida
- JavaScript carregado com defer para não bloquear renderização

## Requisitos

- WordPress 5.5 ou superior
- PHP 7.4 ou superior

## Instalação

1. Faça o download do tema
2. Extraia o arquivo ZIP
3. Envie a pasta `rafael-base` para `/wp-content/themes/`
4. Ative o tema no painel WordPress em "Aparência > Temas"

## Configuração

### Campos Personalizados (ACF)

O tema inclui suporte a Advanced Custom Fields. Para adicionar campos:

1. Instale o plugin ACF
2. Crie grupos de campos para as seções:
   - Hero (Título, Descrição, Botão, Imagem de fundo)
   - Sobre (Mostrar seção, Título, Conteúdo, Imagem)
   - Serviços (Mostrar seção, Título, Lista de serviços)
   - Depoimentos (Mostrar seção, Título, Depoimentos)
   - Contato (Mostrar seção, Título, Formulário)

### Gutenberg

O tema é totalmente compatível com o editor Gutenberg. Blocos personalizados podem ser adicionados no arquivo `functions/gutenberg-support.php`.

### Elementor

Para usar com Elementor:

1. Instale o plugin Elementor
2. Crie templates conforme necessário
3. O tema já inclui estilos básicos para compatibilidade

## Personalização

### Cores

Para alterar as cores principais, edite o arquivo `assets/css/main.css` ou adicione CSS personalizado no customizer do WordPress.

### Fontes

Para alterar as fontes:

1. Adicione o link da fonte no arquivo `functions/enqueue.php`
2. Atualize as regras CSS em `assets/css/main.css`

## Otimização de Performance

O tema já inclui:

- Lazy loading para imagens e iframes
- CSS crítico inline
- JavaScript com defer
- CSS não-crítico carregado assincronamente
- Remoção de scripts desnecessários (emojis, embeds)

Para melhorar ainda mais:

1. Instale um plugin de cache como WP Rocket
2. Configure um CDN para assets estáticos
3. Otimize imagens antes de enviar

## Suporte

Para problemas ou dúvidas, abra uma issue no repositório do tema.

## Conclusão

Este tema rafael-base foi construído seguindo as melhores práticas de desenvolvimento WordPress, com foco em:

1. Performance: CSS crítico inline, lazy loading, carregamento assíncrono de recursos
2. SEO: Metatags dinâmicas, estrutura semântica, otimização para mecanismos de busca
3. Manutenibilidade: Código modularizado, componentes reutilizáveis, documentação completa
4. Compatibilidade: Suporte a ACF, Elementor e Gutenberg
5. Responsividade: Design que se adapta a todos os dispositivos