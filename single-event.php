<?php get_header(); ?>

<!-- Breadcrumbs -->
<section id="breadcrumbs">
    <div class="container">
        <?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
    </div>
</section>

<!-- Content -->
<?php $date = get_field("event_date");
$timeline = (get_field('event_date', false, false) < date('Ymd')) ? __("Événement déroulé", "rhever") : __("Événement à venir !", "rhever");
$event_online = get_field("event_online");
$event_online_url = get_field("event_online_url");
$location = get_field("event_location");
$president = get_field("event_president");
$program = get_field("event_program");
$quiz = get_field("event_quiz");
$report = get_field("event_report");
$quiz_results = get_field("event_quiz_results");
$bibliographies = get_field("event_bibliographies");
$references = get_field("event_references");
?>
<section id="event-content">
    <div class="container container-sm">
        <h1><?php echo get_the_title(); ?></h1>
        <div class="timeline highlighted highlighted-secondary"><?php echo $timeline; ?></div>
        <div class="informations">
            <h2><?php echo __("Informations", "rhever"); ?></h2>
            <?php if ($date) : ?>
                <div class="date">
                    <span><?php echo __("Date", "rhever"); ?></span>
                    <?php echo $date; ?>
                </div>
            <?php endif; ?>
            <?php if ($event_online == "true") : ?>
                <?php if ($event_online_url) : ?>
                    <div class="location">
                        <span><?php echo __("Lien vers la réunion", "rhever"); ?></span>
                        <a href="<?php echo $event_online_url; ?>" target="_blank"><?php echo $event_online_url; ?></a>
                    </div>
                <?php endif; ?>
            <?php else : ?>
                <?php if ($location) : ?>
                    <div class="location">
                        <span><?php echo __("Lieu", "rhever"); ?></span>
                        <?php echo $location; ?>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
            <?php if ($president) : ?>
                <div class="date">
                    <span><?php echo __("Président(s) de séance", "rhever"); ?></span>
                    <?php echo $president; ?>
                </div>
            <?php endif; ?>
        </div>
        <?php if (has_post_thumbnail()) : ?>
            <div class="featured-image">
                <?php the_post_thumbnail(); ?>
            </div>
        <?php endif; ?>
        <?php the_content(); ?>
        <?php if (get_field('event_date', false, false) < date('Ymd')) : ?>
            <!-- After -->
            <?php if ($report) : ?>
                <div class="documents-list">
                    <h2><?php echo __("Compte-rendu", "rhever"); ?></h2>
                    <?php echo do_shortcode('[pdfjs-viewer url=' . $report["url"] . ' viewer_width=100% viewer_height=1000px fullscreen=true download=true print=true]'); ?>
                    <a href="<?php echo $report["url"]; ?>" target="_blank"><span class="extension"><?php echo pathinfo($report["url"], PATHINFO_EXTENSION); ?></span><?php echo $report["title"]; ?></a>
                </div>
            <?php endif; ?>
            <?php if ($quiz_results) : ?>
                <div class="documents-list">
                    <h2><?php echo __("Résultat du questionnaire", "rhever"); ?></h2>
                    <?php echo do_shortcode('[pdfjs-viewer url=' . $quiz_results["url"] . ' viewer_width=100% viewer_height=1000px download=true print=true]'); ?>
                    <a href="<?php echo $quiz_results["url"]; ?>" target="_blank"><span class="extension"><?php echo pathinfo($quiz_results["url"], PATHINFO_EXTENSION); ?></span><?php echo $quiz_results["title"]; ?></a>
                </div>
            <?php endif; ?>
            <?php if ($bibliographies) : ?>
                <div class="documents-list">
                    <h2><?php echo __("Bibliographie(s) associée(s)", "rhever"); ?></h2>
                    <?php while (have_rows('event_bibliographies')) : the_row();
                        $document = get_sub_field('bibliography'); ?>
                        <?php echo do_shortcode('[pdfjs-viewer url=' . $document["url"] . ' viewer_width=100% viewer_height=1000px download=true print=true]'); ?>
                        <a href="<?php echo $document["url"]; ?>" target="_blank"><span class="extension"><?php echo pathinfo($document["url"], PATHINFO_EXTENSION); ?></span><?php echo $document["title"]; ?></a>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
            <?php if ($references) : ?>
                <div class="documents-list documents">
                    <h2><?php echo __("Référentiel(s) associé(s)", "rhever"); ?></h2>
                    <?php foreach ($references as $post) :
                        setup_postdata($post); ?>
                        <a href="<?php the_permalink(); ?>"><span class="extension"><?php echo pathinfo(get_field("reference_file")["url"], PATHINFO_EXTENSION); ?></span><?php echo get_the_title(); ?></a>
                    <?php endforeach; ?>
                </div>
                <?php
                wp_reset_postdata(); ?>
            <?php endif; ?>
        <?php else : ?>
            <!-- Before -->
            <?php if ($program) : ?>
                <div class="program formatted">
                    <h2><?php echo __("Ordre du jour", "rhever"); ?></h2>
                    <?php echo $program; ?>
                </div>
            <?php endif; ?>
            <?php if ($quiz) : ?>
                <div class="quiz">
                    <h2><?php echo __("Questionnaire à remplir", "rhever"); ?></h2>
                    <?php echo $quiz; ?>
                </div>
            <?php endif; ?>
        <?php endif; ?>

        <?php if (have_rows('event_documents')) : ?>
            <div class="documents-list documents">
                <h2><?php echo __("Document(s) complémentaire(s)", "rhever"); ?></h2>
                <ul>
                    <?php while (have_rows('event_documents')) : the_row();
                        $document = get_sub_field('document'); ?>
                        <li><a href="<?php echo $document["url"]; ?>" target="_blank"><span class="extension"><?php echo pathinfo($document["url"], PATHINFO_EXTENSION); ?></span><?php echo $document["title"]; ?></a></li>
                    <?php endwhile; ?>
                </ul>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>