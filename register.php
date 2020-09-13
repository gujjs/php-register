<?php
$encodedPassword = password_hash($_POST["pass"], PASSWORD_DEFAULT);

$newUser = array('name' => $_POST["full_name"], 'password' => $encodedPassword);

$json = file_get_contents('users.json');

$data = json_decode($json, true);
$new_id = count( (array)$data ) + 1;
$data[ $_POST["username"] ] = $newUser;

file_put_contents( 'users.json', json_encode($data));

header("location: index.html");
?>
