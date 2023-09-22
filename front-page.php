<?php get_header(); ?>
<!-- Hero -->
<?php
$title = get_field('home_title') ?: get_bloginfo("name");
$description = get_field('home_description') ?: get_bloginfo("description");
?>
<section id="home-hero">
    <div class="container">
        <h1><?php echo $title; ?></h1>
        <div class="description"><?php echo $description; ?></div>
        <?php global $post;
        $posts = get_posts(array(
            'numberposts' => 1,
            'post_type'   => 'edito'
        ));
        if ($posts) : ?>
            <div class="btn-wrapper">
                <?php foreach ($posts as $post) : setup_postdata($post); ?>
                    <a href="<?php the_permalink(); ?>" class="btn btn-primary btn-icon-corner-down-right"><?php echo __("Consulter le dernier éditorial", "rhever"); ?></a>
                <?php endforeach; ?>
            </div>
    </div>
<?php endif;
        wp_reset_postdata(); ?>
</section>

<!-- About -->
<?php
$title = get_field('home_about_title');
$text = get_field('home_about_text');
$image = get_field('home_about_image');
?>
<section id="home-about" class="js-toBeTriggered">
    <div class="container container-lg">
        <div class="content">
            <?php if ($title) : ?>
                <h2 class="highlighted"><?php echo $title; ?></h2>
            <?php endif; ?>
            <?php if ($text) : ?>
                <?php echo $text; ?>
            <?php endif; ?>
            <a href="#" class="btn btn-icon-search"><?php echo __("L'association en détail", "rhever"); ?></a>
        </div>
        <figure>
            <?php if (!empty($image)) : ?>
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
            <?php endif; ?>
        </figure>
    </div>
</section>

<!-- Calendar -->
<?php $today = date('Ymd');
global $post;
$posts = get_posts(array(
    'numberposts' => 3,
    'post_type'   => 'event',
    'orderby' => 'meta_value',
    'meta_key' => 'event_date',
    'order' => 'ASC',
    'meta_query'    => array(array(
        'key' => 'event_date',
        'value' => $today,
        'compare' => '>=',
        'type' => 'DATE'
    ))
)); ?>
<section id="home-calendar">
    <div class="container container-sm">
        <h2 class="highlighted highlighted-primary"><?php echo get_field('home_calendar_title'); ?></h2>
        <?php if ($posts) : ?>
            <div class="rainbow-grid grid-2 events events-future">
                <?php foreach ($posts as $post) : setup_postdata($post); ?>
                    <?php $timeline = (get_field('event_date', false, false) < date('Ymd')) ? "past" : "future"; ?>
                    <a href="<?php the_permalink(); ?>" class="grid-element event" data-timeline="<?php echo $timeline; ?>">
                        <div class="content">
                            <h3><?php echo get_the_title(); ?></h3>
                            <?php
                            $categories = get_the_terms(get_the_ID(), 'event_category');
                            $category_name = $categories[0]->name;
                            ?>
                            <?php if ($categories) : ?>
                                <span class="category"><?php echo $category_name; ?></span>
                            <?php endif; ?>
                            <p><?php echo get_the_excerpt(); ?></p>
                        </div>
                        <div class="date"><span><?php echo __("Le ", "rhever") . get_field('event_date'); ?></span></div>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php else : echo __('Il n\'y a aucun événement de planifié pour le moment.', 'rhever');
        endif; ?>
        <div class="btn-wrapper">
            <a href="<?php echo get_post_type_archive_link('event'); ?>" class="btn btn-simple btn-icon-arrow-right"><?php echo __("Voir tous les événements de RHEVER", "rhever"); ?></a>
        </div>
</section>
<?php wp_reset_postdata();  ?>

<?php get_footer(); ?>