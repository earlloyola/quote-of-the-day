<?php
namespace QOTD\Controllers;

require_once QOTD_PLUGIN_PATH . 'app/Views/dashboard-widget.php';
require_once QOTD_PLUGIN_PATH . 'app/Models/QuoteCPT.php';

use QOTD\Models\QuoteCPT;

class QuoteController {
    public static function addDashboardWidget() {
        wp_add_dashboard_widget('qotd_widget', 'Quote of the Day', [__CLASS__, 'displayWidget']);
    }

    public static function displayWidget() {
        $quote = QuoteCPT::getRandomQuote();
        if ($quote) {
            echo qotd_dashboard_widget($quote);
        } else {
            echo 'No quotes available.';
        }
    }
}
