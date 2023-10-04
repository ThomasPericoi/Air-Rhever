<?php /* Template Name: Questionnaires patients */ ?>
<?php get_header(); ?>

<!-- Breadcrumbs -->
<section id="breadcrumbs">
    <div class="container">
        <?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
    </div>
</section>

<!-- Hero -->
<?php $introduction = get_field("page_introduction"); ?>
<section id="quizzes-hero" class="hero">
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
$quizzes = get_field('quizzes');
if ($quizzes) : ?>
    <section id="quizzes-list">
        <div class="container container-sm">
            <div class="documents-list">
                <ul>
                    <?php foreach ($quizzes as $i => $item) : ?>
                        <li><a href="<?php echo $item["document"]["url"]; ?>"><span class="extension"><?php echo pathinfo($item["document"]["url"], PATHINFO_EXTENSION); ?></span><?php echo $item["document"]["title"]; ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php get_footer(); ?>