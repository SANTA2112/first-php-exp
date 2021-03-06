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
  <nav class="menu">
    <nav class="menu__list"><a href="lessons.php" class="menu__item">Расписание занятий определенной группы на определенное время</a></nav>
    <nav class="menu__list"><a href="teachers.php" class="menu__item">Расписание занятий преподавателя на неделю</a></nav>
    <nav class="menu__list"><a href="number_of_lessons.php" class="menu__item">Количество занятий (часов) в неделю по дисциплине для группы</a></nav>
    <nav class="menu__list"><a href="room_time.php" class="menu__item">Сведения о занятости аудитории на определенное время</a></nav>
    <nav class="menu__list"><a href="group_lesson.php" class="menu__item">Расписание занятий группы по дисциплине на неделю</a></nav>
    <nav class="menu__list"><a href="teacher_lesson.php" class="menu__item">Расписание занятий учителя</a></nav>
    <nav class="menu__list"><a href="add.php" class="menu__item">Составление рассписания</a></nav>
  </nav>
  <?php
    $conn = new mysqli('localhost', 'root', '', 'lol');
    $loh = $conn->query("SELECT id, n_room  FROM rooms_BD");
    $loh2 = $conn->query("SELECT schedule_BD.time FROM schedule_BD");
    ?>
    <form>
      <select name="n_rooms" id="">
        <?php
        while($test = mysqli_fetch_array($loh)) {
          ?><option value="<?= $test["id"]?>"><?= $test["n_room"];?></option><?php
        } ?>
      </select>
      <select name="time" id="">
        <?php
        while($test = mysqli_fetch_array($loh2)) {
          ?><option><?= $test["time"];?></option><?php
        } ?>
      </select>
      <input type="date" name="date">
      <button>Принять</button>
    </form>
    <div class="result"></div>
    <script>
      const form = document.querySelector('form');
      const result = document.querySelector('.result');
      form.onsubmit = e => {
        e.preventDefault();
        fetch('/server-processing/room_time_obr.php', {
          method: 'POST',
          body: new FormData(form),
        })
          .then(r => r.text())
          .then(data => result.innerHTML = data)
      }
    </script>
</body>
</html>
