<?php
$labels = [
    'name' => __('Publications', 'rhever'),
    'singular_name' => __('Publication', 'rhever'),
    'add_new' => __('Ajouter', 'rhever'),
    'add_new_item' => __('Ajouter une publication', 'rhever'),
    'edit_item' => __('Modifier la publication', 'rhever'),
    'new_item' => __('Nouvellz publication', 'rhever'),
    'view_item' => __('Voir la publication', 'rhever'),
    'search_items' => __('Chercher une publication', 'rhever'),
    'not_found' =>  __('Aucune publication de trouvée.', 'rhever'),
    'all_items' => __('Toutes les publication', 'rhever'),
    'not_found_in_trash' => __('Aucune publication dans la corbeille.', 'rhever'),
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
        'custom-fields',
    ],
    'taxonomies' => [],
    'has_archive' => true,
    'rewrite' => ['slug' => 'publications', 'with_front' => true],
    'menu_position' => 6,
    'menu_icon' => 'dashicons-media-document',
];

register_post_type('issue', $args);
