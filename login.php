<?php
if ($_POST){
    $json = file_get_contents('users.json');
    $data = json_decode($json, true);
    if (password_verify( $_POST['pass'], $data[$_POST['username']]['password'])) {
        session_start();
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['full_name'] = $data[$_POST['username']]['name'];
  		header("location: user.php");
    }else{
    	$errorClass = "invalid";
        $passwordIncorrect = "<p class='invalid'>Username or password is incorrect.</p>";
    }
}


?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="main.css">
</head>
<body>

<h2>Log in</h2>

<section class="">
  <form action="login.php" method="post">

    <label for="username">Username:</label>
    <input type="text" id="username" name="username" value="<?php echo $_POST['username']; ?>"><br>

    <label for="pass">Password:</label>
    <input type="password" id="pass" name="pass"><br>
    <?php echo $passwordIncorrect; ?>
    <input type="submit" id="login" value="Log in"><br>

  </form>
</section>

</body>
</html>