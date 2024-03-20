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

function get_vehicles($vehicle_id) {
    global $db;
    $query = 'USE w2rm76kscxad3b8d
              SELECT * FROM vehicles
              INNER JOIN types ON vehicles.typeID = types.typeID
              INNER JOIN classes ON vehicles.classID = classes.classID
              INNER JOIN make ON vehicles.makeID = make.makeID
              ORDER BY :vehicleID';
    $statement = $db->prepare($query);
    $statement->bindValue(':vehicleID', $vehicle_id);
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

function add_vehicle($type_id, $class_id, $make_id, $year, $model, $price) {
    global $db;
    $query = 'INSERT INTO vehicles
                (typeID, classID, year, makeID, model, price)
              VALUES
              (:typeID, :classID, :year, :makeID, :model, :price)';
    $statement = $db->prepare($query);
    $statement->bindValue(':typeID', $type_id);
    $statement->bindValue(':classID', $class_id);
    $statement->bindValue(':makeID', $make_id);
    $statement->bindValue(':year', $year);
    $statement->bindValue(':model', $model);
    $statement->bindValue(':price', $price);
    $statement->execute();
    $statement->closeCursor();
}
?>