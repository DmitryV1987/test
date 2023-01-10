<head>
    <link rel="stylesheet" type="text/css" href="tabl.css">
    <script src="jquery-3.6.3.min.js"></script>
    <script>
        $(document).ready(function(){
            $("td").click(function(){
                var team = $(this).text();
                $("td:contains(" + team + ")").addClass("highlight");
            });
        });
    </script>
    </head>
<?php

// Массив с названиями команд
$teams = array("Ливерпуль",
    "Челси",
    "Тоттенхэм Хотспур",
    "Арсенал",
    "Манчестер Юнайтед",
    "Эвертон",
    "Лестер Сити",
    "Вест Хэм Юнайтед",
    "Уотфорд",
    "Борнмут",
    "Бернли",
    "Саутгемптон",
    "Брайтон энд Хоув Альбион",
    "Норвич Сити",
    "Шеффилд Юнайтед",
    "Фулхэм",
    "Сток Сити",
    "Мидлсбро",
    "Суонси Сити",
    "Дерби Каунти");

// Двумерный массив, где $schedule[$i][$j] - матч $j в туре $i
$schedule = array();

// Цикл по турам
for ($i = 0; $i < 38; $i++) {
// Цикл по матчам в туре
for ($j = 0; $j < 10; $j++) {
// Назначаем команды для матча
$team1 = $teams[$j];
$team2 = $teams[($j + 10) % 20];
    // Определяем, кто играет дома
    if ($i % 2 == 0) {
        // Если это четный тур, то команда $team1 играет дома
        $schedule[$i][$j] = "$team1 - $team2";
    } else {
        // Иначе, команда $team2 играет дома
        $schedule[$i][$j] = "$team2 - $team1";
    }
}
    // Перемешиваем команды
    shuffle($teams);
}

// Выводим календарь
echo "<table border='1'>";
echo "<tr>";
echo "<th>Тур</th>";
for ($j = 0; $j < 10; $j++) {
    echo "<th>Матч $j</th>";
}
echo "</tr>";
for ($i = 0; $i < 38; $i++) {
    echo "<tr>";
    echo "<td>$i</td>";
    for ($j = 0; $j < 10; $j++) {
        echo "<td>" . $schedule[$i][$j] . "</td>";
    }
    echo "</tr>";
}
echo "</table>";

?>
