<?php get_header(); ?>

<div class="container formatted">
    <h1><?php echo get_the_title(); ?></h1>
    <?php the_content(); ?>
</div>

<?php get_footer(); ?>