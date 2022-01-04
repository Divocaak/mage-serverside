<?php
require_once "../config.php";

$wins = 0;
$sql = 'SELECT COUNT(winner_id) FROM casual_games WHERE end IS NOT NULL AND winner_id=' . $_POST["id"] . ';';
if ($result = mysqli_query($link, $sql)) {
    while ($row = mysqli_fetch_row($result)) {
        $wins = $row[0];
    }
    mysqli_free_result($result);
}
echo $wins;
?>