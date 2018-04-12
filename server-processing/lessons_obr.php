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
  $lol = $conn->query("SELECT schedule_BD.time, lessons_BD.lesson, teachers_BD.names,
  typeOfOccupation_BD.view, rooms_BD.n_room
  FROM schedule_BD
  INNER JOIN lessons_BD ON schedule_BD.lesson = lessons_BD.id
  INNER JOIN teachers_BD ON schedule_BD.teacher = teachers_BD.id
  INNER JOIN typeOfOccupation_BD ON schedule_BD.typeofoccupation = typeOfOccupation_BD.id
  INNER JOIN rooms_BD ON schedule_BD.room = rooms_BD.id
  WHERE schedule_BD.date = \"" . $_POST["date"] ."\"
  AND schedule_BD.groups = " . $_POST["group"] ."
  ORDER BY schedule_BD.time;");

  if ($lol->num_rows == 0) {
    echo "Список пуст";
  } else {
    while($kek = mysqli_fetch_array($lol)) { ?>
    <div class="wrapper">
      <p>Урок: <?php echo $kek['lesson'];?></p>
      <p>Учитель: <?php echo $kek['names'];?></p>
      <p>Тип занятия: <?php echo $kek['view'];?></p>
      <p>Кабинет: <?php echo $kek['n_room'];?></p>
      <p>Начало в: <?php echo $kek['time'];?></p>
      <hr />
    </div>
      <?php
    }
  }?>
</body>
</html>


