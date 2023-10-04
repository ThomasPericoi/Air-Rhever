<?php get_header(); ?>

<!-- Breadcrumbs -->
<section id="breadcrumbs">
    <div class="container">
        <?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
    </div>
</section>


<?php
if (is_category()) :
    $title = single_cat_title('', false);
    $description = category_description();
elseif (is_tag()) :
    $title = single_tag_title('', false);
    $description = tag_description();
else :
    $title = get_the_title(get_option('page_for_posts'));
    $description = __('Retrouvez-ici les actualités de RHEVER.', 'prezevolve');
endif;
?>

<!-- Hero -->
<section id="index-hero" class="hero">
    <div class="container container-sm">
        <h1><?php echo $title; ?></h1>
        <?php if ($description) : ?>
            <?php echo $description; ?>
        <?php endif; ?>
    </div>
</section>

<!-- Content -->
<section>
    <div class="container">
        <?php if (have_posts()) : ?>

            <div class="rainbow-grid grid-3 posts">
                <?php
                while (have_posts()) : the_post(); ?>
                    <?php
                    if (get_post_type() == "event") :
                        $categories = get_the_terms(get_the_ID(), 'event_type');
                        $category_name = $categories[0]->name;
                        $date =  __("Prévu le ", "rhever") . get_field('event_date');
                    else :
                        $categories = get_the_category();
                        $category_name = $categories[0]->cat_name;
                        $date = __("Publié le ", "rhever") . get_the_date();
                    endif;
                    ?>
                    <a href="<?php esc_url(the_permalink()); ?>" class="grid-element post">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="image">
                                <?php the_post_thumbnail(); ?>
                            </div>
                        <?php endif; ?>
                        <div class="content">
                            <h2><?php echo get_the_title(); ?></h2>
                            <?php if ($categories) : ?>
                                <span class="category"><?php echo $category_name; ?></span>
                            <?php endif; ?>
                            <?php if (has_excerpt()) : ?>
                                <p><?php echo get_the_excerpt(); ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="date"><span><?php echo $date; ?></span></div>
                    </a>
                <?php endwhile; ?>
            </div>
            <?php the_posts_pagination(); ?>

        <?php else : echo _('Aucun article n\'a été (encore) publié', 'rhever');
        endif; ?>
    </div>
</section>

<?php get_footer(); ?>