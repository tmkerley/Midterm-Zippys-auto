<?php 
include './views/admin_header.php';

require '../model/database.php';
require('../model/classes_db.php');
require('../model/types_db.php');
require('../model/make_db.php');
require('../model/vehicle_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_vehicles';
    }
}

switch ($action) {
case 'list_vehicles':
    $vehicle_id = filter_input(INPUT_GET, 'vehicleID', FILTER_VALIDATE_INT);
    $vehicles = get_vehicles($vehicle_id);
    include('./views/admin_vehicle_list.php');

    $typeFilter = filter_input(INPUT_POST, 'typeFilter');
    $classFilter = filter_input(INPUT_POST, 'classFilter');
    $clear = filter_input(INPUT_POST, 'clearFlag');

    if($clear){
    $filterFlag = FALSE;
    }
    else if (isset($typeFilter) || isset($classFilter)) {
    $filterFlag = TRUE;
    }
    else {
    $filterFlag = FALSE;
    }
    $sortType = filter_input(INPUT_POST, 'sortType');
    if(empty($sortType)) {
        $sortType = '0';
    }
    // sort by price or year either by ascending or decending
    switch($sortType){
    case '0':
    case '1':
        $vehicles = get_vehicles();
        break;
    case '2':
        $vehicles = get_ascending_price_vehicles();
        break;
    case '3':
        $vehicles = get_descending_year_vehicles();
        break;
    case '4':
        $vehicles = get_ascending_year_vehicles();
        break;
    default:
        $error = "Null, false, or wrong value for sortType.";
        include './errors/error.php';
        break;
}
    break;

case 'list_types':
    $types = get_types();
    include('./views/type_list.php');
    break;

case 'list_classes':
    $classes = get_classes();
    include('./views/class_list.php');
    break;

case 'list_makes':
    $makes = get_make();
    include('./views/make_list.php');
    break;

case 'delete_vehicle':
    $vehicle_id = filter_input(INPUT_POST, 'vehicleID', FILTER_VALIDATE_INT);
    if ($vehicle_id == NULL || $vehicle_id == FALSE) {
        $error = "Missing or incorrect Item Num or category id.";
        include('./errors/error.php');
    } 
    else { 
        delete_vehicle($vehicle_id);
        header("Location: .?action=list_vehicles");
    }
    break;

case 'delete_type':
    $type_id = filter_input(INPUT_POST, 'typeID', 
        FILTER_VALIDATE_INT);
    delete_type($type_id);
    header("Location: .?action=list_types");
    break;

case 'delete_class':
    $class_id = filter_input(INPUT_POST, 'classID', 
        FILTER_VALIDATE_INT);
    delete_class($class_id);
    header("Location: .?action=list_classes");
    break;

case 'delete_make':
    $makeID = filter_input(INPUT_POST, 'makeID', 
        FILTER_VALIDATE_INT);
    delete_make($makeID);
    header("Location: .?action=list_makes");
    break;

case 'show_add_form':
    $types = get_types();
    $classes = get_classes();
    $makes = get_make();
    include('./views/add_vehicle_form.php');   
    break;

case 'add_vehicle':
    $vehicle_id = filter_input(INPUT_POST, 'vehicleID', 
        FILTER_VALIDATE_INT);
    $type_id = filter_input(INPUT_POST, 'typeID', FILTER_VALIDATE_INT);
    $class_id = filter_input(INPUT_POST, 'classID', FILTER_VALIDATE_INT);
    $make_id = filter_input(INPUT_POST, 'makeID', FILTER_VALIDATE_INT);
    $year = filter_input(INPUT_POST, 'year', FILTER_VALIDATE_INT);
    $model = filter_input(INPUT_POST, 'model');
    $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
    add_vehicle($type_id, $class_id, $make_id, $year, $model, $price);
    header("Location: .?vehicleID=$vehicle_id");
    break;

case 'add_type':
    $type_id = filter_input(INPUT_POST, 'typeID', 
            FILTER_VALIDATE_INT);
    $type_name = filter_input(INPUT_POST, 'type_name');
    if ($type_name == NULL) {
        $error = "Invalid item data. Check all fields and try again.";
        include('./errors/error.php');
    } 
    else { 
        add_type($type_name);
        header("Location: .?action=list_types");
    }
    break;

case 'add_class':
    $class_id = filter_input(INPUT_POST, 'classID', 
        FILTER_VALIDATE_INT);
    $class_name = filter_input(INPUT_POST, 'class_name');
    if ($class_name == NULL) {
        $error = "Invalid item data. Check all fields and try again.";
        include('./errors/error.php');
    } 
    else { 
        add_class($class_name);
        header("Location: .?action=list_classes");
    }
    break; 
case 'add_make':
        $makeID = filter_input(INPUT_POST, 'makeID', 
            FILTER_VALIDATE_INT);
        $makeName = filter_input(INPUT_POST, 'makeName');
        if ($makeName == NULL) {
            $error = "Invalid item data. Check all fields and try again.";
            include('./errors/error.php');
        } 
        else { 
            add_make($makeName);
            header("Location: .?action=list_makes");
        }
        break; 
default:
    include './views/broken.php';
    break;
} 

include './views/footer.php';