<?php
/**
 * Plugin Name: Quote of the Day
 * Description: Displays a random quote in the dashboard and lets admins manage quotes.
 * Version: 1.0.0
 * Author: Earl Loyola
 */

require_once plugin_dir_path(__FILE__) . 'config/Config.php';
require_once QOTD_PLUGIN_PATH . 'app/Controllers/QuoteController.php';

use QOTD\Controllers\QuoteController;

add_action('wp_dashboard_setup', [QuoteController::class, 'addDashboardWidget']);


require_once QOTD_PLUGIN_PATH . 'app/Models/QuoteCPT.php';
use QOTD\Models\QuoteCPT;

add_action('init', [QuoteCPT::class, 'register']);

add_shortcode('quote_of_the_day', function() {
    $quote = QuoteCPT::getRandomQuote();
    return $quote ? "<blockquote>{$quote}</blockquote>" : "No quote available.";
});
