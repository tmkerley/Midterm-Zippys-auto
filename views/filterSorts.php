<div class="container">
    <div class="container-sm">
    <div class="input-group mb-3">
        <form action="index.php" method="post">
            <select class="form-select" name="typeFilter" id="filterTypesSelector">
            <option value="0">Select Type</option>
            <?php foreach ($types as $type) : ?>
                <option value="<?php echo $type['typeID']; ?>">
                    <?php echo $type['typeName']; ?>
                </option>
            <?php endforeach; ?>
            </select>
            <button class="btn btn-outline-primary" type="button">Filter</button>
        </form>
    </div>
    </div>
    <div class="container-sm">
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
            <button class="btn btn-primary" type="submit">Filter</button>
        </form>
    </div>
    </div>
    <div class="container-sm">
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
            <button class="btn btn-primary" type="submit">Sort</button>
        </form>
    </div>
    </div>
    <div class="container-sm">
    <form action="index.php" method="post">
        <button class="btn btn-danger" name="clearFlag" value="TRUE" type="submit">Clear</button>
    </form>
    </div>
</div>