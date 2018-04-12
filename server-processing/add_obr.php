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
  $lesson_count = $conn->query("SELECT COUNT(*) AS les_count FROM schedule_BD
  WHERE schedule_BD.groups = " . $_POST["groups"] ."
  AND schedule_BD.date = \"" . $_POST["date"] ."\"
  AND schedule_BD.semester = " . $_POST["semester"] .";");
  $teacher_online = $conn->query("SELECT COUNT(*) AS tch_on FROM schedule_BD
  WHERE schedule_BD.teacher = " . $_POST["teacher"] ."
  AND schedule_BD.date = \"" . $_POST["date"] ."\"
  AND schedule_BD.time =  \"" . $_POST["time"] ."\";");
  $group_check = $conn->query("SELECT COUNT(*) AS gr_count FROM schedule_BD
  WHERE schedule_BD.semester = " . $_POST["semester"] ."
  AND schedule_BD.date = \"" . $_POST["date"] ."\"
  AND schedule_BD.time =  \"" . $_POST["time"] ."\"");
  $lesson_c = $lesson_count->fetch_assoc();
  $teacher_on = $teacher_online->fetch_assoc();
  $group_c = $group_check->fetch_assoc();
  if ($lesson_c["les_count"] >= 4) {
    echo "У данный группы уже 4 пары";
  }
  else if ($teacher_on["tch_on"] >= 1) {
    echo "Преподаватель занят другой группой";
  }
  else if ($group_c["gr_count"] >= 1) {
    echo "Аудитория занята другой группой";
  }
  else {
    $lol = $conn->query("INSERT INTO `schedule_BD` (`id`, `semester`, `groups`, `date`, `time`, `lesson`, `teacher`, `typeofoccupation`, `room`) VALUES (NULL, " . $_POST["semester"] .", " . $_POST["groups"] .", \"" . $_POST["date"] ."\", \"" . $_POST["time"] ."\", " . $_POST["lesson"] .", " . $_POST["teacher"] .", " . $_POST["typeofoccupation"] .", " . $_POST["n_room"] .");");
    if($lol) {
      echo "Данные успешно давлены";
    }
    else {
      echo "Ошибка при добавлении данных";
    }
  }
  ?>
</body>
</html>


