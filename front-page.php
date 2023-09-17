<?php get_header(); ?>

<?php
$title = get_field('front_title') ?: get_bloginfo("name");
$description = get_field('front_description') ?: get_bloginfo("description");
?>

<!-- Introduction -->
<section class="hero">
    <div class="container">
        <h1 class="title"><?php echo $title; ?></h1>
        <div class="description"><?php echo $description; ?></div>

        <?php global $post;
        $posts = get_posts(array(
            'numberposts' => 1,
            'post_type'   => 'edito'
        ));

        if ($posts) : ?>
            <div class="btn-wrapper">
                <?php foreach ($posts as $post) : setup_postdata($post); ?>
                    <a href="<?php the_permalink(); ?>" class="btn btn-primary"><?php echo __("Consulter le dernier éditorial", "rhever"); ?></a>
                <?php endforeach; ?>
            </div>
    </div>
<?php endif;
        wp_reset_postdata();  ?>
</section>

<!-- Content -->
<?php the_content(); ?>

<?php get_footer(); ?>