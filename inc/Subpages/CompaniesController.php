<?php
/*
 * @package BenzeePlugin
 */

namespace Inc\Subpages;

use Inc\Api\Callbacks\CompaniesCallbacks;
use Inc\Api\Callbacks\CustomPostTypeCallbacks;
use Inc\Api\SettingsApi;
use Inc\Base\BaseController;

class CompaniesController extends BaseController {
    public $settings = [];
    public $callbacks = [];

    public $subPages = [];

    public $subpages = [];
    public $customPostTypes = [];
    public function register(){


        $this->settings = new SettingsApi();
        $this->callbacks = new CompaniesCallbacks();

        $this->setSubPages();

        $this->setSettings();

        $this->setSections();

        $this->setFields();

        $this->settings->addSubPages($this->subPages)->register();



    }
    public function setSubPages(){
        $this->subPages = [
            [
                'parent_slug' => 'companies_page',
                'page_title' => 'Add',
                'menu_title' => 'Add',
                'capability' => 'manage_options',
                'menu_slug' => 'fe_companies',
                'callback' => [$this->callbacks, 'addOrEditCompanies'],
            ]

        ];
    }


    public function setSettings(){
        $args =  [
            [
                'option_group' => 'companies_setting',
                'option_name' => 'companies_option',
                'callback' => [$this->callbacks, 'sanitize'],
            ]
        ];

        $this->settings->setSettings($args);
    }

    public function setSections(){
        $args = [
            [
                'id' => 'companies_index',
                'title' => '',
                'callback' => '',
                'page' => 'fe_companies'
            ]
        ];
        $this->settings->setSections($args);
    }

    public function setFields(){

        $company = [];
        if (isset($_POST['edit_company'])){
            $value = $_POST['edit_company'];

            global $wpdb;
            $company = $wpdb->get_results('SELECT * FROM wp_fe_companydata WHERE id="'.$value.'"');
            $company = $company[0];
            $args = [
                [
                    'id' => 'id',
                    'title' => 'Company ID',
                    'callback' => [$this->callbacks, 'textField'],
                    'page' => 'fe_companies',
                    'section' => 'companies_index',
                    'args' => [
                        'option_name' => 'companies_option',
                        'label_for' => 'id',
                        'placeholder' => 'eg. ID',
                        'type' => 'number',
                        'value' => isset($company->id) ? $company->id : ''
                    ],
                ],
                [
                    'id' => 'name',
                    'title' => 'Name',
                    'callback' => [$this->callbacks, 'textField'],
                    'page' => 'fe_companies',
                    'section' => 'companies_index',
                    'args' => [
                        'option_name' => 'companies_option',
                        'label_for' => 'name',
                        'placeholder' => 'eg. Name',
                        'type' => 'text',
                        'value' => $company->name
                    ],
                ],
                [
                    'id' => 'logo',
                    'title' => 'Company Logo',
                    'callback' => [$this->callbacks, 'textField'],
                    'page' => 'fe_companies',
                    'section' => 'companies_index',
                    'args' => [
                        'option_name' => 'companies_option',
                        'label_for' => 'logo',
                        'placeholder' => 'eg. Logo',
                        'type' => 'file',
                        'value' => $company->logo
                    ],
                ],
                [
                    'id' => 'state',
                    'title' => 'State',
                    'callback' => [$this->callbacks, 'textField'],
                    'page' => 'fe_companies',
                    'section' => 'companies_index',
                    'args' => [
                        'option_name' => 'companies_option',
                        'label_for' => 'state',
                        'placeholder' => 'eg. State',
                        'type' => 'text',
                        'value' => $company->state
                    ],
                ],
                [
                    'id' => 'description',
                    'title' => 'Description',
                    'callback' => [$this->callbacks, 'textField'],
                    'page' => 'fe_companies',
                    'section' => 'companies_index',
                    'args' => [
                        'option_name' => 'companies_option',
                        'label_for' => 'description',
                        'placeholder' => 'eg. Description',
                        'type' => 'text',
                        'value' => $company->description
                    ],
                ],

            ];
        }else{
            $args = [
                [
                    'id' => 'id',
                    'title' => 'Company ID',
                    'callback' => [$this->callbacks, 'textField'],
                    'page' => 'fe_companies',
                    'section' => 'companies_index',
                    'args' => [
                        'option_name' => 'companies_option',
                        'label_for' => 'id',
                        'placeholder' => 'eg. ID',
                        'type' => 'number',
                        'value' => ''
                    ],
                ],
                [
                    'id' => 'name',
                    'title' => 'Name',
                    'callback' => [$this->callbacks, 'textField'],
                    'page' => 'fe_companies',
                    'section' => 'companies_index',
                    'args' => [
                        'option_name' => 'companies_option',
                        'label_for' => 'name',
                        'placeholder' => 'eg. Name',
                        'type' => 'text',
                        'value' => ''
                    ],
                ],
                [
                    'id' => 'logo',
                    'title' => 'Company Logo',
                    'callback' => [$this->callbacks, 'textField'],
                    'page' => 'fe_companies',
                    'section' => 'companies_index',
                    'args' => [
                        'option_name' => 'companies_option',
                        'label_for' => 'logo',
                        'placeholder' => 'eg. Logo',
                        'type' => 'file',
                        'value' => ''
                    ],
                ],
                [
                    'id' => 'state',
                    'title' => 'State',
                    'callback' => [$this->callbacks, 'textField'],
                    'page' => 'fe_companies',
                    'section' => 'companies_index',
                    'args' => [
                        'option_name' => 'companies_option',
                        'label_for' => 'state',
                        'placeholder' => 'eg. State',
                        'type' => 'text',
                        'value' => ''
                    ],
                ],
                [
                    'id' => 'description',
                    'title' => 'Description',
                    'callback' => [$this->callbacks, 'textField'],
                    'page' => 'fe_companies',
                    'section' => 'companies_index',
                    'args' => [
                        'option_name' => 'companies_option',
                        'label_for' => 'description',
                        'placeholder' => 'eg. Description',
                        'type' => 'text',
                        'value' => ''
                    ],
                ],

            ];
        }



        $this->settings->setFields($args);
    }

}