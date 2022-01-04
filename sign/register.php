<?php
require_once "../config.php";

$e = "";
$sql = "INSERT INTO players (username, password, level) VALUES ('" . $_POST["username"] . "', '" . password_hash($_POST["password"], PASSWORD_DEFAULT) . "', 1)";
if (!mysqli_query($link, $sql)) {
    $e = "Username taken";
}

if ($e == "") {
    $reggedId = 0;
    $sql = 'SELECT id FROM players WHERE username="' . $_POST["username"] . '";';
    if ($result = mysqli_query($link, $sql)) {
        while ($row = mysqli_fetch_row($result)) {
            $reggedId = $row[0];
        }
        mysqli_free_result($result);
    }

    $sql = 'INSERT INTO trees (points_spent, type_id, player_id) VALUES (1,1,' . $reggedId . '),(1,2,' . $reggedId . '),(1,3,' . $reggedId . '),(1,4,' . $reggedId . ');';
    if (!mysqli_query($link, $sql)) {
        $e = "Error: " . $sql . " - " . mysqli_error($link);
    } else {
        $e = "Registration was successfully completed!";
    }
}
echo $e;

mysqli_close($link);
