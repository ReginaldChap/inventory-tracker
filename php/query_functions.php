<?php

function findAllItems () {
    global $db;

    $sql = "SELECT * FROM lures ";
    $sql .= "ORDER BY model ASC";
    $result = mysqli_query($db, $sql);
    return $result; 
}

