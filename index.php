<?php
$json = file_get_contents('users.json');
$data = json_decode($json, true);

?>

<!DOCTYPE html>
<html>
<head>

</head>

<body>
  <header>
    <h1>Home</h1>
  </header>

  <section>
    <a href="register.php">Sign up</a>
  </section>

  <section>
    <h4>Registered users:</h4>

    <div>
      <?php
        foreach ($data as $key => $value) {
          echo $key."<br>";
        }
      ?>
    </div>

  </section>

</body>
</html>