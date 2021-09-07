<?php
/*
 * @package BenzeePlugin
 */

namespace Inc\Base;

class Uninstall {
    public static function uninstall(){
        flush_rewrite_rules();
        global $wpdb;
        $wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}fe_companydata");
        $wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}fe_customerdata");
        $wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}fe_leadsdata");
    }
}