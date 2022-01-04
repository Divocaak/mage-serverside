<?php
require_once "../config.php";

$ret = ["code" => "e", "response" => "User does not exist"];
$sql = "SELECT p.id, p.username, p.password, p.level, l.name FROM players p INNER JOIN levels l ON l.id=p.level WHERE p.username='" . $_POST["username"] . "';";
if ($result = mysqli_query($link, $sql)) {
    while ($row = mysqli_fetch_row($result)) {
        if (password_verify($_POST["password"], $row[2])) {
            $ret = ["code" => "s", "response" => ["id" => $row[0], "username" => $row[1], "level" => $row[3], "levelName" => $row[4]]];
        } else {
            $ret = ["code" => "e", "response" => "Password error"];
        }
    }
    mysqli_free_result($result);
}
mysqli_close($link);
echo json_encode($ret);
?>