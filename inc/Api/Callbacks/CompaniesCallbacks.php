<?php
/*
 * @package BenzeePlugin
 */
namespace Inc\Api\Callbacks;


use Inc\Base\BaseController;

class CompaniesCallbacks extends BaseController
{
    public function allCompanies()
    {
        return require_once("$this->plugin_path/templates/Companies/AllCompanies.php");
    }
    public function addOrEditCompanies()
    {
        return require_once("$this->plugin_path/templates/Companies/AddorEditCompanies.php");
    }
    public function sanitize($input){
        echo "DONE";

    }
    public function textField( $args ){
        $name = $args['label_for'];
        $type= $args['type'];
        $option_name = $args['option_name'];
        $value = $args['value'];

        $placeholder = $args['placeholder'];

        echo '<input type="'.$type.'" class="regular-text" id="'.$name.'" name="'.$name.'"  value="'.$value.'" required placeholder="'.$placeholder.'"';
    }

}
