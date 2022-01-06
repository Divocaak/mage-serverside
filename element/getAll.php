<?php
require_once "../config.php";


// URGENT tady končim, předělat dodělat
$retArr = [];
$sql = 'SELECT e.id, e.name, e.params, e.tier_id, ti.name, ty.name 
FROM ELEMENTS e INNER JOIN tiers ti ON ti.id=e.tier_id 
INNER JOIN types ty ON ty.id=e.type_id 
WHERE e.type_id=' . $_POST["typeId"] . ';';
if ($result = mysqli_query($link, $sql)) {
    while ($row = mysqli_fetch_row($result)) {
        $retArr[] = ["id" => $row[0], "spent" => $row[1], "type" => $row[2], "name" => $row[3]];
    }
    mysqli_free_result($result);
}
echo json_encode($retArr);
?>