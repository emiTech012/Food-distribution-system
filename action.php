<?php
include "query.php";

$obj = new Query();

if (isset($_GET['Key'])) {
    $msg = "";
    $color = "green";
    $data = $obj->searchStock($_GET['Key']); // Modify this method according to your Query class
    $count = count($data); // Assuming this returns an array of results
    if ($count > 0) {
        echo "<font color=$color>Record(s) found!</font>";
        foreach ($data as $row) {
            $msg .= "<ul>";
            $msg .= "<li>" . $row['name'] . "</li>";
            $msg .= "<li>" . $row['category'] . "</li>";
            $msg .= "<li>" . $row['quantity'] . "</li>";
            $msg .= "<li>" . $row['ratio'] . "</li>";
            $msg .= "<li>" . $row['created_at'] . "</li>";
            $msg .= "</ul>";
        }
        echo $msg;
    } else {
        echo "<font color=red>No record found!</font>";
    }
}
?>
