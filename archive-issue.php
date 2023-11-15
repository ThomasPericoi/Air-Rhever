<?php get_header(); ?>

<!-- Breadcrumbs -->
<section id="breadcrumbs">
    <div class="container">
        <?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
    </div>
</section>

<!-- Hero -->
<?php $introduction = get_field("issues_introduction", "option"); ?>
<section id="issues-hero" class="hero">
    <div class="container container-sm">
        <h1><?php echo __('Les publications RHEVER'); ?></h1>
        <?php if ($introduction) : ?>
            <?php echo $introduction; ?>
        <?php endif; ?>
    </div>
</section>

<!-- Loop -->
<section id="issues-index">
    <div class="container">
        <?php if (have_posts() && is_user_logged_in()) : ?>
            <div class="rainbow-grid grid-1 issues">
                <?php
                while (have_posts()) : the_post(); ?>
                    <a href="<?php esc_url(the_permalink()); ?>" class="grid-element reference">
                        <div class="content">
                            <h3><?php echo get_the_title(); ?></h3>
                            <span class="category"><?php echo get_the_date('Y'); ?></span>
                        </div>
                    </a>
                <?php endwhile; ?>
            </div>
            <?php the_posts_pagination(); ?>
        <?php else : echo __('Il n\'y a aucune publication de publiée pour le moment, ou bien vous n\'êtes pas connecté.', 'rhever');
        endif; ?>
    </div>
</section>

<?php get_footer(); ?>