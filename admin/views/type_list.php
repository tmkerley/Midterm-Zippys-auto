<?php include 'views\admin_header.php'; ?>
<main>
    <h2>Vehicle Type List</h2>
    <section>
        <div id="table-overflow" class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th colspan="2">Name</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($types as $type) : ?>
                    <tr>
                        <td><?php echo $type['typeName']; ?></td>
                        <td>
                            <form action="index.php" method="post">
                                <input type="hidden" name="action" value="delete_type">
                                <input type="hidden" name="typeID"
                                    value="<?php echo $type['typeID']; ?>">
                                <input type="submit" value="Remove" class="btn btn-danger">
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <h2>Add Type</h2>
        <form action="." method="post" id="add_vehicle_form">
            <input type="hidden" name="action" value="add_type">
            <label>Name:</label>
            <input type="text" name="type_name" max="20" required><br>
            <input type="submit" value="Add Type" class="btn btn-primary"><br>
        </form>
        <p><a class="btn btn-primary" href="index.php">Back to Admin Vehicle List</a></p>
        <p><a class="btn btn-primary" href="index.php?action=show_add_form">Add a Vehicle to Inventory</a></p>
        <p><a class="btn btn-primary" href="index.php?action=list_classes">View/Edit Vehicle Classes</a></p>
        <p><a class="btn btn-primary" href="index.php?action=list_types">View/Edit Vehicle Types</a></p>
    </section>
</main>
<?php include 'views\footer.php'; ?>