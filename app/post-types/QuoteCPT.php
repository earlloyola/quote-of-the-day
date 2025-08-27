<?php
namespace QuoteOfTheDay\PostTypes;

class QuoteCPT {
    public static function register() {
        $labels = [
            'name' => 'Quotes',
            'singular_name' => 'Quote',
            'add_new' => 'Add New',
            'add_new_item' => 'Add New Quote',
            'edit_item' => 'Edit Quote',
            'new_item' => 'New Quote',
            'view_item' => 'View Quote',
            'search_items' => 'Search Quotes',
            'not_found' => 'No quotes found',
            'not_found_in_trash' => 'No quotes found in Trash',
            'menu_name' => 'Quotes',
        ];

        $args = [
            'labels' => $labels,
            'public' => false,
            'show_ui' => true,
            'show_in_menu' => true,
            'menu_position' => 25,
            'menu_icon' => 'dashicons-format-quote',
            'supports' => ['title', 'editor'],
            'has_archive' => false,
            'exclude_from_search' => true,
            'publicly_queryable' => false,
            'show_in_rest' => true,
        ];

        register_post_type('quote', $args);
    }
}
