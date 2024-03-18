<?php
function get_vehicles_by_type($type_id) {
    global $db;
    $query = 'SELECT * FROM vehicles
              WHERE vehicles.typeID = :typeID
              ORDER BY vehicleID';
    $statement = $db->prepare($query);
    $statement->bindValue(':typeID', $type_id);
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicle;
}

function get_vehicles($sortType, $typeFilter, $classFilter) {
    global $db;
    $query = 'SELECT * FROM vehicles
              INNER JOIN types ON vehicles.typeID = types.typeID
              INNER JOIN classes ON vehicles.classID = classes.classID
              INNER JOIN make ON vehicles.makeID = make.makeID
              ORDER BY :sortType
              WHERE vehicles.typeID = :typefilter AND vehicles.classID = :classfilter';
    $statement = $db->prepare($query);
    $statement->bindValue(':sortType', $sortType);
    $statement->bindValue(':typefilter', $typeFilter);
    $statement->bindValue(':classfilter', $classFilter);
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
}

function get_vehicles_filtered($sortType, $filterType) {
    global $db;
    $query = 'SELECT * FROM vehicles
              INNER JOIN types ON vehicles.typeID = types.typeID
              INNER JOIN classes ON vehicles.classID = classes.classID
              INNER JOIN make ON vehicles.makeID = make.makeID
              ORDER BY :sortType
              WHERE';
    $statement = $db->prepare($query);
    $statement->bindValue(':sortType', $sortType);
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
}

function delete_vehicle($vehicle_id) {
    global $db;
    $query = 'DELETE FROM vehicles
              WHERE vehicleID = :vehicleID';
    $statement = $db->prepare($query);
    $statement->bindValue(':vehicleID', $vehicle_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_vehicle($type_id, $class_id, $year, $make, $model, $price) {
    global $db;
    $query = 'INSERT INTO vehicles
                (typeID, classID, year, make, model, price)
              VALUES
              (:typeID, :classID, :year, :make, :model, :price)';
    $statement = $db->prepare($query);
    $statement->bindValue(':typeID', $type_id);
    $statement->bindValue(':classID', $class_id);
    $statement->bindValue(':year', $year);
    $statement->bindValue(':make', $make);
    $statement->bindValue(':model', $model);
    $statement->bindValue(':price', $price);
    $statement->execute();
    $statement->closeCursor();
}
?>