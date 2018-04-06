<?php

require_once('php/initialize.php'); 
    
    //get search term
    $searchTerm = $_GET['term'];
    
    //get matched data from skills table
    $query = $db->query("SELECT * FROM brands WHERE brandID LIKE '%".$searchTerm."%' ORDER BY brandID ASC");
    while ($row = $query->fetch_assoc()) {
        $data[] = $row['brandID'];
    }
    
    //return json data
    echo json_encode($data);
?>