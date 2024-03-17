<?php
    $servername = "localhost";
    $username = "mosabbir";
    $password = "mosabbir32";
    $database = "portfolio_database";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $title = $_POST['title'];
    $type = $_POST['type'];
    $description = $_POST['description'];
    $github_link = $_POST['github_link'];

    $sql = "INSERT INTO projects (project_title, project_type, project_description, github_link) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $title, $type, $description, $github_link);

    if ($stmt->execute()) {
        echo '<script> alert( "Project added successfully!")</script>';
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    } 
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();
?>
