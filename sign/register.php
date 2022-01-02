<?php
require_once "../config.php";

$e = "";
$sql = "SELECT id FROM players WHERE username = " . $_POST["username"];
if (mysqli_query($link, $sql)) {
    $e = "Username already taken";
}

if ($e == "") {
    $sql = "INSERT INTO players (username, password, level) VALUES ('" . $_POST["username"] . "', '" . $passHash . "', 1)";
    if (!mysqli_query($link, $sql)) {
        $e = "Error: " . $sql . " - " . mysqli_error($link);
    }
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
        echo "Registration was successfully completed!";
    }
} else {
    echo $e;
}

mysqli_close($link);
?>