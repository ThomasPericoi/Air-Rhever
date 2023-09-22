</main>

<!-- Footer -->
<footer>
    <div id="main-footer">
        <div class="container">
            <div class="inner-footer">
                <?php
                if (function_exists('the_custom_logo')) {
                    the_custom_logo();
                }
                ?>
                <div class="col">
                    <?php echo get_field('footer_description', 'option'); ?>
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