<?php
namespace QOTD\Models;

class QuoteCPT {
    public static function register() {
        register_post_type('qotd_quote', [
            'labels' => [
                'name' => __('Quotes'),
                'singular_name' => __('Quote'),
            ],
            'public' => true,
            'show_ui' => true,
            'has_archive' => true,
            'show_in_menu' => true,
            'menu_icon' => 'dashicons-format-quote',
            'supports' => ['title', 'editor'],
        ]);
    }

    public static function getAllQuotes() {
        $args = [
            'post_type' => 'qotd_quote',
            'posts_per_page' => -1,
            'post_status' => 'publish',
        ];
        $posts = get_posts($args);
        return array_map(function($post) {
            return html_entity_decode(wpautop(apply_filters('the_content', $post->post_content))); // use post_content instead of post_title
        }, $posts);
    }

    public static function getRandomQuote() {
        $quotes = self::getAllQuotes();
        if (!empty($quotes)) {
            return $quotes[array_rand($quotes)];
        }
        return null;
    }
}
