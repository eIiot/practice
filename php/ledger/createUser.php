<html>
<head>
<title>Ledger Test</title>
<link rel="stylesheet" type="text/css" href="tailwind.css">
</head>
<body class="h-screen dark:bg-gray-900 bg-white">
<div class="flex flex-col justify-center items-center dark:text-white text-black h-screen">
<?php
// takes name returns secret key and public key
$name = $_POST["name"];

// check if user exists in users.json
$users = json_decode(file_get_contents("users.json"), true);
if (!isset($name)) {
  header("Location: index.php");
} else if (isset($users[$name])) {
  // show error user exists
  echo "User already exists";
} else {
  // user does not exist, create new user
  $secret_key = hash('sha256', rand());
  $public_key = hash('sha256', $secret_key);
  $users[$name] = $public_key;
  file_put_contents("users.json", json_encode($users));
  echo '<span>User created with secret key:</span>
  </span>'. $secret_key .'</span>
  <span>Save this key as it will never be shown again.</span>';
};
?>
</div>
</body>