<?php 
require('model/database.php');
require('model/classes_db.php');
require('model/types_db.php');
require('model/vehicle_db.php');

include 'views/public_header.php';

$sortType = filter_input(INPUT_POST, 'sortType');
if(empty($sortType)) {
    $sortType = '0';
}
// sort by price or year either by ascending or decending
switch($sortType){
case '0':
case '1':
    $sortType = 'price';
    $vehicles = get_vehicles($sortType, FALSE);
    break;
case '2':
    $sortType = 'price';
    $vehicles = get_vehicles($sortType, TRUE);
    break;
case '3':
    $sortType = 'year';
    $vehicles = get_vehicles($sortType, FALSE);
    break;
case '4':
    $sortType = 'year';
    $vehicles = get_vehicles($sortType, TRUE);
    break;
default:
    $error = "Null, false, or wrong value for sortType.";
    include 'errors\error.php';
    break;
}

$types = get_types();
$classes = get_classes();
include('views\vehicle_list.php');

include 'views\footer.php';