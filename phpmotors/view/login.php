<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Login Page | PHP Motors</title>
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
            <div class="login-wrapper">
                <h1>PHP Motors Login</h1>
                <div class="input-login">
                    <?php
                    if (isset($message)) {
                        echo $message;
                    }
                    ?>
                    <form action="/phpmotors/accounts/index.php" method="post">
                        <label for="clientEmail" id="mail">Email </label>
                        <input type="email" name="clientEmail" id="clientEmail" required <?php if(isset($clientEmail)){echo "value='$clientEmail'";}  ?>>

                        <label for="clientPassword" id="password">Password </label><br>
                        
                        <input type="password" name="clientPassword" id="clientPassword" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
                        <span style= "color: #4c96d7">Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span><br><br>

                        <button type="submit" id="submitBtn">Login</button>
                        
                        <!-- Add the action name - value pair -->
                        <input type="hidden" name="action" value="Login">
                    </form>
                    <div class="memberLogin">Not yet a member?<a href="/phpmotors/accounts/index.php?action=register" title="Register with PHP Motors" id="reg">Sign-up</a></div>
                </div>
            </div>
        </main>

        <footer>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/phpmotors/common/footer.php" ?>
        </footer>
    </div>
</body>

</html>