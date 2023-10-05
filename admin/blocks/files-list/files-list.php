<?php

/**
 * Files list Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query loop,
 *          or the post ID of the post hosting this block.
 * @param   array $context The context provided to the block by the post or it's parent block.
 */

$classes = 'files-list-block';
if (!empty($block['className'])) {
    $classes .= ' ' . $block['className'];
}

$files = get_field('files');

$styles = array("");
$style  = implode('; ', $styles);
?>

<!-- Bloc - Files list -->
<section class="<?php echo esc_attr($classes); ?>" <?php if ($style) : ?>style="<?php echo esc_attr($style); ?>" <?php endif; ?>>
    <div class="container">
        <div class="documents-list">
            <ul>
                <?php foreach ($files as $i => $item) : ?>
                    <li><a href="<?php echo $item["document"]["url"]; ?>"><span class="extension"><?php echo pathinfo($item["document"]["url"], PATHINFO_EXTENSION); ?></span><?php echo $item["document"]["title"]; ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</section>