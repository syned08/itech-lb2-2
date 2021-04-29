<?php
  include('./connection.php');
?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./styles/index.css">
  <title>Поликлиника</title>
</head>
<body>
  <main class="container">
    <h1 class="main_header">Поликлиника</h1>

    <section class="form-card">
      <h4 class="form-card__header">Получить перечень палат, в которых дежурит выбранная медсестра</h4>
      <form action="./handlers/getWard.php" method='GET'>
        <select name="nursname" id="nursname" class="form-card_select">
          <?php
            try {
              $cursor = $collection->distinct('nurses');
            
              foreach ($cursor as $document) {
                print "<option value='$document'>$document</option>";
              }
            } catch (PDOException $ex) {
              die("Error! " . $ex->GetMessage() . "<br/>");
            }
          ?>
        </select>
        <input type="submit" value="Получить" class="form-card_btn">
      </form>
    </section>

    <section class="form-card">
      <h4 class="form-card__header">Получить перечень медсестр из указаного отделения</h4>
      <form action="./handlers/getNurse.php" method='GET'>
        <select name="department" id="department" class="form-card_select">
          <?php
            try {
              $cursor = $collection->distinct('department');
            
              foreach ($cursor as $document) {
                print "<option value='$document'>$document</option>";
              }
            } catch (PDOException $ex) {
              die("Error! " . $ex->GetMessage() . "<br/>");
            }
          ?>
        </select>
        <input type="submit" value="Получить" class="form-card_btn">
      </form>
    </section>

    <section class="form-card">
      <h4 class="form-card__header">Получить перечень дежурств в указанную смену в указанном отделении</h4>
      <form action="./handlers/getDuty.php" method='GET'>
        <div class="input-container">
          <label for="shift">Смена</label>
          <select name="shift" id="shift" class="form-card_select">
            <?php
              try {
                $cursor = $collection->distinct('shift');
              
                foreach ($cursor as $document) {
                  print "<option value='$document'>$document</option>";
                }
              } catch (PDOException $ex) {
                die("Error! " . $ex->GetMessage() . "<br/>");
              }
            ?>
          </select>
        </div>
        <div class="input-container">
          <label for="department">Отделение</label>
          <select name="department" id="department" class="form-card_select">
            <?php
              try {
                $cursor = $collection->distinct('department');
              
                foreach ($cursor as $document) {
                  print "<option value='$document'>$document</option>";
                }
              } catch (PDOException $ex) {
                die("Error! " . $ex->GetMessage() . "<br/>");
              }
            ?>
          </select>
        </div>
        <input type="submit" value="Получить" class="form-card_btn">
      </form>
    </section>
    <script>
      const title = localStorage.getItem('title');
      const data = localStorage.getItem('queryData');
      if (title && data) {
        document.write(`${title} ${data}`);
      } else {
        document.write('<h4 class="form-card__header">Сделайте первый запрос</h4>');
      }
    </script>
  </main>
</body>
</html>
