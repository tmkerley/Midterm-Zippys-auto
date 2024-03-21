<main>
    <div class="container">
        <div class="input-group mb-3">
            <form action="index.php" method="post">
                <select class="form-select" name="typeFilter" id="filterTypesSelector">
                <option value="0">Select Type</option>
                <?php foreach ($types as $type) : ?>
                    <option value="<?php echo $type['typeID']; ?>">
                        <?php echo $type['typeName']; ?>
                    </option>
                <?php endforeach; ?>
                <input class="btn btn-outline-primary" type="submit" 
                    value="Filter type" for="filterTypesSelector">
                </select>
            </form>
        </div>
        <div class="input-group mb-3">
            <form action="index.php" method="post">
                <label class="iput-group-text" for="filterClassSelector">Classes:</label>
                <select class="form-select" name="classFilter" id="filterClassSelector">
                <?php foreach ($classes as $class) : ?>
                    <option value="<?php echo $class['classID']; ?>">
                        <?php echo $class['className']; ?>
                    </option>
                <?php endforeach; ?>
                </select>
                <input class="btn btn-primary" type="submit" value="classFilter">
            </form>
        </div>
        <div class="input-group mb-3">
            <form action="index.php" method="post">
                <label class="iput-group-text" for="sortSelector">Sort:</label>
                Sort By:
                <select class="form-select" name="sortType" id="sortSelector">
                    <option value="0">Select Type</option>
                    <option value="1">Price(Descending)</option>
                    <option value="2">Price(Ascending)</option>
                    <option value="3">Year(Descending)</option>
                    <option value="4">Year(Ascending)</option>
                </select>
                <input class="btn btn-primary" type="submit">
            </form>
        </div>
        <form action="index.php" method="post">
            <button class="btn-danger" name="clearFlag" value="TRUE" type="submit">
        </form>
    </div>
    <section>
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