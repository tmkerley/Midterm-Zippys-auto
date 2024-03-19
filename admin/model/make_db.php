<?php
    function get_make() {
        global $db;
        $query = 'SELECT * FROM make
                  ORDER BY makeID';
        $statement = $db->prepare($query);
        $statement->execute();
        $make = $statement->fetchAll();
        $statement->closeCursor();
        return $make;
    }

    function get_makeName($makeID) {
        global $db;
        $query = 'SELECT * FROM make
                  WHERE makeID = :makeID';
        $statement = $db->prepare($query);
        $statement->bindValue(':makeID', $makeID);
        $statement->execute();
        $make = $statement->fetch();
        $statement->closeCursor();
        return $make['makeName'];
    }

    function delete_make($makeID) {
        global $db;
        $query = 'DELETE FROM make
                  WHERE makeID = :makeID';
        $statement = $db->prepare($query);
        $statement->bindValue(':makeID', $makeID);
        $statement->execute();
        $statement->closeCursor();
    }

    function add_make($makeName) {
        global $db;
        $query = 'INSERT INTO make.makeName
                  VALUES :makeName';
        $statement = $db->prepare($query);
        $statement->bindValue(':makeName', $makeName);
        $statement->execute();
        $statement->closeCursor();
    }

?>