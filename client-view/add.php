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
    $loh = $conn->query("SELECT id, semester FROM semesters_BD");
    $loh1 = $conn->query("SELECT id, groups FROM groups_BD");
    $loh2 = $conn->query("SELECT id, lesson FROM lessons_BD");
    $loh3 = $conn->query("SELECT id, names FROM teachers_BD");
    $loh4 = $conn->query("SELECT id, view FROM typeOfOccupation_BD");
    $loh5 = $conn->query("SELECT id, n_room FROM rooms_BD");
    ?>
    <form>
      <select name="semester" id="">
        <?php
        while($test = mysqli_fetch_array($loh)) {
          ?><option value="<?= $test["id"]?>"><?= $test["semester"];?></option><?php
        }
        ?>
      </select>
      <select name="groups" id="">
        <?php
        while($test = mysqli_fetch_array($loh1)) {
          ?><option value="<?= $test["id"]?>"><?= $test["groups"];?></option><?php
        }
        ?>
      </select>
      <input type="date" name="date" id="">
      <select name="time" id="">
        <option>08:30:00</option>
        <option>10:15:00</option>
        <option>12:00:00</option>
        <option>14:10:00</option>
      </select>
      <select name="lesson" id="">
        <?php
        while($test = mysqli_fetch_array($loh2)) {
          ?><option value="<?= $test["id"]?>"><?= $test["lesson"];?></option><?php
        }
        ?>
      </select>
      <select name="teacher" id="">
        <?php
        while($test = mysqli_fetch_array($loh3)) {
          ?><option value="<?= $test["id"]?>"><?= $test["names"];?></option><?php
        }
        ?>
      </select>
      <select name="typeofoccupation" id="">
        <?php
        while($test = mysqli_fetch_array($loh4)) {
          ?><option value="<?= $test["id"]?>"><?= $test["view"];?></option><?php
        }
        ?>
      </select>
      <select name="n_room" id="">
        <?php
        while($test = mysqli_fetch_array($loh5)) {
          ?><option value="<?= $test["id"]?>"><?= $test["n_room"];?></option><?php
        }
        ?>
      </select>
      <button>Добавить</button>
    </form>
    <div class="result"></div>
    <script>
      const form = document.querySelector('form');
      const result = document.querySelector('.result');
      form.onsubmit = e => {
        e.preventDefault();
        fetch('/server-processing/add_obr.php', {
          method: 'POST',
          body: new FormData(form),
        })
          .then(r => r.text())
          .then(data => result.innerHTML = data)
      }
    </script>
</body>
</html>
