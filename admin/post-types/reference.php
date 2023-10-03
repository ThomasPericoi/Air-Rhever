<?php
$labels = [
    'name' => __('Référentiels', 'rhever'),
    'singular_name' => __('Référentiel', 'rhever'),
    'add_new' => __('Ajouter', 'rhever'),
    'add_new_item' => __('Ajouter un référentiel', 'rhever'),
    'edit_item' => __('Modifier le référentiel', 'rhever'),
    'new_item' => __('Nouvel référentiel', 'rhever'),
    'view_item' => __('Voir le référentiel', 'rhever'),
    'search_items' => __('Chercher un référentiel', 'rhever'),
    'not_found' =>  __('Aucun référentiel de trouvé.', 'rhever'),
    'all_items' => __('Tous les référentiel', 'rhever'),
    'not_found_in_trash' => __('Aucun référentiel dans la corbeille.', 'rhever'),
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
    'rewrite' => ['slug' => 'referentiels', 'with_front' => true],
    'menu_position' => 6,
    'menu_icon' => 'dashicons-media-document',
];

register_post_type('reference', $args);
