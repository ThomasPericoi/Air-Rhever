<?php

/* OPTIONS PAGE(S)
--------------------------------------------------------------- */

// Add options page
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title'    => __('Options du site', 'rhever'),
        'menu_title'    => __('Options du site', 'rhever'),
        'menu_slug'     => 'options',
        'capability'    => 'edit_pages',
        'redirect'      => true,
        'position'      => 2,
        'update_button' => __('Mettre à jour', 'rhever'),
        'updated_message' => __('Tout est bon.', 'rhever'),
        'icon_url'      => 'dashicons-info'
    ));
}

/* POST TYPE(S)
--------------------------------------------------------------- */

// Register post types
function register_custom_post_types()
{
    $post_types = ["edito", "event"];

    foreach ($post_types as $post_type) {
        include_once(__DIR__ . '/post-types/' . $post_type . '.php');
    }
}
add_action('init', 'register_custom_post_types');

// Add custom landing page taxonomy
function register_custom_taxonomy()
{
    register_taxonomy(
        'event_type',
        array('event'),
        array(
            'label' => __('Types', 'rhever'),
            'public' => false,
            'show_ui' => true,
            'show_admin_column' => true,
            'show_in_rest' => true,
            'query_var' => true,
            'hierarchical' => true,
        )
    );
}
add_action('init', 'register_custom_taxonomy');

// Order events by custom dates
function order_event_by_date_admin($query)
{
    if (isset($query->query_vars['post_type']) && (($query->query_vars['post_type'] == 'event')) && (is_archive() || is_admin())) {
        $query->set('orderby', 'meta_value');
        $query->set('meta_key', 'event_date');
        $query->set('order', 'DESC');
    }
    return $query;
}
add_action('pre_get_posts', 'order_event_by_date_admin');

/* BLOCK(S)
--------------------------------------------------------------- */

// Register blocks
function register_acf_blocks()
{
    $blocks = ["cta"];

    foreach ($blocks as $block) {
        register_block_type(__DIR__ . '/blocks/' . $block);
    }
}
add_action('init', 'register_acf_blocks');

// Register custom block category
function register_block_category($categories, $post)
{
    return array_merge(
        $categories,
        array(
            array(
                'slug' => 'rhever',
                'title' => __('RHEVER', 'rhever'),
            ),
        )
    );
}
add_filter('block_categories_all', 'register_block_category', 10, 2);

/* USER ROLE(S)
--------------------------------------------------------------- */

// Add and delete roles
function manage_user_roles()
{
    remove_role('subscriber');
    remove_role('editor');
    remove_role('contributor');
    remove_role('author');
    add_role('member', 'Membre RHEVER', array(
        'read' => true
    ));
}
add_action('init', 'manage_user_roles');

// Redirect to homepage except for administrators
function login_redirect_members($url, $request, $user)
{
    if ($user && is_object($user) && is_a($user, 'WP_User')) {
        if ($user->has_cap('administrator')) {
            $url = admin_url();
        } else {
            $url = home_url();
        }
    }
    return $url;
}
add_filter('login_redirect', 'login_redirect_members', 10, 3);

// Hide admin bar except for administrators
function remove_admin_bar()
{
    if (!current_user_can('administrator') && !is_admin()) {
        show_admin_bar(false);
    }
}
add_action('after_setup_theme', 'remove_admin_bar');
