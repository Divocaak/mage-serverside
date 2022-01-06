<?php
require_once "../config.php";

$retArr = [];
$sql = 'SELECT t.id, t.points_spent, t.type_id, ty.name FROM trees t
INNER JOIN types ty ON t.type_id=ty.id
WHERE t.player_id=' . $_POST["playerId"] . ';';
if ($result = mysqli_query($link, $sql)) {
    while ($row = mysqli_fetch_row($result)) {
        $retArr[] = ["id" => $row[0], "spent" => $row[1], "type" => $row[2], "name" => $row[3]];
    }
    mysqli_free_result($result);
}
echo json_encode($retArr);
?>