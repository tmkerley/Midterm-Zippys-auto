<main>
    <?php include 'filterSorts.php'; ?>
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
                                </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php } else {?>
            <p>No Vehicles exist yet.</p>
        <?php } ?>
    </section>
</main>