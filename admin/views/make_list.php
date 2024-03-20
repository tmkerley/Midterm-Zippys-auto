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
                    <?php foreach ($makes as $make) : ?>
                        <tr>
                            <td><?php echo $make['makeName']; ?></td>
                            <td>
                                <form action="index.php" method="post">
                                    <input type="hidden" name="action" value="delete_make">
                                    <input type="hidden" name="makeID"
                                      value="<?php echo $make['makeID']; ?>">
                                    <input type="submit" value="Remove" class="btn btn-danger">
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <h2>Add Make</h2>
        <form action="." method="post" id="add_make_form">
            <input type="hidden" name="action" value="add_make">
            <label>Name:</label>
            <input type="text" name="makeName" max="20" required><br>
            <input type="submit" value="Add Make" class="btn btn-primary"><br>
        </form>
        <p><a class="btn btn-primary" href="index.php">Back to Admin Vehicle list</a></p>
        <p><a class="btn btn-primary" href="index.php?action=show_add_form">Add a vehicle to inventory</a></p>
        <p><a class="btn btn-primary" href="index.php?action=list_types">View/Edit Vehicle Types</a></p>
    </section>
</main>