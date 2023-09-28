</main>

<!-- Footer -->
<?php $description = get_field('footer_description', 'option') ?: get_bloginfo("description");
$address = get_field('footer_address', 'option');
$contact_url = get_field('footer_contact_url', 'option'); ?>
<footer aria-hidden="false">
    <div id="main-footer">
        <div class="container">
            <div class="inner-footer">
                <?php
                if (function_exists('the_custom_logo')) {
                    the_custom_logo();
                }
                ?>
                <div class="col">
                    <?php echo $description; ?>
                    <?php if ($address) : ?>
                        <div>
                            <div class="title"><?php echo __("Adresse", "rhever"); ?></div>
                            <?php echo $address; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col">
                    <div class="title"><?php echo __("Navigation", "rhever"); ?></div>
                    <?php wp_nav_menu(array('theme_location' => 'footer-menu', 'menu_class' => 'menu menu-footer', 'container' => false, 'depth' => 1)); ?>
                </div>
                <div class="col">
                    <div class="title"><?php echo __("Une question ?", "rhever"); ?></div>
                    <a class="btn btn-primary btn-icon-mail" href="<?php echo esc_url($contact_url); ?>"><?php echo __("Contactez-nous", "rhever"); ?></a>
                </div>
            </div>
        </div>
    </div>
    <div id="sub-footer">
        <div class="container">
            <?php wp_nav_menu(array('theme_location' => 'sub-footer-menu', 'menu_class' => 'menu menu-sub-footer', 'container' => false, 'depth' => 1)); ?>
            <!-- OpenDyslexic Toggle -->
            <div class="dyslexic-toggle">
                <input type="checkbox" id="open-dyslexic" name="open-dyslexic" class="sr-only" />
                <label for="open-dyslexic"><?php echo __("Activer OpenDyslexic", "rhever"); ?></label>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>