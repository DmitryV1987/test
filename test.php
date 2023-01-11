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
$teams = array("Луверуполь", "Челси", "Тоттенхуй", "Арсенал", "Манчестер", "Эвертон", "Лейстер", "Вест Хем", "Уотфорд", "Бернли", "Брайтон", "Саутхемптон", "Борнмут", "Альбион", "Норвич", "Шеффилд", "Фулхэм", "Сток Сити", "Милдсбро", "Суонси");
$numTeams = count($teams);
$rounds = $numTeams - 1;
$matchesPerRound = $numTeams / 2;

$hosts = array();
$guests = array();
$schedule = array();

for ($round = 1; $round <= $rounds; $round++) {
  for ($match = 1; $match <= $matchesPerRound; $match++) {
    if ($round % 2 == 1) {
      $hosts[$round][$match] = $numTeams;
    } else {
      $guests[$round][$match] = $numTeams;
    }
  }
}

$k = 0;
for ($round = 1; $round <= $rounds; $round++) {
  for ($match = 1; $match <= $matchesPerRound; $match++) {
    $k = ($k < $numTeams - 1) ? $k + 1 : 1;
    if ($hosts[$round][$match] == 0) {
      $hosts[$round][$match] = $k;
    } else {
      $guests[$round][$match] = $k;
    }
  }
}

$k = $numTeams - 1;
for ($round = 1; $round <= $rounds; $round++) {
  for ($match = 1; $match <= $matchesPerRound; $match++) {
    if ($guests[$round][$match] == 0) {
      $guests[$round][$match] = $k;
      $k = ($k == 1) ? $numTeams - 1 : $k - 1;
    }
  }
}

echo "<table>";
echo "<tr><th>RND</th><th>№</th><th>HOME</th><th>AWAY</th></tr>";
for ($round = 1; $round <= $rounds; $round++) {
  for ($match = 1; $match <= $matchesPerRound; $match++) {
    echo "<tr>";
    echo "<td>$round</td>";
    echo "<td>$match</td>";
    echo "<td>{$teams[$hosts[$round][$match]-1]}</td>";
    echo "<td>{$teams[$guests[$round][$match]-1]}</td>";
    echo "</tr>";
  }
}
echo "</table>";
?>

?>
