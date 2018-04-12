<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="/css/style.css">
  <title>Document</title>
</head>
<body>
  <?php
  $conn = new mysqli('localhost', 'root', '', 'lol');
  $lol = $conn->query("SELECT COUNT(*) AS num_of_les
  FROM schedule_BD
  WHERE schedule_BD.date = \"" . $_POST["date"] ."\"
  AND schedule_BD.groups = " . $_POST["group"] ."
  AND schedule_BD.lesson = " . $_POST["lessones"] .";");
  if ($lol->num_rows == 0) {
    echo "Список пуст";
  } else {
    while($kek = mysqli_fetch_array($lol)) { ?>
    <div class="wrapper">
      <p>Кол-во занятий: <?php echo $kek['num_of_les'];?></p>
      <hr />
    </div>
      <?php
    }
  }?>
</body>
</html>


