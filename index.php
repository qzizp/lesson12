<?php

  require_once "db-connector.php";

  if (!empty($_GET)) {
    $bookName = $_GET["name"];
    $bookAuthor = $_GET["author"];
    $bookIsbn = $_GET["isbn"];
  }

//    if (!empty($bookName)) {
//      $myFirstRequest = "SELECT * FROM `books` WHERE `name` LIKE ?";
//      $statement = $connect->prepare($myFirstRequest);
//      $statement->execute(["%$bookName%"]);
//    } else {
//      $myFirstRequest = "SELECT * FROM `books`";
//      $statement = $connect->prepare($myFirstRequest);
//      $statement->execute();
//    }

  $filter = "filter";

  switch ($filter) {
    case !empty($bookName):
      $myFirstRequest = "SELECT * FROM `books` WHERE `name` LIKE ?";
      $statement = $connect->prepare($myFirstRequest);
      $statement->execute(["%$bookName%"]);
      break;
    case !empty($bookAuthor):
      $myFirstRequest = "SELECT * FROM `books` WHERE `author` LIKE ?";
      $statement = $connect->prepare($myFirstRequest);
      $statement->execute(["%$bookAuthor%"]);
      break;
    case !empty($bookIsbn):
      $myFirstRequest = "SELECT * FROM `books` WHERE `isbn` LIKE ?";
      $statement = $connect->prepare($myFirstRequest);
      $statement->execute(["%$bookIsbn]%"]);
      break;
    default:
      $myFirstRequest = "SELECT * FROM `books` ORDER BY `year` DESC";
      $statement = $connect->prepare($myFirstRequest);
      $statement->execute();
  }

  $results = [];

  while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    $results[] = $row;
  }

//echo "<pre>";
//var_dump($results);
//echo "</pre>";

?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <link href="https://fonts.googleapis.com/css?family=PT+Serif:400,700&amp;subset=cyrillic" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <title>Библиотека успешного человека</title>
</head>
<body>
<div class="wrapper">
    <form action="">
        <input type="text" name="author" placeholder="Поиск по автору">
        <input type="text" name="name" placeholder="Поиск по названию книги">
        <input type="text" name="isbn" placeholder="Поиск по коду ISBN">
        <input type="submit" value="Искать">
    </form>


  <table>
    <tr>
      <th>Название</th>
      <th>Автор</th>
      <th>Год выпуска</th>
      <th>Жанр</th>
      <th>ISBN</th>
    </tr>
    <?php foreach ($results as $row): ?>
      <tr>
          <td><?php echo $row["name"] ?></td>
          <td><?php echo $row["author"] ?></td>
          <td><?php echo $row["year"] ?></td>
          <td><?php echo $row["genre"] ?></td>
          <td class="isbn"><?php echo $row["isbn"] ?></td>
      </tr>
    <?php endforeach; ?>
  </table>
</div>
</body>
</html>
