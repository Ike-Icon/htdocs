<?php
// Build the select list in the add vehicle page
$classificationList = '<select name="classificationId" id="classificationList">';
foreach ($classifications as $classification) {
    $classificationList .= "<option value='$classification[classificationId]'";
    if (isset($classificationId)) {
        if ($classification['classificationId'] === (int)$classificationId) {
            $classificationList .= 'selected = "selected" ';
        }
    } elseif (isset($invInfo['classificationId'])) {
        if ($classification['classificationId'] === $invInfo['classificationId']) {
            $classificationList .= 'selected = "selected" ';
        }
        $classificationList .= "> $classification[classificationName]</option>";
    }
}
$classificationList .= '</select>';


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
    <title><?php if (isset($invInfo['invMake']) && isset($invInfo['invModel'])) {
                echo "Modify $invInfo[invMake] $invInfo[invModel]";
            } elseif (isset($invMake) && isset($invModel)) {
                echo "Modify $invMake $invModel";
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
                <h1><?php if (isset($invInfo['invMake']) && isset($invInfo['invModel'])) {
                        echo "Modify $invInfo[invMake] $invInfo[invModel]";
                    } elseif (isset($invMake) && isset($invModel)) {
                        echo "Modify $invMake $invModel";
                    } ?></h1>
                <p>*Note all Fields are requied</p>
                <?php
                if (isset($theMessage)) {
                    echo $theMessage;
                }
                ?><br>
                <form action="/phpmotors/vehicles/index.php" method="post">
                    <?php
                    echo $classificationList;
                    ?>

                    <label for="invMake">Make <br>
                        <input type="text" name="invMake" id="invMake" required <?php if (isset($invMake)) {
                                                                                    echo "value='$invMake'";
                                                                                } elseif (isset($invInfo['invMake'])) {
                                                                                    echo "value='$invInfo[invMake]'";
                                                                                } ?>><br>
                    </label><br>
                    <label for="invModel">Model <br>
                        <input type="text" name="invModel" id="invModel" required <?php if (isset($invModel)) {
                                                                                        echo "value='$invModel'";
                                                                                    } elseif (isset($invInfo['invModel'])) {
                                                                                        echo "value='$invInfo[invModel]'";
                                                                                    }  ?>><br>
                    </label><br>
                    <label for="invDescription">Description <br>
                        <textarea name="invDescription" id="invDescription" required><?php if (isset($invDescription)) {
                                                                                            echo $invDescription;
                                                                                        } elseif (isset($invInfo['invDescription'])) {
                                                                                            echo $invInfo['invDescription'];
                                                                                        } ?></textarea>

                    </label><br>
                    <label for="invImage">Image Path <br>
                        <input type="text" name="invImage" id="invImage" value="phpmotors/images/no-image.png" required><br>
                    </label><br>
                    <label for="invThumbnail">Thumbnail Path <br>
                        <input type="text" name="invThumbnail" id="invThumbnail" value="phpmotors/images/no-image.png" required><br>
                    </label><br>
                    <label for="invPrice">Price <br>
                        <input type="text" name="invPrice" id="invPrice" required <?php if (isset($invPrice)) {
                                                                                        echo "value='$invPrice'";
                                                                                    } elseif (isset($invInfo['invPrice'])) {
                                                                                        echo "value='$invInfo[invPrice]'";
                                                                                    }  ?>><br>
                    </label><br>
                    <label for="invStock">Stock <br>
                        <input type="text" name="invStock" id="invStock" required <?php if (isset($invStock)) {
                                                                                        echo "value='$invStock'";
                                                                                    } elseif (isset($invInfo['invStock'])) {
                                                                                        echo "value='$invInfo[invStock]'";
                                                                                    } ?>><br>
                    </label><br>
                    <label for="invColor">Color <br>
                        <input type="text" name="invColor" id="invColor" required <?php if (isset($invColor)) {
                                                                                        echo "value='$invColor'";
                                                                                    } elseif (isset($invInfo['invColor'])) {
                                                                                        echo "value='$invInfo[invColor]'";
                                                                                    } ?>><br>
                    </label><br>
                    <input type="submit" name="submit" id="vehicleBtn" value="Update Vehicle">
                    <!-- Add the action name - value pair -->
                    <input type="hidden" name="action" value="updateVehicle">
                    <input type="hidden" name="invId" value="<?php if (isset($invInfo['invId'])) {
                                                                    echo $invInfo['invId'];
                                                                } elseif (isset($invId)) {
                                                                    echo $invId;
                                                                } ?>">
                </form>

            </div>

        </main>
        <footer>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/phpmotors/common/footer.php" ?>
        </footer>
    </div>
</body>

</html>