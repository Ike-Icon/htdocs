<div>
  <img src="/phpmotors/images/site/logo.png" alt="PHP Motors logo" id="logo">

  <?php
  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {

    // Display the session-based welcome message
    echo "<p><a href='/phpmotors/accounts/?action=admin' style=color:blue title='Back to the Admin Page'>Welcome, " . $_SESSION['clientData']['clientFirstname'] . "!</a> | <a href='/phpmotors/accounts/?action=Logout'>Logout</a></p>";
  } else {
    // If the user is not logged in, display a "My Account" link
    echo '<a href="/phpmotors/accounts/index.php?action=login" title="Login or Register with PHP Motors" id="acc">My Account</a>';
  }
  ?>
  <!-- <a href="/phpmotors/accounts/index.php?action=login" title="Login or Register with PHP Motors" id="acc">My Account</a> -->

</div>