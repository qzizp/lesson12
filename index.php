<?php

  require_once "db-connector.php";

  $myFirstRequest = "SELECT * FROM 'books'";
  $statement = $connect->prepare($myFirstRequest);
  $statement->execute();

  $results = [];

  while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    $results[] = $row;
  }

echo "<pre>";
print_r($connect);
echo "</pre>";

echo "<pre>";
var_dump($myFirstRequest);
echo "</pre>";

echo "<pre>";
var_dump($statement);
echo "</pre>";

echo "<pre>";
var_dump($results);
echo "</pre>";

?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <link rel="stylesheet" href="">
  <title>Библиотека успешного человека</title>
</head>
<body>
<div class="wrapper">
  <table>
    <tr>
      <th>Название</th>
      <th>Автор</th>
      <th>Год выпуска</th>
      <th>Жанр</th>
      <th>ISBN</th>
    </tr>
    <?php foreach ($results as $row): ?>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    <?php endforeach; ?>
  </table>
</div>
</body>
</html>
