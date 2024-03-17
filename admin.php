<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    <link rel="stylesheet" href="stylesheet.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>

</head>
<body>

    <!-- Projects -->
    <h2 class="title1" >Projects</h2>
    <div class="projects-list" style="padding: 20px;" >
        <?php
        $servername = "localhost";
        $username = "mosabbir";
        $password = "mosabbir32";
        $database = "portfolio_database";

        $conn = new mysqli($servername, $username, $password, $database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } else {
            //echo '<script> alert("Database connected successfully"); </script>';
        }

        $projects = $conn->query("SELECT * FROM projects");
        $messages = $conn->query("SELECT * FROM messages");

        if ($projects->num_rows > 0) {
            while ($project = $projects->fetch_assoc()) {
                if ($project["project_type"] == "Android") {
                    echo '<div>';
                    echo '<i class="bx bxl-android" style="color:#00eeff"></i>';
                    echo '<h2>' . $project["project_title"] . '</h2>';
                    echo '<p>' . $project["project_description"] . '</p>';
                    echo '<a class="read" href="' . $project["github_link"] . '">learn more</a>';
                    echo '</div>';
                } elseif ($project["project_type"] == "Code") {
                    echo '<div>';
                    echo '<i class="bx bx-code" style="color:#00eeff"></i>';
                    echo '<h2>' . $project["project_title"] . '</h2>';
                    echo '<p>' . $project["project_description"] . '</p>';
                    echo '<a class="read" href="' . $project["github_link"] . '">learn more</a>';
                    echo '</div>';
                } elseif ($project["project_type"] == "Web") {
                    echo '<div>';
                    echo '<i class="bx bxl-html5" style="color:#00eeff"></i>';
                    echo '<h2>' . $project["project_title"] . '</h2>';
                    echo '<p>' . $project["project_description"] . '</p>';
                    echo '<a class="read" href="' . $project["github_link"] . '">learn more</a>';
                    echo '</div>';
                } elseif ($project["project_type"] == "Apple") {
                    echo '<div>';
                    echo '<i class="bx bx-code" style="color:#00eeff"></i>';
                    echo '<h2>' . $project["project_title"] . '</h2>';
                    echo '<p>' . $project["project_description"] . '</p>';
                    echo '<a class="read" href="' . $project["github_link"] . '">learn more</a>';
                    echo '</div>';
                } elseif ($project["project_type"] == "Creative") {
                    echo '<div>';
                    echo '<i class="bx bx-crop" style="color:#00eeff"></i>';
                    echo '<h2>' . $project["project_title"] . '</h2>';
                    echo '<p>' . $project["project_description"] . '</p>';
                    echo '<a class="read" href="' . $project["github_link"] . '">learn more</a>';
                    echo '</div>';
                } else {
                    echo '<div>';
                    echo '<h2>P</h2>';
                    echo '<h2>' . $project["project_title"] . '</h2>';
                    echo '<p>' . $project["project_description"] . '</p>';
                    echo '<a class="read" href="' . $project["github_link"] . '">learn more</a>';
                    echo '</div>';
                }
            }
        } else {
            echo '<p>No projects found.</p>';
        }
        ?>
    </div>
    
    <button id="add-more-projects-button" onclick="openOverlay()" class ="addP" >Add More Projects</button>

    <div id="add-project-overlay">
        <div class="overlay-content">
            <span class="close-button" onclick="closeOverlay()">&times;</span>
            <h2>Add Project</h2>
            <form id="add-project-form" action="add_project.php" method="post">
                <input type="text" name="title" placeholder="Project Title" required><br>
                <select name="type">
                    <option value="Code">Code</option>
                    <option value="Android">Android</option>
                    <option value="Web">Web</option>
                    <option value="Apple">Apple</option>
                    <option value="Creative">Creative</option>
                </select><br>
                <textarea name="description" placeholder="Project Description" required></textarea><br>
                <input type="text" name="github_link" placeholder="GitHub Link" required><br>
                <button type="submit">Add Project</button>
            </form>
        </div>
    </div>

    <script>
        function openOverlay() {
            document.getElementById("add-project-overlay").style.display = "block";
        }

        function closeOverlay() {
            document.getElementById("add-project-overlay").style.display = "none";
        }

        function addProject() {
        var formData = new FormData(document.getElementById("add-project-form"));
        fetch("add_project.php", {
            method: "POST",
            body: formData
        })
        .then(response => {
            if (response.ok) {
                closeOverlay();
                location.reload();
            } else {
                throw new Error("Error in form submission");
            }
        })
        .catch(error => {
            console.error("Error:", error);
        });
    }
    </script>



    <h2 class="title1" >Messages</h2>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Message</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Display messages in the table
            if ($messages->num_rows > 0) {
                while ($message = $messages->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $message['name'] . "</td>";
                    echo "<td>" . $message['email'] . "</td>";
                    echo "<td>" . $message['subject'] . "</td>";
                    echo "<td>" . $message['message'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No messages found.</td></tr>";
            }

            // Close connection
            $conn->close();
            ?>
        </tbody>
    </table>



    <script src="main.js"> </script>

</body>
</html>
