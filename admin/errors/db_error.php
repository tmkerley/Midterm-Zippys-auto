<?php include '../view/admin_header.php'; ?>

    <main>
        <h1>Database Error</h1>
        <p>There was an error connecting to the database</p>
        <p>Error Message: <?php echo $error_message; ?></p>
        <p>&nbsp;</p>
    </main>

<?php include("../view/footer.php");?>