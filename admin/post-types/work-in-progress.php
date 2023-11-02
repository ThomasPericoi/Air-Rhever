<?php
$labels = [
    'name' => __('Travaux en cours', 'rhever'),
    'singular_name' => __('Travail en cours', 'rhever'),
    'add_new' => __('Ajouter', 'rhever'),
    'add_new_item' => __('Ajouter un travail', 'rhever'),
    'edit_item' => __('Modifier le travail', 'rhever'),
    'new_item' => __('Nouveau travail', 'rhever'),
    'view_item' => __('Voir le travail', 'rhever'),
    'search_items' => __('Chercher un travail', 'rhever'),
    'not_found' =>  __('Aucun travail de trouvé.', 'rhever'),
    'all_items' => __('Tous les travaux', 'rhever'),
    'not_found_in_trash' => __('Aucun travail dans la corbeille.', 'rhever'),
    'parent_item_colon' => __('', 'rhever'),
];

$args = [
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'show_in_rest' => true,
    'query_var' => true,
    'hierarchical' => true,
    'capability_type' => 'page',
    'supports' => [
        'title',
        'custom-fields',
    ],
    'taxonomies' => [],
    'has_archive' => true,
    'rewrite' => ['slug' => 'travaux-en-cours', 'with_front' => true],
    'menu_position' => 6,
    'menu_icon' => 'dashicons-media-document',
];

register_post_type('work-in-progress', $args);
