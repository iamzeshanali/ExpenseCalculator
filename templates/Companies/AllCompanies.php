<div class="wrap">
    <h1 class="text-tp">All Companies</h1>
    <?php settings_errors();?>

    <h3>Manage All Companies</h3>
    <?php

    global $wpdb;
    $companies = $wpdb->get_results('SELECT * FROM wp_fe_companydata');
    echo '<table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Logo</th>
                    <th>State</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>';
    foreach ($companies as $company){
        echo "
                        <tr>
                        <td>{$company->id}</td>
                        <td>{$company->name}</td>";


                        echo "<td>{$company->logo}</td>
                        <td>{$company->state}</td>
                        <td>{$company->description}</td>
                        <td>";
                    $url =  home_url( '/' ).'wp-admin/admin.php?page=fe_companies';

        echo '<form method="post" action="'.$url.'" class="inline-block">';
        echo '<input type="hidden" name="edit_company" value="'.$company->id.'">';
        submit_button('Edit', 'primary small', 'submit', false);
        echo '</form> ';


        echo '<form method="post" action="" class="inline-block">';
        echo '<input type="hidden" name="delete_company" value="'.$company->id.'">';
        submit_button('Delete', 'delete small', 'submit', false, array(
            'onClick' => 'return confirm("Are you sure you want to delete this Custom Post Type?
                         The data associated with ot will not be deleted.");'
        ));
        echo '</form></td></tr>';

    }
    echo '</table>';
    ?>

    <?php
    if(isset($_POST['edit_company'])){
        $url =  home_url( '/' ).'wp-admin/admin.php?page=fe_companies';
        wp_safe_redirect($url);
        exit;
    }
    if(isset($_POST['delete_company'])){
        $value = $_POST['delete_company'];

        global $wpdb;
        $wpdb->get_results('DELETE FROM wp_fe_companydata WHERE id ="'.$value.'"');

    }
    ?>
</div>
