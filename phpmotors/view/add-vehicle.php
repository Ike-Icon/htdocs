<?php
// Build the select list in the add vehicle page
$classificationList = '<select name="classificationId" id="classificationList">';
foreach ($classifications as $classification) {
    $classificationList .= "<option value='$classification[classificationId]'";
    if (isset($classificationId)) {
        if ($classification['classificationId'] === $classificationId) {
            $classificationList .= 'selected = "selected" ';
        }
    }
    $classificationList .= "> $classification[classificationName]</option>";
}
$classificationList .= '</select>';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Add Vehicle | PHP Motors</title>
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
                <h1>Add Vehicle</h1>
                <p>*Note all Fields are requied</p>
                <?php
                if (isset($theMessage)) {
                    echo $theMessage;
                }
                ?>
                <form action="/phpmotors/vehicles/index.php" method="post">

                    <?php
                    echo $classificationList;
                    ?><br> <br>

                    <label for="invMake">Make <br>
                        <input type="text" name="invMake" id="invMake" required <?php if (isset($invMake)) {
                                                                                    echo "value='$invMake'";
                                                                                }  ?>><br>
                    </label><br>
                    <label for="invModel">Model <br>
                        <input type="text" name="invModel" id="invModel" required <?php if (isset($invModel)) {
                                                                                        echo "value='$invModel'";
                                                                                    }  ?>><br>
                    </label><br>
                    <label for="invDescription">Description <br>
                        <textarea name="invDescription" id="invDescription" cols="30" rows="2" required <?php if (isset($invDescription)) {
                                                                                                            echo "value='$invDescription'";
                                                                                                        }  ?>></textarea><br>
                    </label><br>
                    <label for="invImage">Image Path <br>
                        <input type="text" name="invImage" id="invImage" value="phpmotors/images/no-image.png" required><br>
                    </label><br>
                    <label for="invThumbnail">Thumbnail Path <br>
                        <input type="text" name="invThumbnail" id="invThumbnail" value="phpmotors/images/no-image.png" required><br>
                    </label><br>
                    <label for="invPrice">Price <br>
                        <input type="text" name="invPrice" id="invPrice" required <?php if (isset($invPricee)) {
                                                                                        echo "value='$invPrice'";
                                                                                    }  ?>><br>
                    </label><br>
                    <label for="invStock">Stock <br>
                        <input type="text" name="invStock" id="invStock" required <?php if (isset($invStock)) {
                                                                                        echo "value='$invStock'";
                                                                                    }  ?>><br>
                    </label><br>
                    <label for="invColor">Color <br>
                        <input type="text" name="invColor" id="invColor" required <?php if (isset($invColor)) {
                                                                                        echo "value='$invColor'";
                                                                                    }  ?>><br>
                    </label><br>
                    <button type="submit" name="submit" id="vehicleBtn" required> Add Vehicle</button>

                    <!-- Add the action name - value pair -->
                    <input type="hidden" name="action" value="addCar">
                </form>

            </div>

        </main>
        <footer>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/phpmotors/common/footer.php" ?>
        </footer>
    </div>
</body>

</html>