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
  $lol = $conn->query(" SELECT teachers_BD.names, lessons_BD.lesson, typeOfOccupation_BD.view, groups_BD.groups
  FROM schedule_BD
  INNER JOIN lessons_BD ON schedule_BD.lesson = lessons_BD.id
  INNER JOIN teachers_BD ON schedule_BD.teacher = teachers_BD.id
  INNER JOIN typeOfOccupation_BD ON schedule_BD.typeofoccupation = typeOfOccupation_BD.id
  INNER JOIN groups_BD ON schedule_BD.groups = groups_BD.id
  WHERE schedule_BD.date = \"" . $_POST["date"] ."\"
  AND schedule_BD.room = " . $_POST["n_rooms"] ."
  AND schedule_BD.time = \"" . $_POST["time"] ."\";");
  if ($lol->num_rows == 0) {
    echo "Список пуст";
  } else {
    while($kek = mysqli_fetch_array($lol)) { ?>
    <div class="wrapper">
      <p>Урок: <?php echo $kek['lesson'];?></p>
      <p>Тип занятия: <?php echo $kek['view'];?></p>
      <p>Учитель: <?php echo $kek['names'];?></p>
      <p>Группа: <?php echo $kek['groups'];?></p>
      <hr />
    </div>
      <?php
    }
  }?>
</body>
</html>


