<?php

/**
 * CTA Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query loop,
 *          or the post ID of the post hosting this block.
 * @param   array $context The context provided to the block by the post or it's parent block.
 */

$classes = 'cta-block';
if (!empty($block['className'])) {
    $classes .= ' ' . $block['className'];
}

$title = get_field('title');
$text = get_field('text');
$image = get_field('image');
$link = get_field("link");

$color = get_field("color");
$alignment = get_field("alignment");
$icon = get_field("icon");

$styles = array("");
$style  = implode('; ', $styles);
?>

<!-- Bloc - CTA -->
<section class="cta-large cta-<?php echo $color; ?> cta-<?php echo $alignment; ?> js-toBeTriggered <?php echo esc_attr($classes); ?>" <?php if ($style) : ?>style="<?php echo esc_attr($style); ?>" <?php endif; ?>>
    <div class="container">
        <div class="content">
            <?php if ($title) : ?>
                <h3 class="highlighted"><?php echo $title; ?></h3>
            <?php endif; ?>
            <?php if ($text) : ?>
                <?php echo $text; ?>
            <?php endif; ?>
            <?php if ($link) : ?>
                <a href="<?php echo esc_url($link["url"]); ?>" target="<?php echo $link["target"]; ?>" class="btn btn-icon-<?php echo $icon; ?>"><?php echo $link["title"]; ?></a>
            <?php endif; ?>
        </div>
        <figure>
            <?php if (!empty($image)) : ?>
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
            <?php endif; ?>
        </figure>
    </div>
</section>