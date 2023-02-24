<?php

if (!isset($_SESSION['loggedin']) || $_SESSION['clientData']['clientLevel'] < 2) {
    header('Location: /phpmotors/');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Vehicle Management | PHP Motors</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="/phpmotors/css/style.css?v=<?php echo time(); ?>" type="text/css" rel="stylesheet" media="screen" />
</head>

<body>
    <div id="wrapper">
        <header>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/phpmotors/common/header.php" ?>
        </header>
        <nav>
            <?php //include $_SERVER['DOCUMENT_ROOT'] . "/phpmotors/common/navigation.php"
            echo $navList; ?>
        </nav>
        <main>
            <h1>vehicle Management</h1>
            <?php
            if (isset($theMessage)) {
                echo $theMessage;
            }
            ?>
            <ul>
                <li><a href="/phpmotors/vehicles/index.php?action=add-classification" title="Add car classification to the database" id="add-class">Add classification</a></li>
                <li><a href="/phpmotors/vehicles/index.php?action=add-vehicle" title="Add Vehicle to the database" id="add-car">Add Vehicle</a></li>
            </ul>
        </main>
        <footer>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/phpmotors/common/footer.php" ?>
        </footer>
    </div>
</body>

</html>