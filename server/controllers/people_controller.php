<?php

include_once('../base_controller.php');
include_once('../helpers/utils_helper.php');

class Person_controller {
    
    function get_all_people()
    {
        $people = array(
            'name' => 'Juan',
            'last_name' => 'Perez',
            'phone' => '1234657890'
        );
        
        echo format_response($people);
    }
}

$people = array(
    'name' => 'Juan',
    'last_name' => 'Perez',
    'phone' => '1234657890'
);

echo format_response($people);
//echo "names: ".json_encode($people);
?>
