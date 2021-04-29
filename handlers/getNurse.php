<?php
  include('../connection.php');
?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles/getWard.css">
  <title>Медсестры</title>
</head>
<body>
  <main class="container">
    <?php
      $department = $_GET['department'];
      $title = "<h1 class=\"main_header\">Список медсестр из $department отделения</h1>";
      echo $title;
    ?>
    <section class="wrapper-card">
        <?php
          try {
            $cursor = $collection->distinct('nurses', [
              'department' => $department,
            ]);
            
            $result = "";

            foreach ($cursor as $document) {
              $result .= "<div class=\"card\">$document</div>";
            }

            print $result;

            $script = "<script>localStorage.setItem('queryData', '$result'); localStorage.setItem('title', '$title');</script>";
            echo $script;
          } catch (PDOException $ex) {
            die("Error! " . $ex->GetMessage() . "<br/>");
          }
        ?>
    </section>
  </main>
</body>
</html>