<?php include_once 'views\admin_header.php'; ?>

    <main>
        <h2>Add Vehicle</h2>
        <form action="index.php" method="post" id="add_vehicle">
        <input type="hidden" name="action" value="add_vehicle">

            <label>Type:</label>
            <select class="form-select" name="typeID">
                <option value="0">Select Type</option>
                <?php foreach ($types as $type) : ?>
                    <option value="<?php echo $type['typeID']; ?>">
                        <?php echo $type['typeName']; ?>
                    </option>
                <?php endforeach; ?>
            </select><br>
            <label>Class:</label>
            <select class="form-select" name="classID">
                <option value="0">Select Class</option>
                <?php foreach ($classes as $class) : ?>
                    <option value="<?php echo $class['classID']; ?>">
                        <?php echo $class['className']; ?>
                    </option>
                <?php endforeach; ?>
            </select><br>
            <label>Make:</label>
            <select class="form-select" name="classID">
                <option value="0">Select Make</option>
                <?php foreach ($makes as $make) : ?>
                    <option value="<?php echo $make['makeID']; ?>">
                        <?php echo $make['makeName']; ?>
                    </option>
                <?php endforeach; ?>
            </select><br>
          
            <label>Year:</label>
            <input type="text" name="year" max="20" required><br>

            <label>Model:</label>
            <input type="text" name="model" max="50" required><br>

            <label>Price:</label>
            <input type="text" name="price" max="50" required><br>

            <label>&nbsp;</label>
            <input type="submit" value="Add Vehicle" class="btn btn-primary"><br>
        </form>
        <div class="d-grid gap-2 col-6">
            <p><a class="btn btn-primary" href="index.php">Back to Admin Vehicle List</a></p>
            <p><a class="btn btn-primary"href="index.php?action=list_types">View/Edit Vehicle Types</a></p>
            <p><a class="btn btn-primary"href="index.php?action=list_classes">View/Edit Vehicle Classes</a></p>
        </div>
    </main>
    <?php include 'views\footer.php'; ?>