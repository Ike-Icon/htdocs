<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Register Page | PHP Motors</title>
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
            <div class="register-wrapper">

                <h1>Sign in</h1>
                <div class="register-input">
                    <?php
                    if (isset($message)) {
                        echo $message;
                    }
                    ?>
                    <form method="post" action="/phpmotors/accounts/index.php">
                        <label for="clientFirstname">First Name</label>
                        <input type="text" name="clientFirstname" id="clientFirstname" required  <?php if(isset($clientFirstname)){echo "value='$clientFirstname'";}  ?>>

                        <label for="clientLastname">Last Name</label>
                        <input type="text" name="clientLastname" id="clientLastname" required <?php if(isset($clientLastname)){echo "value='$clientLastname'";}  ?>>

                        <label for="clientEmail">Email</label>
                        <input type="email" name="clientEmail" id="clientEmail" required <?php if(isset($clientEmail)){echo "value='$clientEmail'";}  ?>>

                        <label for="clientPassword">Password</label><br>
                        <span style="color: #4c96d7">Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span>
                        <input type="password" name="clientPassword" id="clientPassword" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">

                        <button type="submit" name="submit" id="regBtn">Register</button>

                        <!-- Add the action name - value pair -->
                        <input type="hidden" name="action" value="register">
                    </form>
                </div>

            </div>
        </main>
        <hr />
        <footer>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/phpmotors/common/footer.php" ?>
        </footer>
    </div>
</body>

</html>