<?php

// check if the client is logged in and has a clientLevel greater than 1
if (!isset($_SESSION['loggedin']) || $_SESSION['clientData']['clientLevel'] < 2) {

    // header function and exit the script
    header('Location: /phpmotors/');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title><?php if (isset($invInfo['invMake'])) {
                echo "Delete $invInfo[invMake] $invInfo[invModel]";
            } ?> | PHP Motors</title>
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
            <div class="addVehicle-wrapper">
                <h1><?php if (isset($invInfo['invMake'])) {
                        echo "Delete $invInfo[invMake] $invInfo[invModel]";
                    } ?></h1>
                <p>Confirm Vehicle Deletion. The delete is permanent.</p>
                <?php
                if (isset($theMessage)) {
                    echo $theMessage;
                }
                ?><br>
                <form action="/phpmotors/vehicles/index.php" method="post">
                    <!-- <?php
                    echo $classificationList;
                    ?> -->
                    <fieldset>
                    <label for="invMake">Make <br>
                        <input type="text" name="invMake" id="invMake" <?php if (isset($invMake)) {
                                                                            echo "value='$invMake'";
                                                                        } elseif (isset($invInfo['invMake'])) {
                                                                            echo "value='$invInfo[invMake]'";
                                                                        } ?>><br>
                    </label><br>
                    <label for="invModel">Model <br>
                        <input type="text" name="invModel" id="invModel" <?php if (isset($invModel)) {
                                                                                echo "value='$invModel'";
                                                                            } elseif (isset($invInfo['invModel'])) {
                                                                                echo "value='$invInfo[invModel]'";
                                                                            }  ?>><br>
                    </label><br>
                    <label for="invDescription">Description <br>
                        <textarea name="invDescription" id="invDescription"><?php if (isset($invDescription)) {
                                                                                echo $invDescription;
                                                                            } elseif (isset($invInfo['invDescription'])) {
                                                                                echo $invInfo['invDescription'];
                                                                            } ?></textarea>

                    </label><br>

                    <input type="submit" name="submit" id="vehicleBtn" value="Delete Vehicle">
                    <!-- Add the action name - value pair -->
                    <input type="hidden" name="action" value="deleteVehicle">
                    <input type="hidden" name="invId" value="<?php if (isset($invInfo['invId'])) {
                                                                    echo $invInfo['invId'];
                                                                } ?>">

</fieldset>
                </form>

            </div>

        </main>
        <footer>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/phpmotors/common/footer.php" ?>
        </footer>
    </div>
</body>

</html>