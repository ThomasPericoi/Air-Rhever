<?php get_header(); ?>

<!-- Breadcrumbs -->
<section id="breadcrumbs">
    <div class="container">
        <?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
    </div>
</section>

<!-- Hero -->
<?php $introduction = get_field("works-in-progress_introduction", "option"); ?>
<section id="works-in-progress-hero" class="hero">
    <div class="container container-sm">
        <h1><?php echo __('Les travaux en cours de RHEVER'); ?></h1>
        <?php if ($introduction) : ?>
            <?php echo $introduction; ?>
        <?php endif; ?>
    </div>
</section>

<!-- Loop -->
<section id="works-in-progress-index">
    <div class="container">
        <?php if (have_posts() && is_user_logged_in()) : ?>
            <div class="rainbow-grid grid-1 works">
                <?php
                while (have_posts()) : the_post(); ?>
                    <a href="<?php esc_url(the_permalink()); ?>" class="grid-element work">
                        <div class="content">
                            <h3><?php echo get_the_title(); ?></h3>
                            <span class="category"><?php echo get_the_date('Y'); ?></span>
                        </div>
                    </a>
                <?php endwhile; ?>
            </div>
            <?php the_posts_pagination(); ?>
        <?php else : echo __('Il n\'y a aucun travail de publié pour le moment, ou bien vous n\'êtes pas connecté.', 'rhever');
        endif; ?>
    </div>
</section>

<?php get_footer(); ?>