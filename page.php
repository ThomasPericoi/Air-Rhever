<?php get_header(); ?>

<!-- Breadcrumbs -->
<section id="breadcrumbs">
    <div class="container">
        <?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
    </div>
</section>

<!-- Hero -->
<?php $introduction = get_field("page_introduction"); ?>
<section id="page-hero" class="hero">
    <div class="container container-lg">
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

<!-- Content -->
<div class="container container-sm formatted">
    <?php the_content(); ?>
</div>

<?php get_footer(); ?>