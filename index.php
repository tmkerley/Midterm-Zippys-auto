<?php 
require('model\database.php');
require('model\classes_db.php');
require('model\types_db.php');
require('model\vehicle_db.php');

include 'views\public_header.php';

$sortType = filter_input(INPUT_GET, 'sortType');
// sort by price or year either by ascending or decending
switch($sortType){
case '2':
    $sortType = 'price DESC';
    break;
case '3':
    $sortType = 'year ASC';
    break;
case '4':
    $sortType = 'year DESC';
case '0':
case '1':
default:
    $sortType = 'price ASC';
    break;
}
$typeFilter = filter_input(INPUT_GET, 'typefilter');
if(!empty($typeFilter)) {
    $typeFilter = '*';
}
$classFilter = filter_input(INPUT_GET, 'classfilter');
if(empty($classFilter)){
    $classFilter = '*';
}
$vehicles = get_vehicles($sortType, $typeFilter, $classFilter);
$types = get_types();
$classes = get_classes();
include('views\vehicle_list.php');

include 'views\footer.php';