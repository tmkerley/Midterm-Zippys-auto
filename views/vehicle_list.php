<main>
    <section>
        <div class="container">
        Filter by Type:
        <select class="form-select" name="typefilter">
            <option value="0">Select Type</option>
            <?php foreach ($types as $type) : ?>
                <option value="<?php echo $type['typeID']; ?>">
                    <?php echo $type['typeName']; ?>
                </option>
            <?php endforeach; ?>
            <input class="btn btn-primary" type="submit" value="typeFilter">
            </select>
        Filter by Class:
            <select class="form-select" name="classfilter">
            <?php foreach ($classes as $class) : ?>
                <option value="<?php echo $class['classID']; ?>">
                    <?php echo $class['className']; ?>
                </option>
            <?php endforeach; ?>
            </select><br>
            <input class="btn btn-primary" type="submit" value="classFilter">
        </div>

        <div class="container">
            <form action="index.php" method="post">
            Sort By:
            <select class="form-select" name="sortType">
                <option value="0">Select Type</option>
                <option value="1">Price(Descending)</option>
                <option value="2">Price(Ascending)</option>
                <option value="3">Year(Descending)</option>
                <option value="4">Year(Ascending)</option>
            </select>
            <input class="btn btn-primary" type="submit">
            </form>
        </div>
    </section>
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
                        <?php foreach ($vehicles as $vehicle) : ?>
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