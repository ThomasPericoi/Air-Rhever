<?php /* Template Name: Liens utiles */ ?>
<?php get_header(); ?>

<!-- Breadcrumbs -->
<section id="breadcrumbs">
    <div class="container">
        <?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
    </div>
</section>

<!-- Hero -->
<?php $introduction = get_field("page_introduction"); ?>
<section id="links-hero" class="hero">
    <div class="container container-sm">
        <h1><?php echo get_the_title(); ?></h1>
        <?php if ($introduction) : ?>
            <?php echo $introduction; ?>
        <?php endif; ?>
        <?php if (has_post_thumbnail()) : ?>
            <div class="featured-image">
                <?php the_post_thumbnail(); ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Links -->
<?php
$links = get_field('useful_links');
if ($links) : ?>
    <section id="links-list">
        <div class="container container-sm">
            <div class="buttons-list">
                <?php foreach ($links as $i => $item) : ?>
                    <a class="btn btn-secondary btn-icon-external-link" target="_blank" href="<?php echo $item['link']['url']; ?>"><?php echo $item['link']['title']; ?></a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php get_footer(); ?>