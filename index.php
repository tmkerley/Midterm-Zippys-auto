<?php 
include './views/public_header.php';

require './model/database.php';
require './model/classes_db.php';
require './model/types_db.php';
require './model/vehicle_db.php';
require './model/make_db.php';

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

$types = get_types();
$classes = get_classes();
$make = get_make();

include './views/vehicle_list.php';

include './views/footer.php';