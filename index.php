<!DOCTYPE html>
<html>
<head>

</head>

<body>
  <header>
    <h1>Home</h1>
  </header>

  <section>
    <a href="register.html">Sign up</a>
  </section>

  <section>
    <h4>Registered users:</h4>

    <div>
      <?php
        $json = file_get_contents('users.json');
        $data = json_decode($json, true);

        foreach ($data as $key => $value) {
          echo $key."<br>";
        }
      ?>
    </div>

  </section>

</body>
</html>