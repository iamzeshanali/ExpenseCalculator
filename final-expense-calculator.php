<?php
/**
 * @package BenzeePlugin
 */
/*
  Plugin Name: Final Expense Calculator
  Plugin URI: http://localhost/wealthfront/benzee-plugin
  Description: This is the first attempt for demo work of Plugin Development
  Version: 1.0.0
  Author: Subhan
  Author URI: https://zeeshan-ali-2213.github.io/profile.github.io/
  License: GPLv2 or later
  Text Domain: fe-calculator
 */

/*if (!defined('ABSPATH')){
    die;
}*/

defined('ABSPATH') or die('Hey! You can not access the file');

if(file_exists( dirname(__FILE__).'/vendor/autoload.php')){
    require_once dirname(__FILE__).'/vendor/autoload.php';
}

use Inc\Base\Activate;
use Inc\Base\Deactivate;
use Inc\Base\Uninstall;

function activate_fe_plugin (){
    Activate::activate();
}
register_activation_hook(__FILE__,'activate_fe_plugin');

function deactivate_fe_plugin(){
    Deactivate::deactivate();
}
register_deactivation_hook(__FILE__,'deactivate_fe_plugin');


function uninstall_my_plugin(){
    Uninstall::uninstall();
}
register_uninstall_hook(__FILE__,'uninstall_my_plugin');

if (class_exists('Inc\\Init')){
    Inc\Init::register_services();
}
