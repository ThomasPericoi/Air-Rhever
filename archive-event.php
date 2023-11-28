<?php get_header(); ?>

<!-- Breadcrumbs -->
<section id="breadcrumbs">
    <div class="container">
        <?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
    </div>
</section>

<!-- Hero -->
<?php
$title = __('Le calendrier RHEVER');
$description = get_field("events_introduction", "option");
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
        <?php if (is_user_logged_in()) : ?>
            <?php if (have_posts()) : ?>
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
            <?php else : echo __('Il n\'y a aucun événement de publié pour le moment.', 'rhever');
            endif; ?>
        <?php else : echo __('Cette page est réservée aux adhérents. Si vous êtes adhérent, <a href="' . esc_url(wp_login_url()) .  '">connectez-vous</a> pour accéder à tout le contenu.', 'rhever'); ?>
        <?php endif; ?>
    </div>
</section>

<!-- CTA -->
<?php
$title = get_field('events_cta_title', 'option');
$text = get_field('events_cta_text', 'option');
$image = get_field('events_cta_image', 'option');
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
        </div>
        <figure>
            <?php if (!empty($image)) : ?>
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
            <?php endif; ?>
        </figure>
    </div>
</section>

<?php get_footer(); ?>