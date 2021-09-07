<?php
/*
 * @package BenzeePlugin
 */

namespace Inc\Base;

class Activate {
    public static function activate(){
        flush_rewrite_rules();
        $default = [];
        if ( ! get_option('companies_option')){
            update_option('companies_option', $default);
        }
        if ( ! get_option('benzee_plugin_cpt')){
            update_option('benzee_plugin_cpt', $default);
        }
        $default = [];
        global $wpdb;

        $table_name1 = $wpdb->prefix . 'fe_companydata';
        $table_name2 = $wpdb->prefix . 'fe_customerdata';
        $table_name3 = $wpdb->prefix . 'fe_leadsdata';

        $charset_collate = $wpdb->get_charset_collate();

        $queries = [
            "CREATE TABLE IF NOT EXISTS $table_name1 (
					id int NOT NULL AUTO_INCREMENT,
					name varchar(255) NOT NULL,
					logo longblob NOT NULL,
					state varchar(255) NOT NULL,
					description text NOT NULL,
					PRIMARY KEY  (id)

			 	) $charset_collate;",
            "CREATE TABLE IF NOT EXISTS $table_name2 (
					id int NOT NULL AUTO_INCREMENT,
					name varchar(255) NOT NULL,
					age tinyint NOT NULL,
					state varchar(255) NOT NULL,
					ammount int NOT NULL,
					gender varchar(10) NOT NULL,
					email varchar(255) NOT NULL,
					phone varchar(255) NOT NULL,
					PRIMARY KEY  (id)

			 	) $charset_collate;",
            "CREATE TABLE IF NOT EXISTS $table_name3 (
					id int NOT NULL AUTO_INCREMENT,
					name varchar(255) NOT NULL,
					age tinyint NOT NULL,
					state varchar(255) NOT NULL,
					ammount int NOT NULL,
					gender varchar(10) NOT NULL,
					email varchar(255) NOT NULL,
					phone varchar(255) NOT NULL,
					PRIMARY KEY  (id)

				) $charset_collate;"
        ];

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        foreach ($queries as $sql) {
            dbDelta($sql);
        }
        // dbDelta($sql);

    }
}