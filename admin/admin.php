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
        'event_category',
        array('event'),
        array(
            'label' => __('Catégories', 'rhever'),
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
    if (isset($query->query_vars['post_type']) && $query->query_vars['post_type'] == 'event') {
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
    $blocks = ["sample"];

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
