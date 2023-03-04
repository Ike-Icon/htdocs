<?php
// Check if the user is not logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Redirect to the main PHP Motors controller
    header('Location: /phpmotors/index.php');
    exit(); // Stop executing the current script
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Client Admin | PHP Motors</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="/phpmotors/css/style.css?v=<?php echo time(); ?>" type="text/css" rel="stylesheet" media="screen" />
</head>

<body>
    <div id="wrapper">
        <header>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/phpmotors/common/header.php" ?>
        </header>
        <nav>
            <?php
            echo $navList;
            ?>
        </nav>
        <main>
            <div id="admin-Wrapper">
                <?php
                  echo '<h1>Welcome, ' . $_SESSION['clientData']['clientFirstname'] . '</h1>';
                  echo '<p>You are currently logged in.</p>';
            

                    // Display the user's data in an unordered list
                    echo '<ul>';
                    echo '<li><strong>First Name:</strong> ' . $_SESSION['clientData']['clientFirstname'] . '</li>';
                    echo '<li><strong>Last Name:</strong> ' . $_SESSION['clientData']['clientLastname'] . '</li>';
                    echo '<li><strong>Email Address:</strong> ' . $_SESSION['clientData']['clientEmail'] . '</li>';
                    echo '<li><strong>Client Level:</strong> ' . $_SESSION['clientData']['clientLevel'] . '</li>'; 
                    echo '</ul><br>';

                    echo'<a href="accounts_controller.php?action=update">Update Account Information</a>';

                    // Display the session message, if it exists
                    if (isset($_SESSION['message'])) {
                        echo '<p>' . $_SESSION['message'] . '</p>';
                        unset($_SESSION['message']);
                    }
                    

                if ($_SESSION['clientData']['clientLevel'] > 1) {
                    // Display the inventory management link for administrative clients
                    echo '<h2>Vehicle Management !</h2>
                    <p>Do you want to navigate to the Vehicle Management page?</p>
                    <p>Click <a href="/phpmotors/vehicles/" title="The Vehicle Management page">Here</a>!</p>';
                }
                ?>
            </div>
        </main>
        <footer>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/phpmotors/common/footer.php" ?>
        </footer>
    </div>
</body>

</html>