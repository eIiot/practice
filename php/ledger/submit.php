<html>
<head>
<title>Ledger Test</title>
<link rel="stylesheet" type="text/css" href="tailwind.css">
</head>
<body class="h-screen dark:bg-gray-900 bg-white">
<div class="flex flex-col justify-center items-center dark:text-white text-black h-screen">
<?php

$from = $_POST["from"];
$to = $_POST["to"];
$amount = $_POST["amount"];
$secret_key = $_POST["key"];

// check users.json for existing user
$users = json_decode(file_get_contents("users.json"), true);

// check if user exists and if hashed secret key matches public key
$public_key = hash('sha256', $secret_key);

if (!isset($users[$from])) {
  echo "User does not exist";
} else if ($users[$from] != $public_key) {
  echo "Secret key is incorrect";
} else {
  // user exists, create new transaction
  $ledger = json_decode(file_get_contents("ledger.json"), true);
  $ledger[] = [$from, $to, $amount, $public_key];
  file_put_contents("ledger.json", json_encode($ledger));
  // redirect to index
  header("Location: index.php");
}
?>
</div>
</body>