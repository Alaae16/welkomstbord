<?php

function dbconnect(){
    //Database credentials
    $server = "localhost";
    $username = "koffiemail_welkom";
    $password = "grTtKiJve";
    $database = "koffiemail_welkom";
    
    //Create database object
    $connection = mysqli_connect($server, $username, $password, $database);
    
    $connection->set_charset('utf8mb4');

    if(!$connection){
        die("connection failed: " . mysqli_content_error());
    }
    
    //Return database object
    return $connection;
}

function getPost(){
    //Make post array
    $posts = array();
    $posts[1] = $_POST['projectKleur'];
    $posts[2] = $_POST['projectImage'];
    $posts[3] = $_POST['projectAanhef'];
    $posts[4] = $_POST['projectTekst'];

    return $posts;
}

function getProject(){
    //Create database connection
    $con = dbconnect();

    //Define empty array
    $project = [];

    //the SQL
    $query = "SELECT * FROM project WHERE projectId = 1";

    $result = $con->query($query) or die ($con->error);

    $project = $result->fetch_all(MYSQLI_ASSOC);

    return $project;
}

?>