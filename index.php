<?php 
$username = $_COOKIE['user_name'] ?? '';
$safeUsername = htmlspecialchars($username, ENT_QUOTES | ENT_HTML5);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['user_name'] ?? '';
  setcookie('user_name', $name, time() + 86400, '/');

  $firstPage = '1';
  header('Location: adventure.php?page=' . urlencode($firstPage) . '$user_name=' . urlencode($name));

  exit();
}
?>

<!-- DO NOT MAKE ANY CHANGES TO THE FOLLOWING HTML CODE! -->
<!DOCTYPE html>
<html>

  <head>
    <meta charset="UTF-8">
    <title>Begin Your Adventure!</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  </head>

  <body>
    <div class="container" id="intro">
      <!-- Introduction text for the user -->
      <h1>Welcome to the Quest!</h1>
      <p>You’re about to embark on a wild journey. But first… what should we call you?</p>

      <!-- Form to collect the user's name -->
      <form id="startForm" method="POST" action="index.php">
        <!-- Input field for the user's name -->
        <input type="text" name="user_name" id="user_name" placeholder="Enter your name" required value="<?= $safeUsername ?>" />
        <br>
        <!-- Submit button to start the adventure -->
        <button type="submit">Start Adventure</button>
      </form>
    </div>

    <!-- JavaScript file for animations -->
  </body>
</html>
<!-- DO NOT MAKE ANY CHANGES TO THE FOLLOWING HTML CODE! -->