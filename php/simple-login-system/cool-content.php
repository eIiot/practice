<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./tailwind.css">
</head>
<body class="h-screen dark:bg-gray-900 dark:text-white">
  <div class="flex flex-col justify-center items-center h-screen">
  <?php
  // check if the user is logged in
  session_start();
  $users = json_decode(file_get_contents('users.json'), true);
  if (isset($_SESSION['username']) && $_SESSION['cookie'] = hash('sha256', $_SESSION['username'] . $users[$_SESSION['username']]['password'])) {
    echo '<img class="rounded-lg" src="https://c.tenor.com/VFFJ8Ei3C2IAAAAM/rickroll-rick.gif"' . 'alt="Rickroll"' . 'width="400" height="400">';
  } else {
    header('Location: index.php');
  }
  ?>
  </div>
</body>
</html>
