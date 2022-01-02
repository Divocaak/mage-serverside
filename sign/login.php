<?php
require_once "../config.php";

$sql = "SELECT p.id, p.username, p.password, p.level, l.name FROM players p INNER JOIN levels l ON l.id=p.level WHERE p.username='" . $_POST["username"] . "';";
if ($result = mysqli_query($link, $sql)) {
    while ($row = mysqli_fetch_row($result)) {
        if (password_verify($_POST["password"], $row[2])) {
            echo json_encode(["id" => $row[0], "username" => $row[1], "level" => $row[3], "levelName" => $row[4]]);
        } else {
            echo "ERROR";
        }
    }
    mysqli_free_result($result);
} else {
    echo "ERROR";
}
mysqli_close($link);
?>