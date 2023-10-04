<?php get_header(); ?>

<!-- Breadcrumbs -->
<section id="breadcrumbs">
    <div class="container">
        <?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
    </div>
</section>

<!-- Content -->
<section>
    <div class="container container-sm formatted">
        <?php
        $cat = get_the_category();
        $cat_name = $cat[0]->cat_name;
        $cat_link = get_category_link($cat[0]->cat_ID);
        ?>
        <?php if ($cat) : ?>
            <a href="<?php echo $cat_link; ?>" class="category"><?php echo $cat_name; ?></a>
        <?php endif; ?>
        <h1><?php echo get_the_title(); ?></h1>
        <?php if (has_post_thumbnail()) : ?>
            <div class="featured-image">
                <?php the_post_thumbnail(); ?>
            </div>
        <?php endif; ?>
        <?php the_content(); ?>
    </div>
</section>

<?php get_footer(); ?>