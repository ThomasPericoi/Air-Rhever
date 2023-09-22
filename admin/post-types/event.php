<?php
$labels = [
    'name' => __('Événements', 'rhever'),
    'singular_name' => __('Événement', 'rhever'),
    'add_new' => __('Ajouter', 'rhever'),
    'add_new_item' => __('Ajouter un événement', 'rhever'),
    'edit_item' => __('Modifier l\'événement', 'rhever'),
    'new_item' => __('Nouvel événement', 'rhever'),
    'view_item' => __('Voir l\'événement', 'rhever'),
    'search_items' => __('Chercher un événement', 'rhever'),
    'not_found' =>  __('Aucun événement de trouvé.', 'rhever'),
    'all_items' => __('Tous les événement', 'rhever'),
    'not_found_in_trash' => __('Aucun événement dans la corbeille.', 'rhever'),
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
        'editor',
        'excerpt',
        'custom-fields',
    ],
    'has_archive' => true,
    'rewrite' => ['slug' => 'evenements', 'with_front' => true],
    'menu_position' => 7,
    'menu_icon' => 'dashicons-calendar-alt',
];

register_post_type('event', $args);
