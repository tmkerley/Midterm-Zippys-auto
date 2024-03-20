<main>
    <h2>Vechile Class List</h2>
    <section>
        <div id="table-overflow" class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th colspan="2">Name</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($classes as $class) : ?>
                        <tr>
                            <td><?php echo $class['className']; ?></td>
                            <td>
                                <form action="index.php" method="post">
                                    <input type="hidden" name="action" value="delete_class">
                                    <input type="hidden" name="classID"
                                      value="<?php echo $class['classID']; ?>">
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
            <input type="hidden" name="action" value="add_class">
            <label>Name:</label>
            <input type="text" name="class_name" max="20" required><br>
            <input type="submit" value="Add Class" class="btn btn-primary"><br>
        </form>
        <p><a class="btn btn-primary" href="index.php">Back to Admin Vehicle list</a></p>
        <p><a class="btn btn-primary" href="index.php?action=show_add_form">Add a vehicle to inventory</a></p>
        <p><a class="btn btn-primary" href="index.php?action=list_types">View/Edit Vehicle Types</a></p>
        <p><a class="btn btn-primary"href="index.php?action=list_makes">View/Edit Vehicle Makes</a></p>
    </section>
</main>