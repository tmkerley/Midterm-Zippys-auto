<?php

function get_vehicles_by_type($type_id) {
    global $db;
    $query = '
        SELECT * FROM vehicles
        INNER JOIN types ON vehicles.typeID = types.typeID
        INNER JOIN classes ON vehicles.classID = classes.classID
        INNER JOIN make ON vehicles.makeID = make.makeID
        WHERE vehicles.typeID = :typeID
        ORDER BY vehicleID';
    $statement = $db->prepare($query);
    $statement->bindValue(':typeID', $type_id);
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicle;
}

function get_vehicles() {
    global $db;
    $query = '
    SELECT * FROM vehicles
    INNER JOIN types ON vehicles.typeID = types.typeID
    INNER JOIN classes ON vehicles.classID = classes.classID
    INNER JOIN make ON vehicles.makeID = make.makeID
    ORDER BY price DESC';
    $statement = $db->prepare($query);
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
}

function get_ascending_price_vehicles() {
    global $db;
    $query = '
    SELECT * FROM vehicles
    INNER JOIN types ON vehicles.typeID = types.typeID
    INNER JOIN classes ON vehicles.classID = classes.classID
    INNER JOIN make ON vehicles.makeID = make.makeID
    ORDER BY price ASC';
    $statement = $db->prepare($query);
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
}

function get_descending_year_vehicles() {
    global $db;
    $query = '
    SELECT * FROM vehicles
    INNER JOIN types ON vehicles.typeID = types.typeID
    INNER JOIN classes ON vehicles.classID = classes.classID
    INNER JOIN make ON vehicles.makeID = make.makeID
    ORDER BY year DESC';
    $statement = $db->prepare($query);
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
}

function get_ascending_year_vehicles() {
    global $db;
    $query = '
    SELECT * FROM vehicles
    INNER JOIN types ON vehicles.typeID = types.typeID
    INNER JOIN classes ON vehicles.classID = classes.classID
    INNER JOIN make ON vehicles.makeID = make.makeID
    ORDER BY year ASC';
    $statement = $db->prepare($query);
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
}

function filter_by_make($makeID) {
    global $db;
    $query = '
        SELECT * FROM vehicles
        INNER JOIN types ON vehicles.typeID = types.typeID
        INNER JOIN classes ON vehicles.classID = classes.classID
        INNER JOIN make ON vehicles.makeID = make.makeID
        ORDER BY price
        WHERE vehicles.makeID = $makeID';
    $statement = $db->prepare($query);
    $statement->bindValue(':makeID', $makeID);
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
}

function delete_vehicle($vehicle_id) {
    global $db;
    $query = '
        DELETE FROM vehicles
        WHERE vehicleID = :vehicleID';
    $statement = $db->prepare($query);
    $statement->bindValue(':vehicleID', $vehicle_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_vehicle($type_id, $class_id, $year, $make, $model, $price) {
    global $db;
    $query = '
        INSERT INTO vehicles
        typeID, classID, year, make, model, price
        VALUES
        :typeID, :classID, :year, :make, :model, :price';
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