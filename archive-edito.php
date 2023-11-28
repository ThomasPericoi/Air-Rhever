<?php get_header(); ?>

<!-- Breadcrumbs -->
<section id="breadcrumbs">
    <div class="container">
        <?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
    </div>
</section>

<!-- Hero -->
<?php $introduction = get_field("editos_introduction", "option"); ?>
<section id="editos-hero" class="hero">
    <div class="container container-sm">
        <h1><?php echo __('Les éditos de RHEVER'); ?></h1>
        <?php if ($introduction) : ?>
            <?php echo $introduction; ?>
        <?php endif; ?>
    </div>
</section>

<!-- Loop -->
<section id="editos-index">
    <div class="container">
        <?php if (is_user_logged_in()) : ?>
            <?php if (have_posts()) : ?>
                <div class="rainbow-grid grid-1 editos">
                    <?php
                    while (have_posts()) : the_post(); ?>
                        <a href="<?php esc_url(the_permalink()); ?>" class="grid-element edito">
                            <div class="content">
                                <h3><?php echo get_the_title(); ?></h3>
                            </div>
                        </a>
                    <?php endwhile; ?>
                </div>
                <?php the_posts_pagination(); ?>
            <?php else : echo __('Il n\'y a aucun edito de publié pour le moment.', 'rhever');
            endif; ?>
        <?php else : echo __('Cette page est réservée aux adhérents. Si vous êtes adhérent, <a href="' . esc_url(wp_login_url()) .  '">connectez-vous</a> pour accéder à tout le contenu.', 'rhever'); ?>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>