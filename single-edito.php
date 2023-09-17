<?php get_header(); ?>

<div class="container formatted">
    <h1><?php echo get_the_title(); ?></h1>
    <?php the_content(); ?>
    <div class="signature"><?php echo __("L'équipe RHEVER", "rhever"); ?></div>
</div>

<?php get_footer(); ?>