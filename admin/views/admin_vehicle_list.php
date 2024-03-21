<main>
    <?php include '../filterSorts.php'; ?>
    <section class="container">
        <?php if($vehicles) { ?>
            <div id="table-overflow">
                <table class="table table-striped">
                    <thread>
                        <tr>
                            <th>Year</th>
                            <th>Make</th>
                            <th>Model</th>
                            <th>Type</th>
                            <th>Class</th>
                            <th>Price</th>
                            <th></th>
                        </tr>
                    </thread>
                    <tbody>
                        <?php foreach ($vehicles as $vehicle) : 
                            if($filterFlag) {
                                if($vehicle['typeID'] != $typeFilter && 
                                    $vehicle['classID'] != $classFilter) { 
                                        continue; }}?>
                            <tr>
                            <td><?php echo $vehicle['year']; ?></td>
                            <td><?php echo $vehicle['makeName']; ?></td>
                            <td><?php echo $vehicle['model']; ?></td>
                            <td><?php echo $vehicle['typeName']; ?></td>
                            <td><?php echo $vehicle['className']; ?></td>
                            <td><?php echo $vehicle['price']; ?></td>
                            <td><form action="index.php" method="post">
                                <input type="hidden" name="vehicleID"
                                    value="<?php echo $vehicle['vehicleID']; ?>">
                                <input type="hidden" name="action" value="delete_vehicle">
                                <input type="submit" value="Remove" class="btn btn-danger">
                            </form></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <p><a class="btn btn-primary" href="index.php?action=show_add_form">Add a vehicle</a></p>
        <?php } else {?>
            <p>No Vehicles exist yet. 
            <a class="btn btn-primary" href="index.php?action=show_add_form">Click here</a> to add a vehicle.</p>
        <?php } ?>
        <br>
        <p><a class="btn btn-primary" href="index.php?action=list_types">View/Edit Vehicle Types</a></p>
        <p><a class="btn btn-primary" href="index.php?action=list_classes">View/Edit Vehicle Classes</a></p>
        <p><a class="btn btn-primary" href="index.php?action=list_makes">View/Edit Vehicle Makes</a></p>
    </section>
</main>