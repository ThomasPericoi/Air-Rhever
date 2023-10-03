<?php
$labels = [
    'name' => __('Éditos', 'rhever'),
    'singular_name' => __('Édito', 'rhever'),
    'add_new' => __('Ajouter', 'rhever'),
    'add_new_item' => __('Ajouter un édito', 'rhever'),
    'edit_item' => __('Modifier l\'édito', 'rhever'),
    'new_item' => __('Nouvel édito', 'rhever'),
    'view_item' => __('Voir l\'édito', 'rhever'),
    'search_items' => __('Chercher un édito', 'rhever'),
    'not_found' =>  __('Aucun édito de trouvé.', 'rhever'),
    'all_items' => __('Tous les éditos', 'rhever'),
    'not_found_in_trash' => __('Aucun édito dans la corbeille.', 'rhever'),
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
    'taxonomies' => [],
    'has_archive' => false,
    'rewrite' => ['slug' => 'editos', 'with_front' => true],
    'menu_position' => 6,
    'menu_icon' => 'dashicons-edit',
];

register_post_type('edito', $args);
