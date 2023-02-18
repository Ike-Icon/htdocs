<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Add Classification| PHP Motors</title>
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
            <div class="addClass-wrapper">
                <h1>Add Car classification</h1>
                <?php
                if (isset($theMessage)) {
                    echo $theMessage;
                }
                ?>
                <?php
                if (isset($theClassMessage)) {
                    echo $theClassMessage;
                }
                ?>
                <form action="/phpmotors/vehicles/index.php" method="post">
                    
                    <label for="classificationName">Classification Name</label> <br><br>
                    <span style="color: green">Classification Name must be less than 30 letters!!</span><br>
                        <input type="text" name="classificationName" id="classificationName" required placeholder="enter classification name" maxlength="30" <?php if(isset($classificationName)){echo "value='$classificationName'";}  ?>> <br>

        
                    <button type="submit" name="submit" id="classBtn"> Add classification</button>

                    <!-- Add the action name - value pair -->
                    <input type="hidden" name="action" value="addClass">
                </form>

            </div>

        </main>
        <footer>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/phpmotors/common/footer.php" ?>
        </footer>
    </div>
</body>

</html>