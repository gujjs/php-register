<?php
if($_POST){
	$username = $_POST["username"];

	$encodedPassword = password_hash($_POST["pass"], PASSWORD_DEFAULT);
	$newUser = array('name' => $_POST["full_name"], 'password' => $encodedPassword);

	$json = file_get_contents('users.json');
	$data = json_decode($json, true);
	$errorClass = 'none';

	foreach($data as $key => $value){
    if ($key == $username){
			$usernameExists = "User with this name already exists.";
			$errorClass = '"invalid"';
		}
  }

	if ($errorClass == 'none'){
		$data[$username] = $newUser;
		file_put_contents( 'users.json', json_encode($data));
		echo "succesufulo registertion";
		header("location: index.php");
		#kill();
	}
}
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="main.css">
</head>

<body>
  <header>
    <h1>Register</h1>
  </header>

  <form action="register.php" method="post">

    <label for="full_name">Full name:</label>
    <input type="text" id="full_name" name="full_name"><br>

		<div class=<?php echo $errorClass; ?>>
	    <label for="username">Username:</label>
	    <input type="text" id="username" name="username">
	    <label for="username"><?php echo $usernameExists;?></label><br>
		</div>

    <label for="pass">Password:</label>
    <input type="password" id="pass" name="pass"><br>

    <label for="re_pass">Repeat password:</label>
    <input type="password" id="re_pass" name="re_pass"><br>

    <label for="submit"></label>
    <input type="submit" id="submit" value="Submit"><br>
  </form>

</body>
</html>