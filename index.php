<!DOCTYPE html>
<html lang="en">

<?php
    $servername = "localhost";
    $username = "mosabbir";
    $password = "mosabbir32";
    $database = "portfolio_database";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    else{
        //echo '<script> alert("Database connected successfully"); </script>';
    }


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO messages (name, email, subject, message) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $subject, $message);

        // Set parameters and execute
        $name = $_REQUEST["name"];
        $email = $_REQUEST["email"];
        $subject = $_REQUEST["subject"];
        $message = $_REQUEST["message"];

        if ($stmt->execute()) {
            echo '<script> alert("Message sent successfully") </script>';
        } else {
            echo '<script> alert("Something is wrong, Message is not sent.") </script>';
        }

        // Close statement
        $stmt->close();
    }

    $projects = $conn -> query("SELECT * FROM projects");
    $conn->close();

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>portfolio</title>
    <link rel="stylesheet" href="stylesheet.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>

</head>

<body>
    <header class="header">
        <a href="#" class="logo">Portfolio</a>

        <nav class="navbar">
            <a href="#home" style="--i:1" class="active">Home</a>
            <a href="#about" style="--i:2">About</a>
            <a href="#projects" style="--i:3">Projects</a>
            <a href="#Skill" style="--i:4">portfolio</a>
            <a href="#contact" style="--i:5">Contact</a>
        </nav>
    </header>
    <section class="home" id="home">
        <div class="home-content">
            <h3>
                Hello,It's Me
            </h3>
            <h1>
                Md Mosabbir Hossen Sabbir
            </h1>
            <h3>
                And I'm a <span class="text"></span>
            </h3>
            <p>
                I'm a CSE Undergraduate of KUET,Bangladesh.
                <br>I am a Programmer expert in C,C++ & Java.
                I am a fresher in Web Development Sector.
            </p>
            <div class="home-sci">
                <a href="https://www.facebook.com/M0sabbir.Hossen" style="--i:7"><i
                        class='bx bxl-facebook-circle'></i></a>
                <a href="https://www.instagram.com/m0sabbir.hossen" style="--i:8"><i class='bx bxl-instagram'></i></a>
                <a href="https://wa.me/01927191951" style="--i:9"><i class='bx bxl-whatsapp'></i></a>
                <a href="https://t.me/MosabbirHossen" style="--i:10"><i class='bx bxl-telegram'></i></a>
                <a href="https://github.com/Mosabbirhossen" style="--i:11"><i class='bx bxl-github'></i></a>
                <a href="https://www.linkedin.com/in/md-mosabbir-hossen-sabbir-85b907244/" style="--i:12"><i
                        class='bx bxl-linkedin'></i></a>
            </div>
            <a href="#about" class="btn-box">More About Me</a>
        </div>
    </div>

</div>
   <span class="home-imgHover"></span>
    </section>

    <section class="about" id="about">
          <div class="about-img">
            <img src="about wallpaper.png">
            </div>
            <div class="about-text">
                <h2>About <span>Me</span></h2>
                <h4>Full Stack Developer</h4>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Asperiores nesciunt dolores iure sequi molestias placeat numquam quam adipisci pariatur atque consequatur eos neque fuga itaque facilis nam deleniti cum, sit mollitia optio nobis. Pariatur quisquam hic officia obcaecati molestiae. Illum architecto tempore distinctio laudantium eum, qui quisquam odio dolorem sint esse totam, quasi assumenda exercitationem. Doloremque repudiandae est veritatis officiis fuga quisquam ab saepe, maiores, incidunt beatae quam tempore, possimus alias accusamus vitae similique sed veniam temporibus quibusdam tenetur. Ipsum eligendi placeat illo consequatur vitae esse deserunt voluptatibus pariatur voluptates soluta nulla minus molestiae optio, porro ex consequuntur cum quos!</p>

                <a href="#"class="btn-box"> More About Me</a>
            </div>

    </section>

    
        
    
    <section>
        <!-- <div class="my_project" id="projects"> -->
            <div class="container">
                <h1 class="sub-title">My <span>Projects</span></h1>
                <?php
                     echo '<div class = "projects-list">';
                    if($projects -> num_rows > 0){
                        while($project = $projects -> fetch_assoc()){
                            if($project["project_type"] == "Android"){
                                echo '<div>';
                                echo '<i class="bx bxl-android" style="color:#00eeff"></i>';
                                echo '<h2>' . $project["project_title"] . '</h2>';
                                echo '<p>' . $project["project_description"] . '</p>';
                                echo '<a class="read" href="' . $project["github_link"] . '">learn more</a>';
                                echo '</div>';

                            }
                            elseif($project["project_type"] == "Code"){
                                echo '<div>';
                                echo '<i class="bx bx-code" style="color:#00eeff"></i>';
                                echo '<h2>' . $project["project_title"] . '</h2>';
                                echo '<p>' . $project["project_description"] . '</p>';
                                echo '<a class="read" href="' . $project["github_link"] . '">learn more</a>';
                                echo '</div>';
                            }
                            elseif($project["project_type"] == "Web"){
                                echo '<div>';
                                echo '<i class="bx bxl-html5" style="color:#00eeff"></i>';
                                echo '<h2>' . $project["project_title"] . '</h2>';
                                echo '<p>' . $project["project_description"] . '</p>';
                                echo '<a class="read" href="' . $project["github_link"] . '">learn more</a>';
                                echo '</div>';
                            }
                            elseif($project["project_type"] == "Apple"){
                                echo '<div>';
                                echo '<i class="bx bx-code" style="color:#00eeff"></i>';
                                echo '<h2>' . $project["project_title"] . '</h2>';
                                echo '<p>' . $project["project_description"] . '</p>';
                                echo '<a class="read" href="' . $project["github_link"] . '">learn more</a>';
                                echo '</div>';
                            }
                            elseif($project["project_type"] == "Creative"){
                                echo '<div>';
                                echo '<i class="bx bx-crop" style="color:#00eeff"></i>';
                                echo '<h2>' . $project["project_title"] . '</h2>';
                                echo '<p>' . $project["project_description"] . '</p>';
                                echo '<a class="read" href="' . $project["github_link"] . '">learn more</a>';
                                echo '</div>';
                            }
                            else{
                                echo '<div>';
                                echo '<h2>P</h2>';
                                echo '<h2>' . $project["project_title"] . '</h2>';
                                echo '<p>' . $project["project_description"] . '</p>';
                                echo '<a class="read" href="' . $project["github_link"] . '">learn more</a>';
                                echo '</div>'; 
                            }
                        }
                    }
                    else {
                        echo '<p>No projects found.</p>';
                    }
                    echo '</div>';
                ?>
            </div>
        <!-- </div> -->
    </section>
    

    <h1 class="sub-title" id="Skill" >My <span>Skill</span></h1>

    <section>
        <div class="container1">
            <h1 class="heading1">Technical Skill</h1>
            <div class="Technical-bars">
                <div class="bar"><i style="color: #c95d2e;" class='bx bxl-html5'></i>
                    <div class="info">
                        <span>HTML</span>
                    </div>
                    <div class="progress-line html"data-content="90%">
                        <span></span>
                    </div>
                </div>

                <div class="bar"><i  style="color: #147bbc;"class='bx bxl-css3'></i>
                    <div class="info">
                        <span>CSS</span>
                        </div>
                        <div class="progress-line CSS"data-content="60%">
                            <span></span>
                        </div>
                    
                </div>

                <div class="bar"><i style="color: #c32ec9;;" class='bx bxl-javascript'></i>
                    <div class="info">
                        <span>Javascript</span>
                        </div>
                        <div class="progress-line Javascript"data-content="80%">
                            <span></span>
                        </div>
                    
                </div>

                <div class="bar"><i class='bx bxl-php' style='color:#E5DD0B'  ></i>
                    <div class="info">
                        <span>PHP</span>
                        </div>
                        <div class="progress-line PHP"data-content="40%">
                            <span></span>
                        </div>
                    
                </div>

                <div class="bar"><i style="color: aquamarine;" class='bx bx-code-block'></i>
                    <div class="info">
                        <span>C </span>
                        </div>
                        <div class="progress-line C"data-content="85%">
                            <span></span>
                        </div>
                    
                </div>

                <div class="bar"><i class='bx bxl-c-plus-plus'style='color:#E5DD0B'></i>
                    <div class="info">
                        <span>C++ </span>
                        </div>
                        <div class="progress-line Cpp"data-content="75%">
                            <span></span>
                        </div>
                    
                </div>

                



            </div>
        </div>


         <div class="container1">
            <h1 class="heading1">Professional Skill</h1>
            <div class="radial-bars">
                <div class="radial-bar">

                <svg x="0px" y="0px" viewBox="0 0 200 200">

                     <circle class="progress-bar" cx="100" cy="100" r="80"></circle>
                     <circle class="path path-1" cx="100" cy="100" r="80"></circle>
                </svg>
                <div class="percentage">70%</div>
                <div class="text">Creativity</div>
            </div>
            <div class="radial-bar">

                <svg x="0px" y="0px" viewBox="0 0 200 200">

                     <circle class="progress-bar" cx="100" cy="100" r="80"></circle>
                     <circle class="path path-2" cx="100" cy="100" r="80"></circle>
                </svg>
                <div class="percentage">90%</div>
                <div class="text">Communication</div>
            </div>

            <div class="radial-bar">

                <svg x="0px" y="0px" viewBox="0 0 200 200">

                     <circle class="progress-bar" cx="100" cy="100" r="80"></circle>
                     <circle class="path path-3" cx="100" cy="100" r="80"></circle>
                </svg>
                <div class="percentage">75%</div>
                <div class="text">Problem Solving</div>
            </div>

            <div class="radial-bar">

                <svg x="0px" y="0px" viewBox="0 0 200 200">

                     <circle class="progress-bar" cx="100" cy="100" r="80"></circle>
                     <circle class="path path-4" cx="100" cy="100" r="80"></circle>
                </svg>
                <div class="percentage">85%</div>
                <div class="text">TeamWork</div>
            </div>
         </div>
      </div>

    </section>

    <section>

        <div class="portfolio">
            <div class="main-text"id="project">
                <h2>Latest <span>Project</span></h2>


            <div class="portfolio-content">
                <div class="row">
                    <img src="hall.png">
                    <div class="layer">
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
                            Eaque doloribus, unde ratione omnis dolor quia quisquam? Cumque neque, sequi totam possimus ullam,
                             eligendi, odit molestiae reiciendis delectus numquam doloremque perferendis.</p>

                        <a href="#p1"><i class='bx bx-link-external' style="color: aliceblue;"></i></a>
                        

                    </div>
                </div>

                <div class="row">
                    <img src="Smart.png">
                    <div class="layer">
                        
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
                            Eaque doloribus, unde ratione omnis dolor quia quisquam? Cumque neque, sequi totam possimus ullam,
                             eligendi, odit molestiae reiciendis delectus numquam doloremque perferendis.</p>

                        <a href="#p2"><i class='bx bx-link-external' style="color: aliceblue;"></i></a>
                        
                    </div>
                </div>

                <div class="row">
                    <img src="Inventory.png">
                    <div class="layer">
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
                            Eaque doloribus, unde ratione omnis dolor quia quisquam? Cumque neque, sequi totam possimus ullam,
                             eligendi, odit molestiae reiciendis delectus numquam doloremque perferendis.</p>

                        <a href="#p3"><i class='bx bx-link-external' style="color: aliceblue;"></i></a>
                        
                    </div>
                </div>


            </div>
            </div>
        </div>

    </section>

    <section class="contact"id="contact">
        <div class="contact-text">
            <h2>Contact <span>Me</span></h2>
            <h4>Let's work Together</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique nesciunt officia eum reiciendis quisquam eius voluptatibus incidunt temporibus, 
                beatae accusantium expedita deserunt aspernatur maiores in, placeat repudiandae, earum aperiam sint.</p>
                <div class="contact-list">
                    <li><i class='bx bxs-send' style='color:#ef5c13'  ></i>contact@gmail.com</li>
                    <li><i class='bx bx-phone' style='color:#0ee87f' ></i>01927191951</li>
                    </div>
                    <div class="contact-icon">
                        <a href="https://www.facebook.com/M0sabbir.Hossen" style="--i:7"><i
                            class='bx bxl-facebook-circle'></i></a>
                    <a href="https://www.instagram.com/m0sabbir.hossen" style="--i:8"><i class='bx bxl-instagram'></i></a>
                    <a href="https://wa.me/01927191951" style="--i:9"><i class='bx bxl-whatsapp'></i></a>
                    <a href="https://t.me/MosabbirHossen" style="--i:10"><i class='bx bxl-telegram'></i></a>
                    <a href="https://github.com/Mosabbirhossen" style="--i:11"><i class='bx bxl-github'></i></a>
                    <a href="https://www.linkedin.com/in/md-mosabbir-hossen-sabbir-85b907244/" style="--i:12"><i
                            class='bx bxl-linkedin'></i></a>
                    </div>
        </div>

        <div class="contact-form">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>"  method= "POST" >
                <input name="name" type="text" placeholder="Enter Your Name" required>
                <input name="email" type="email"placeholder="Enter Your Email" required>

                <input name="subject" type="text" placeholder="Enter Your Subject">
                <textarea name="message" cols="40"rows="10"placeholder="Enter Your Message"required></textarea>
                <input type="submit" value="Submit" class="send">
            </form>
        </div>

    </section> 

    <div class="last-text">
        <p>Developed by Mosabbir © 2024 </p>
    </div>
    <a href="#Skill"class="top"><i class='bx bx-up-arrow-alt'></i></a>


    <script src="main.js"> </script>

</body>

</html>