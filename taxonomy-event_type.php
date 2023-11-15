<?php get_header(); ?>

<!-- Breadcrumbs -->
<section id="breadcrumbs">
    <div class="container">
        <?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
    </div>
</section>

<!-- Hero -->
<?php
$term = get_queried_object();
$title = $term->name;
$description = $term->description;
?>
<section id="events-hero" class="hero">
    <div class="container container-sm">
        <h1><?php echo $title; ?></h1>
        <?php if ($description) : ?>
            <?php echo $description; ?>
        <?php endif; ?>
    </div>
</section>

<!-- Loop -->
<section id="events-index">
    <div class="container">
        <?php if (have_posts() && is_user_logged_in()) : ?>
            <div class="rainbow-grid grid-3 events">
                <?php
                while (have_posts()) : the_post(); ?>
                    <?php $timeline = (get_field('event_date', false, false) < date('Ymd')) ? "past" : "future"; ?>
                    <a href="<?php esc_url(the_permalink()); ?>" class="grid-element event" data-timeline="<?php echo $timeline; ?>">
                        <div class="content">
                            <h3><?php echo get_the_title(); ?></h3>
                            <?php
                            $categories = get_the_terms(get_the_ID(), 'event_type');
                            $category_name = $categories[0]->name;
                            ?>
                            <?php if ($categories) : ?>
                                <span class="category"><?php echo $category_name; ?></span>
                            <?php endif; ?>
                            <?php if (has_excerpt()) : ?>
                                <p><?php echo get_the_excerpt(); ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="date"><span><?php echo __("Le ", "rhever") . get_field('event_date'); ?></span></div>
                    </a>
                <?php endwhile; ?>
            </div>
            <?php the_posts_pagination(); ?>
        <?php else : echo __('Il n\'y a aucun événement de publié pour le moment, ou bien vous n\'êtes pas connecté.', 'rhever');
        endif; ?>
    </div>
</section>

<!-- CTA -->
<?php
$image = get_field('events_cta_image', 'option');
if (is_tax('event_type', 'reunion-rhever')) :
    $title = __("Qu'en est-il des assemblées générales ?", "rhever");
    $text =  __("Les assemblées générales (ou AG) sont consignées à part.", "rhever");
    $button_label = __("Consulter les assemblées générales", "rhever");
    $button_url = get_term_link('assemblee-generale', 'event_type');
else :
    $title = get_field('events_cta_title', 'option');
    $text = get_field('events_cta_text', 'option');
    $button_label = false;
endif;
?>
<section id="events-cta" class="cta-large cta-reverse cta-secondary js-toBeTriggered">
    <div class="container container-lg">
        <div class="content">
            <?php if ($title) : ?>
                <h2 class="highlighted"><?php echo $title; ?></h2>
            <?php endif; ?>
            <?php if ($text) : ?>
                <?php echo $text; ?>
            <?php endif; ?>
            <?php if ($button_label) : ?>
                <a href="<?php echo esc_url($button_url); ?>" class="btn btn-icon-calendar"><?php echo $button_label; ?></a>
            <?php endif; ?>
        </div>
        <figure>
            <?php if (!empty($image)) : ?>
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
            <?php endif; ?>
        </figure>
    </div>
</section>

<?php get_footer(); ?>