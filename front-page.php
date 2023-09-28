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
                    <a href="<?php esc_url(the_permalink()); ?>" class="btn btn-primary btn-icon-corner-down-right"><?php echo __("Consulter le dernier éditorial", "rhever"); ?></a>
                <?php endforeach; ?>
            </div>
    </div>
<?php endif;
        wp_reset_postdata(); ?>
</section>

<!-- Slider -->
<?php if (have_rows('slider_elements')) : ?>
    <section id="home-slider">
        <div class="container container-lg">
            <div class="slider swiper">
                <div class="swiper-wrapper">
                    <?php while (have_rows('slider_elements')) : the_row();
                        $image = get_sub_field('image');
                        $title = get_sub_field('title');
                        $text = get_sub_field('text');
                        $button = get_sub_field('button');
                    ?>
                        <div class="swiper-slide">
                            <?php echo wp_get_attachment_image($image, 'full'); ?>
                            <div class="content">
                                <?php if ($title) : ?>
                                    <h2 class="highlighted"><?php echo $title; ?></h2>
                                <?php endif; ?>
                                <?php if ($text) : ?>
                                    <div><?php echo $text; ?></div>
                                <?php endif; ?>
                                <?php if ($button) : ?>
                                    <a href="<?php echo esc_url($button["url"]); ?>" target="<?php echo $button["target"]; ?>" class="btn"><?php echo $button["title"]; ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>
<?php endif; ?>

<!-- Calendar -->
<?php $today = date('Ymd');
global $post;
$posts = get_posts(array(
    'numberposts' => 4,
    'post_type'   => 'event',
    'orderby' => 'meta_value',
    'order' => 'ASC',
    'meta_key' => 'event_date',
    'meta_query'    => array(array(
        'key' => 'event_date',
        'value' => $today,
        'compare' => '>=',
        'type' => 'DATE'
    ))
)); ?>
<section id="home-calendar">
    <div class="container container-sm">
        <h2 class="highlighted highlighted-secondary"><?php echo get_field('home_calendar_title'); ?></h2>
        <?php if ($posts) : ?>
            <div class="rainbow-grid grid-2 events events-future">
                <?php foreach ($posts as $post) : setup_postdata($post); ?>
                    <?php $timeline = (get_field('event_date', false, false) < date('Ymd')) ? "past" : "future"; ?>
                    <a href="<?php the_permalink(); ?>" class="grid-element event" data-timeline="<?php echo $timeline; ?>">
                        <div class="content">
                            <h3><?php echo get_the_title(); ?></h3>
                            <?php
                            $categories = get_the_terms(get_the_ID(), 'event_type');
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
            <a href="<?php echo esc_url(get_post_type_archive_link('event')); ?>" class="btn btn-simple btn-icon-arrow-right"><?php echo __("Voir tous les événements de RHEVER", "rhever"); ?></a>
        </div>
</section>
<?php wp_reset_postdata();  ?>

<?php get_footer(); ?>