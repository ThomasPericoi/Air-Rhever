<?php /* Template Name: Adhérents */ ?>
<?php get_header(); ?>

<!-- Hero -->
<?php $introduction = get_field("page_introduction"); ?>
<section id="directory-hero" class="hero">
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

<!-- Directory -->
<section id="directory-list">
    <div class="container container-lg">
        <?php
        $members = get_field('association_members');
        $order = array();
        foreach ($members as $i => $row) {
            $order[$i] = $row['name'];
        }
        array_multisort($order, SORT_ASC, $members);
        if ($members) : ?>
            <div class="directory-grid grid-2">
                <?php foreach ($members as $i => $member) : ?>
                    <div class="grid-element">
                        <?php if (!empty($member['portrait'])) : ?>
                            <figure>
                                <img src="<?php echo esc_url($member['portrait']['url']); ?>" alt="<?php echo esc_attr($member['portrait']['alt']); ?>" />
                            </figure>
                        <?php endif; ?>
                        <div class="content formatted">
                            <h2 class="h3-size highlighted highlighted-secondary"><span><?php echo $member['name']; ?></span> <?php echo $member['first_name']; ?></h2>
                            <?php if ($member['status']) : ?>
                                <div class="status"><?php echo $member['status']; ?></div>
                            <?php endif; ?>
                            <?php if ($member['addresses']) : ?>
                                <div>
                                    <h3 class="h5-size">Adresse(s)</h3>
                                    <?php foreach ($member['addresses'] as $i) : ?>
                                        <div><?php echo $i["address"]; ?></div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                            <?php if ($member['phone_secretary'] || $member['email_secretary']) : ?>
                                <div>
                                    <h3 class="h5-size">Secretariat</h3>
                                    <?php if ($member['phone_secretary']) : ?>
                                        <a href="tel:<?php echo $member['phone_secretary']; ?>"><?php echo $member['phone_secretary']; ?></a>
                                    <?php endif; ?>
                                    <?php if ($member['email_secretary']) : ?>
                                        <?php foreach ($member['email_secretary'] as $i) : ?>
                                            <a href="mailto:<?php echo $i['mail']; ?>"><?php echo $i['mail']; ?></a>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                            <?php if ($member['phone_personal'] || $member['email_personal']) : ?>
                                <div>
                                    <h3 class="h5-size">Personnel</h3>
                                    <?php if ($member['phone_personal']) : ?>
                                        <a href="tel:<?php echo $member['phone_personal']; ?>"><?php echo $member['phone_personal']; ?></a>
                                    <?php endif; ?>
                                    <?php if ($member['email_personal']) : ?>
                                        <a href="mailto:<?php echo $member['email_personal']; ?>"><?php echo $member['email_personal']; ?></a>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                            <?php if ($member['expertises']) : ?>
                                <div>
                                    <h3 class="h5-size">Domaine(s) d'expertise</h3>
                                    <div>
                                        <?php if (in_array("Autre", $member['expertises'])) : ?>
                                            <?php echo $member['expertises_other']; ?>
                                        <?php else : ?>
                                            <?php echo implode(', ', $member['expertises']); ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if ($member['comment']) : ?>
                                <div>
                                    <h3 class="h5-size">Commentaire</h3>
                                    <div><?php echo $member['comment']; ?></div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>