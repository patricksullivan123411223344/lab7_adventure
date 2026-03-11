<?php 
// Request / User data
$usernameGame = $_COOKIE['user_name'] ?? 'Traveler';
$safeName = htmlspecialchars($usernameGame, ENT_QUOTES | ENT_HTML5);
$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
$choice = isset($_GET['choice']) ? (int) $_GET['choice'] : 0;
$path = $_GET['path'] ?? '';
          
// Story data
$beginning = [
    'title' => 'Just Another Day',
    'description' => "$safeName wakes up in a freezing, empty town with only static on the radio.",
    'choices' => [
        'Head toward the radio signal...',
        'Explore the abandoned store for supplies...'
    ]
];
$mid_radio_signal = [
    'title' => "You've made your choice...",
    'description' => "$safeName follows the crackling signal to an old communications tower at the edge of town.",
    'choices' => [
        'Go deeper and attempt to explore...',
        'Turn the other direction and head back to the town...'
    ]
];
$mid_store_exploration = [
    'title' => "You've made your choice...",
    'description' => "$safeName steps into the abandoned store and hears movement in the back room.",
    'choices' => [
        'Run away and leave the town',
        'Stay and attempt to make friends'
    ]
];
$end_radio_signal_explore = [
    'title' => 'You chose right!',
    'description' => "$safeName discovers a hidden bunker beneath the tower and finds a safe place to survive.",
    'choices' => ['Play again']
];
$end_radio_signal_leave = [
    'title' => 'Oops!',
    'description' => "$safeName turns back too soon and spends the night alone, wondering what might have been inside.",
    'choices' => ['Play again']
];
$end_store_run = [
    'title' => 'You chose right!',
    'description' => "$safeName sprints out of town before danger can catch up. You survive, but barely.",
    'choices' => ['Play again']
];
$end_store_friends = [
    'title' => 'You chose right!',
    'description' => "$safeName meets a small group of survivors who offer warmth, food, and a place to stay.",
    'choices' => ['Play again']
];
$error_state = [
    'title' => 'Invalid Choice',
    'description' => 'Something went wrong with the story path.',
    'choices' => ['Restart']
];

// Handle current page state
$title = '';
$description = '';
$choices = [];
$nextPage = 1;
$nextPath = '';

// Helper function for assigning scene data
function loadScene(array $scene, int $pageNumber, string $pathValue = ''): array
{
    return [
        'title' => $scene['title'],
        'description' => $scene['description'],
        'choices' => $scene['choices'],
        'nextPage' => $pageNumber,
        'nextPath' => $pathValue
    ];
}

// Page 1
if ($page === 1) {
    $state = loadScene($beginning, 2);


// Page 2
} elseif ($page === 2) {
    if ($choice === 1) {
        $state = loadScene($mid_radio_signal, 3, 'radio');
    } elseif ($choice === 2) {
        $state = loadScene($mid_store_exploration, 3, 'store');
    } else {
        $state = loadScene($error_state, 1);
    }

// Page 3
} elseif ($page === 3) {
    if ($path === 'radio' && $choice === 1) {
        $state = loadScene($end_radio_signal_explore, 1);
    } elseif ($path === 'radio' && $choice === 2) {
        $state = loadScene($end_radio_signal_leave, 1);
    } elseif ($path === 'store' && $choice === 1) {
        $state = loadScene($end_store_run, 1);
    } elseif ($path === 'store' && $choice === 2) {
        $state = loadScene($end_store_friends, 1);
    } else {
        $state = loadScene($error_state, 1);
    }

// Anything else / invalid input
} else {
    $state = loadScene($error_state, 1);
}

// Final values for rendering
$title = $state['title'];
$description = $state['description'];
$choices = $state['choices'];
$nextPage = $state['nextPage'];
$nextPath = $state['nextPath'];
?>

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

      <!--Display the title of the current story page-->
      <h1><?php echo $title; ?></h1>

      <!--Display the description of the current story page-->
      <p><?php echo $description; ?></p>
       
      <!--Loop through the available story choices for the current story page-->
      <?php if ($title === $error_state['title']): ?>
        <a href="index.php">
          <button class="choice-btn">Restart</button>
        </a>
      <?php else: ?>
        <?php foreach ($choices as $index => $choiceText): ?>
          <?php
            $url = "adventure.php?page={$nextPage}&choice=" . ($index + 1);

            if ($nextPath !== '') {
              $url .= "&path=" . urlencode($nextPath);
            }

            if ($nextPage === 1 && $page === 3) {
              $url = "index.php";
            }
          ?>
          <a href="<?php echo htmlspecialchars($url); ?>">
            <button class="choice-btn"><?php echo htmlspecialchars($choiceText); ?></button>
          </a>
        <?php endforeach; ?>
      <?php endif; ?>
    <!-- JavaScript file for animations -->
  </body>
</html>