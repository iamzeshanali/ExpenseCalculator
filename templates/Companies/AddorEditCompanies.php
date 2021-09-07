<div class="wrap">
    <h1 class="text-tp">Register the Company</h1>
    <?php settings_errors();
    $destination_path = plugin_dir_path(dirname(__FILE__, 2));
    echo $destination_path.'assets/images/';
     ?>


    <h3>Add new Company</h3>

    <form method="post" action="" enctype="multipart/form-data">
        <?php
        settings_fields('companies_setting');
        do_settings_sections('fe_companies');
        submit_button();
        ?>
    </form>
    <?php
    if(isset($_POST['submit'])){

        $id=$_POST['id'];
        $name=$_POST['name'];
        $filename = $_FILES["logo"]["name"];
        $tempname = $_FILES["logo"]["tmp_name"];
        $destination_path = plugin_dir_path(dirname(__FILE__, 2));
        $destination_path =  $destination_path.'assets/images/';

        $targetFile =  $destination_path . basename($_FILES["logo"]["name"]);

        $state=$_POST['state'];
        $description=$_POST['description'];

        if (move_uploaded_file($tempname, $targetFile)) {
            global $wpdb;
            $companies = $wpdb->insert('wp_fe_companydata',[
                "id" => $id,
                "name" => $name,
                "logo" => $filename,
                "state" => $state,
                "description" => $description,
            ]);
        }else{
            echo 'error: move_uploaded_file failed', PHP_EOL;
            print_r(error_get_last());
            exit;
        }
    }
    ?>
</div>