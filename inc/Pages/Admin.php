<?php
/*
 * @package BenzeePlugin
 */
namespace Inc\Pages;

use Inc\Api\Callbacks\AdminCallbacks;
use Inc\Api\Callbacks\CompaniesCallbacks;
use Inc\Api\SettingsApi;
use Inc\Base\BaseController;



class Admin extends BaseController {

    public $settings = [];
    public $pages = [];
//    public $subpages = [];
    public $callbacks = [];
    public function register()
    {

        $this->settings = new SettingsApi();
        $this->callbacks = new CompaniesCallbacks();

        $this->setPages();



        $this->settings->addPages($this->pages)->withSubPage('Dashboard')->register();
    }

    public function setPages(){
        $this->pages = [
            [
                'page_title' => 'Final Expense Calculator',
                'menu_title' => 'Final Expense Calculator',
                'capability' => 'manage_options',
                'menu_slug' => 'fe_calculator_page',
//                'callback' => [$this->callbacks, 'adminDashboard'],
                'callback' => function(){echo '<h1>Final Expense Calculator</h1>';},
                'icon_url' => 'dashicons-calculator',
                'position' => 2
            ],

            [
                'page_title' => 'Companies',
                'menu_title' => 'Companies',
                'capability' => 'manage_options',
                'menu_slug' => 'companies_page',
                'callback' => [$this->callbacks, 'allCompanies'],
                'icon_url' => 'dashicons-email-alt2',
                'position' => 3
            ],

            [
                'page_title' => 'Customers',
                'menu_title' => 'Customers',
                'capability' => 'manage_options',
                'menu_slug' => 'customers_page',
                'callback' => function(){echo '<h1>Customers</h1>';},
                'icon_url' => 'dashicons-admin-users',
                'position' => 3
            ],

            [
                'page_title' => 'Quotes',
                'menu_title' => 'Quotes',
                'capability' => 'manage_options',
                'menu_slug' => 'quotes_page',
                'callback' => function(){echo '<h1>Quotes</h1>';},
                'icon_url' => 'dashicons-text',
                'position' => 3
            ],

            [
                'page_title' => 'Leads',
                'menu_title' => 'Leads',
                'capability' => 'manage_options',
                'menu_slug' => 'leads_page',
                'callback' => function(){echo '<h1>Leads</h1>';},
                'icon_url' => 'dashicons-columns',
                'position' => 3
            ]
        ];
    }

}