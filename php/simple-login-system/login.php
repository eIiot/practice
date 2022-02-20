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
  <form class="flex flex-col justify-center items-center h-screen" action="" method="post">
    <input class="rounded p-2 text-black border-2 border-blue-400 dark:border-none" type="text" name="username" placeholder="Username">
    <div class="p-2"></div>
    <input class="rounded p-2 text-black border-2 border-blue-400 dark:border-none" type="password" name="password" placeholder="Password">
    <div class="p-2"></div>
    <button class="rounded p-2 bg-blue-600 hover:bg-blue-800 hover:shadow text-white dark:text-black" type="submit">Login</button>
    <div class="text-red-600">
    <?php 

      // if the "username" and "password" POST variables are set, then create a new session in users.json
      if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $users = json_decode(file_get_contents('users.json'), true);
        if (isset($users[$username]) && $users[$username]['password'] == hash('sha256', $password)) {
          session_start();
          $_SESSION['username'] = $username;
          $_SESSION['cookie'] = hash('sha256', $username . $password);
          header('Location: index.php');
        } else {
          echo 'Invalid username or password';
        }
      }
      ?>
    </div>
  </form>
</body>
</html>