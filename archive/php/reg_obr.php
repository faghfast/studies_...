<?php
header('Content-Type: text/html; charset=utf-8');

$mysqli = mysqli_connect("localhost", "bxeyhzqt_0540", "123456", "bxeyhzqt_0540");
if ($mysqli == false) {
  print("error");
} else {

  $name = $_POST['name'];
  $lastname = $_POST['lastname'];
  $email = trim(mb_strtolower($_POST['email']));
  $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);


  $result = $mysqli->query("SELECT * FROM `users` WHERE `email` = '$email'");

  if ($result->num_rows != 0) {
    print("exist");
  } else {
    $mysqli->query("INSERT INTO `users`(`name`, `lastname`, `email`, `pass`) VALUES ('$name', '$lastname', '$email', '$pass')");
    print("ok");
  }
}


// echo "<hr>";
// echo "Имя: $name<br>
// Фамилия: $lastname<br>
// E-mail: $email<br>
// Пароль: $pass";
