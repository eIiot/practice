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
  session_start();
  $users = json_decode(file_get_contents('users.json'), true);
  if (isset($_SESSION['username']) && $_SESSION['cookie'] = hash('sha256', $_SESSION['username'] . $users[$_SESSION['username']]['password'])) {
    echo '<h1 class="text-2xl">Welcome, ' . $_SESSION['username'] . '</h1>';
    echo '<a class="text-blue-500" href="./cool-content.php">Cool Content</a>';
  } else {
    echo '<h1 class="text-2xl">Please login</h1>';
  }
  ?>
  <div class="p-4"></div>
  <?php
  if (isset($_SESSION['username']) && $_SESSION['cookie'] = hash('sha256', $_SESSION['username'] . $users[$_SESSION['username']]['password'])) {
    echo '<button class="rounded p-2 bg-blue-600 hover:bg-blue-800 hover:shadow text-white dark:text-black" onclick="window.location.href=`logout.php`">Logout</button>';
  } else {
    echo '<button class="rounded p-2 bg-blue-600 hover:bg-blue-800 hover:shadow text-white dark:text-black" onclick="window.location.href=`login.php`">Login</button>';
    echo '<div class="p-2"></div>';
    echo '<button class="rounded p-2 bg-blue-600 hover:bg-blue-800 hover:shadow text-white dark:text-black" onclick="window.location.href=`signup.php`">Signup</button>';
  }
  ?>
  </div>
</body>
</html>
