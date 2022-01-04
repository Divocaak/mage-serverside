<?php
require_once "../config.php";

$loses = 0;
$sql = 'SELECT COUNT(id) FROM casual_games WHERE end IS NOT NULL AND winner_id !=' . $_POST["id"] . '  AND (attacker_id=' . $_POST["id"] . ' OR defender_id=' . $_POST["id"] . ');';
if ($result = mysqli_query($link, $sql)) {
    while ($row = mysqli_fetch_row($result)) {
        $loses = $row[0];
    }
    mysqli_free_result($result);
}
echo $loses;
?>