<?php get_header(); ?>

<!-- Breadcrumbs -->
<section id="breadcrumbs">
    <div class="container">
        <?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
    </div>
</section>

<!-- Hero -->
<?php
$title = __("Vous semblez perdu...", "rhever");
$description = __('Essayez de retrouver votre chemin.', 'rhever');
?>
<section id="not-found-hero" class="hero">
    <div class="container container-sm">
        <h1><?php echo $title; ?></h1>
        <?php if ($description) : ?>
            <?php echo $description; ?>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>