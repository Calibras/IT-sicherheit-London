<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Registrierung</title>
</head>
<body>
  <h1>Registrierung </h1>
  <form action="/register.php" method="post">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>
    <br><br>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <br><br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    <br><br>
    <input type="submit" value="Submit" name="submit">
  </form>
</body>

<br><br><br><br>
    <p text-align: center> <a href= "../index.php" target="_blank">Startseite</a> </p>
</html>
