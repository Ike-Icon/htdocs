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
    <title>Account Management | PHP Motors</title>
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
            <h2>Update Account Information</h2>

            <?php if (isset($_SESSION['update_account_error'])) : ?>
                <p class="error"><?php echo $_SESSION['update_account_error']; ?></p>
            <?php endif; ?>

            <form action="accounts_controller.php" method="post">
                <label for="clientFirstname">First Name:</label>
                <input type="text" id="clientFirstname" name="clientFirstname" value="<?php echo $_SESSION['clientData']['clientFirstname'] ?? ''; ?>" required>

                <label for="clientLastname">Last Name:</label>
                <input type="text" id="clientLastname" name="clientLastname" value="<?php echo $_SESSION['clientData']['clientLastname'] ?? ''; ?>" required>

                <label for="clientEmail">Email:</label>
                <input type="clientEmail" id="clientEmail" name="clientEmail" value="<?php echo $_SESSION['clientData']['clientEmail'] ?? ''; ?>" required>

                <input type="hidden" name="client_id" value="<?php echo $_SESSION['clientData']['clientId']; ?>">
                <input type="hidden" name="action" value="update_account">

                <input type="submit" value="Update Account">
            </form>

            <h2>Change Password</h2>

            <?php if (isset($_SESSION['change_password_error'])) : ?>
                <p class="error"><?php echo $_SESSION['change_password_error']; ?></p>
            <?php endif; ?>

            <form action="accounts_controller.php" method="post">
                <label for="password">New Password:</label>
                <input type="password" name="clientPassword" id="clientPassword" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">

                <span style="color: #4c96d7">Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span>
                <p>*Note your original password will be changed</p>

                <input type="hidden" name="client_id" value="<?php echo $_SESSION['clientData']['clientId']; ?>">
                <input type="hidden" name="action" value="change_password">

                <input type="submit" value="Change Password">
            </form>


        </main>
        <hr />
        <footer>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/phpmotors/common/footer.php" ?>
        </footer>
    </div>
</body>

</html>