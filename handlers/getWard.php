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
  <title>Палаты</title>
</head>
<body>
  <main class="container">
    <?php
      $nurse = $_GET['nursname'];
      $title = "<h1 class=\"main_header\">Палаты, в которых дежурит медсестра $nurse</h1>";
      echo $title;
    ?>
    <section class="wrapper-card">
        <?php
          try {
            $cursor = $collection->find([
              'nurses' => $nurse,
            ], [
              'projection' => [
                '_id' => 0,
                'wards' => 1,
                'date' => 1,
              ]
            ]);
            
            $result = "<table class=\"table-shift\"> <tr> <th>Дата</th> <th>Палаты</th> </tr>";

            foreach ($cursor as $document) {
              $result .= "<tr> <td>";
              foreach ($document['date'] as $date) {
                $seconds = intval($date) / 1000;
              };

              $date_res = date("d-m-Y", $seconds);
              $result .= "$date_res</td> <td> ";

              foreach ($document['wards'] as $ward) {
                $result .= "$ward, ";
              };

              $result = substr($result, 0, -2);
              $result .= "</td> </tr>";
            }

            print $result . "</table>";

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