<?php
$labels = [
    'name' => 'Éditos',
    'singular_name' => 'Édito',
    'add_new' => 'Ajouter',
    'add_new_item' => 'Ajouter un édito',
    'edit_item' => 'Modifier l\'édito',
    'new_item' => 'Nouvel édito',
    'view_item' => 'Voir l\'édito',
    'search_items' => 'Chercher un édito',
    'not_found' =>  'Aucun édito de trouvé.',
    'all_items' => 'Tous les éditos',
    'not_found_in_trash' => 'Aucun édito dans la corbeille.',
    'parent_item_colon' => ''
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
        'thumbnail',
        'excerpt',
        'custom-fields',
        'page-attributes'
    ],
    'taxonomies' => [],
    'has_archive' => false,
    'rewrite' => ['slug' => 'edito', 'with_front' => true],
    'menu_position' => 6,
    'menu_icon' => 'dashicons-edit',
];

register_post_type('edito', $args);
