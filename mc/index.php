<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organics</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>
<body>
    <header>
        <a href="#" class="logo"><img src="img/logo.jpg" alt=""></a>
        <div class="bx bx-menu" id="menu-icon"></div>

        <ul class="navbar">
            <li><a href="#home">Home</a></li>
            <li><a href="#about-me">About Me</a></li>
            <li><a href="#projects">Projects</a></li>
            <li><a href="#skills">Skills</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
    
    </header>
    <section class="home" id="home">
    <div style="position: relative; right: 120px; top: -230px;"><a href="/index.php"><img src="/karry/assets/images/return-black.png" alt="" style="width: 50px;"></a></div>
        <div class="home-text">
            <h1>Welcome</h1>
            <h2>This is my portfolio where you can learn everything <br>about me.</h2>
            <a href="#about-me" class="btn" id="get-started">Get Started</a>
        </div>
        <div class="home-img">
            <img src="img/mc-removebg-preview.png" alt="">
        </div>

    </section>
    <section class="about-me" id="about-me">
        <div class="heading">
            <h1>About Me</h1>
        </div>
        <div class="about-me-btn">
            <div class="about-me-button">
                <button onclick="showSelection('intro')" id="about-me-buttons" class="introbtn" style="border-color: #008148; border-width: 5px"><b>Intro-<br>duction</b></button>
                <button onclick="showSelection('info')" id="about-me-buttons" class="infobtn"><b>Basic <br>Info</b></button>
                <button onclick="showSelection('educ')"  id="about-me-buttons" class="decbtn"><b>Education</b></button>
                <button onclick="showSelection('hob')"  id="about-me-buttons" class="hobbtn"><b>Dream</b></button>
            </div>
        </div>

        <div class="introduction" id="intro">
            <h2 style="align-self: center;">Introduction</h2>
            <br>
            <div class="text-area">
                <?php
                    $about = fopen("intro.txt", "r");
                    try{
                        if ($about) {
                            while (!feof($about)) {
                                $line = fgets($about);
                                echo "<p>" . $line . "</p>";
                            }
                            fclose($about);
                        } else {
                            throw new Exception("Unable to open the file.");
                        }
                    }catch (Exception $e) {
                         echo 'Error: ' . $e->getMessage();
                    }
                ?>
            </div>
            <div class="edit-area" id="intro-edit" style="display: none;">
                <form action="save_about.php" method="post">
                <input type="hidden" name="section" value="intro">

                    <textarea name="intro-text-edit" id="intro-text-edit"><?php
                        $about = fopen("intro.txt", "r");
                        try{
                            if ($about) {
                                while (!feof($about)) {
                                    $line = fgets($about);
                                    echo  $line;
                                }
                                fclose($about);
                            } else {
                                throw new Exception("Unable to open the file.");
                            }
                        }catch (Exception $e) {
                            echo 'Error: ' . $e->getMessage();
                        }
                    ?>
                    </textarea>
                    <button type="submit">Save</button>
                </form>
            </div>
            <a href="#about-me" class="edit-btn" id="edit-btn1" onclick="edit('intro')"><img src="img/edit-solid-24.png" alt="edit"></a></button>
        </div>

        <div class="info" id="info" style="display: none;">
            <h2 style="align-self: center;">Basic Info</h2>
            <br>
            <div class="text-area">
                <?php
                try{
                        $about = fopen("info.txt", "r");

                        if ($about) {
                            while (!feof($about)) {
                                $line2 = fgets($about);
                                    echo "<p>".$line2."</p>";
                            }
                            fclose($about);
                        } else {
                            throw new Exception("Unable to open the file.");
                        }
                    }catch (Exception $e) {
                        echo 'Error: ' . $e->getMessage();
                    }
                ?>
            </div>
            <div class="edit-area" id="info-edit" style="top: -100px; display:none">
                <form action="save_about.php" method="post">
                <input type="hidden" name="section" value="info">
                    <textarea name="info-text-edit" id="info-text-edit"><?php
                        $about = fopen("info.txt", "r");
                        try{
                            if ($about) {

                                while (!feof($about)) {
                                    $line2 = fgets($about);
                                    echo htmlspecialchars($line2);

                                }
                                fclose($about);
                            } else {
                                throw new Exception("Unable to open the file.");
                            }
                        }
                        catch (Exception $e) {
                            echo 'Error: ' . $e->getMessage();
                        }
                    ?>
                    </textarea>
                    <button type="submit">Save</button>
                </form>
            </div>
             <a href="#about-me" class="edit-btn" id="edit-btn2" onclick="edit('info')"><img src="img/edit-solid-24.png" alt=""></a></button>
        </div>

        <div class="educ" id="educ" style="display: none;">
            <h2 style="align-self: center;">Education</h2>
            <br>
            <div class="school-container" style="display: flex; justify-content: space-around; align-items: center; flex-wrap: wrap;">
                <div class="school" style="text-align: center; margin: 10px;">
                    <p style="font-size: 1.2em; font-weight: bold;">Elementary</p>
                    <img src="img/malong.jpg" alt="School 1 Logo" style="width: 100px; height: auto; border-radius: 8px;">
                    <p style="font-size: 1.2em; font-weight: bold;">Mal-ong Elementary School</p>
                </div>
                <div class="school" style="text-align: center; margin: 10px;">
                    <p style="font-size: 1.2em; font-weight: bold;">High School</p>
                    <img src="img/sncsa.jpg" alt="School 2 Logo" style="width: 100px; height: auto; border-radius: 8px;">
                    <p style="font-size: 1.2em; font-weight: bold;">St. Nicholas Catholic School of Anda</p>
                </div>
                <div class="school" style="text-align: center; margin: 10px;">
                    <p style="font-size: 1.2em; font-weight: bold;">College</p>
                    <img src="img/udd.jpg" alt="School 3 Logo" style="width: 100px; height: auto; border-radius: 8px;">
                    <p style="font-size: 1.2em; font-weight: bold;">Universidad de Dagupan</p>
                </div>
            </div>
        </div>

        <div class="hob" id="hob" style="display: none;">
            <h2 style="align-self: center;">Dream</h2>
            <br>
            <div class="text-area">
                <?php
                try{
                    $about = fopen("dream.txt", "r");
                
                    if ($about) {

                        while (!feof($about)) {
                            $line3 = fgets($about);
                            
                            echo "<p>" . $line3 . "</p>";
                            }
                        
                        fclose($about);
                    } else {
                        throw new Exception("Unable to open file");
                    }
                }
                catch(Exception $e){
                    echo 'Error: ' .$e->getMessage();
                }
                ?>
            </div>
            <div class="edit-area" id="dream-edit" style="display: none;">
                <form action="save_about.php" method="post">
                <input type="hidden" name="section" value="dream">
                    <textarea name="dream-text-edit" id="dream-text-edit"><?php
                        $about = fopen("dream.txt", "r");
                        try{
                            if ($about) {
                                while (!feof($about)) {
                                    $line3 = fgets($about);
                                    echo htmlspecialchars($line3);
                                }
                                fclose($about);
                            } else {
                                throw new Exception("Unable to open the file.");
                            }
                        }
                    catch(Exception $e){
                        echo 'Error: ' .$e->getMessage();
                    }
                    ?></textarea>
                    <button type="submit">Save</button>
                </form>
            </div>
            <a href="#about-me" class="edit-btn" id="edit-btn3" onclick="edit('dream')"><img src="img/edit-solid-24.png" alt=""></a></button>
        </div>



    </section>
    <section class="projects" id="projects">
        <div class="heading">
            <h1>PROJECTS</h1>
        </div>
        <div class="carousel">
        <div class="carousel-container">
            <div class="carousel-item">
                <img src="img/login.png" alt="Project 1">
                <h2>Login and registration form</h2>
                <p>A simple login and registration form that uses html, css, javacript, and mysql.</p>
            </div>
            <div class="carousel-item">
                <img src="img/organics.png" alt="Project 2">
                <h2>Organics</h2>
                <p>A simple website with chatbot that uses html, css, and javascript</p>
            </div>
            <div class="carousel-item">
                <img src="img/dodge.png" alt="Project 3">
                <h2>Dodge Tetris</h2>
                <p>A game where you control a character to dodge falling tetrominoes. Made using java and swing</p>
            </div>
            <div class="carousel-item">
                <img src="img/calculator.png" alt="Project 4">
                <h2>Calculator</h2>
                <p>A simple calculator made using java and swing</p>
            </div>
            <div class="carousel-item">
                <img src="img/calendar.png" alt="Project 4">
                <h2>Calendar</h2>
                <p>A simple calendar made using html and css</p>
            </div>
        </div>
        <button class="prev-btn">&#10094;</button>
        <button class="next-btn">&#10095;</button>
    </div>


    </section>

    <section class="skills" id="skills">
        <div class="heading">
            <h1>SKILLS</h1>
        </div>
        
        <div class="skills-container" id="skills">
            <div class="box">
                <div class="box-img" id="java">
                    <img src="img/Java-Logo.png" alt="">
                </div>
                <div class="stars">
                    <i class="bx bxs-star"></i>
                    <i class="bx bxs-star"></i>
                    <i class="bx bxs-star"></i>
                    <i class="bx bxs-star"></i>
                    <i class="bx bxs-star-half"></i>
                </div>
                <h2>JAVA</h2>
            </div>

            <div class="box">
                <div class="box-img">
                    <img src="img/HTML5_badge.png" alt="">
                </div>
                <div class="stars">
                    <i class="bx bxs-star"></i>
                    <i class="bx bxs-star"></i>
                    <i class="bx bxs-star"></i>
                    <i class="bx bxs-star"></i>
                    <i class="bx bxs-star-half"></i>
                </div>
                <h2>HTML</h2>
            </div>
            <div class="box">
                <div class="box-img">
                    <img src="img/logo-css.png" alt="">
                </div>
                <div class="stars">
                    <i class="bx bxs-star"></i>
                    <i class="bx bxs-star"></i>
                    <i class="bx bxs-star"></i>
                    <i class="bx bxs-star"></i>
                    <i class="bx bxs-star-half"></i>
                </div>
                <h2>CSS</h2>
            </div>
            
            <div class="box">
                <div class="box-img">
                    <img src="img/javascript-logo.png" alt="">
                </div>
                <div class="stars">
                    <i class="bx bxs-star"></i>
                    <i class="bx bxs-star"></i>
                    <i class="bx bxs-star"></i>
                    <i class="bx bxs-star"></i>
                    <i class="bx bxs-star-half"></i>
                </div>
                <h2>JAVASCRIPT</h2>
            </div>

            <div class="box">
                <div class="box-img">
                    <img src="img/PHP_logo.png" alt="">
                </div>
                <div class="stars">
                    <i class="bx bxs-star"></i>
                    <i class="bx bxs-star"></i>
                    <i class="bx bxs-star"></i>
                    <i class="bx bxs-star"></i>
                    <i class="bx bxs-star-half"></i>
                </div>
                <h2>PHP</h2>
            </div>
        </div>
    </section>
    <section class="contact" id="contact">
        <div class="social">
            <a href="https://www.facebook.com/mc.celino"><i class="bx bxl-facebook"></i></a>
            <a href="https://www.instagram.com/ign.seri/"><i class="bx bxl-instagram"></i></a>
            <a href="https://t.me/+639814492384"><i class="bx bxl-telegram"></i></a>
            <a href="https://github.com/Seri15"><i class="bx bxl-github"></i></a>
        </div>
        <div class="links">
            <a href="contact_form.html">Contact Us</a>
        </div>
        <p>&#169;All Right Reserved.  </p>
    </section>
    <script>
        var menu = document.querySelector('#menu-icon');
        var navbar = document.querySelector('.navbar');
    
        menu.onclick = () => {
            menu.classList.toggle('bx-x');
            navbar.classList.toggle('active');
        }
    
        window.onscroll = () => {
            menu.classList.remove('bx-x');
            navbar.classList.remove('active');
        }

        function showSelection(selection) {
            var intro = document.querySelector('#intro');
            var info = document.querySelector('#info');
            var educ = document.querySelector('#educ');
            var hob = document.querySelector('#hob');


            switch (selection) {
                case 'intro':
                    if (intro.style.display === 'none') {
                        intro.style.display = 'flex';
                        info.style.display = 'none';
                        educ.style.display = 'none';
                        hob.style.display = 'none';
                    }
                    break;
                
                case 'info':
                    if (info.style.display === 'none') {
                        info.style.display = 'flex';
                        intro.style.display = 'none';
                        educ.style.display = 'none';
                        hob.style.display = 'none';
                    }
                    break;
                
                case 'educ':
                    if (educ.style.display === 'none') {
                        educ.style.display = 'flex';
                        intro.style.display = 'none';
                        info.style.display = 'none';
                        hob.style.display = 'none';
                    }
                    break;

                case 'hob':
                    if (hob.style.display === 'none') {
                        hob.style.display = 'flex';
                        intro.style.display = 'none';
                        info.style.display = 'none';
                        educ.style.display = 'none';
                    }
                    break;
                }
                
        }

        const carouselContainer = document.querySelector('.carousel-container');
        const prevBtn = document.querySelector('.prev-btn');
        const nextBtn = document.querySelector('.next-btn');

        let currentIndex = 0;

        function updateCarousel() {
            const itemWidth = document.querySelector('.carousel-item').clientWidth;
            carouselContainer.style.transform = `translateX(-${currentIndex * itemWidth}px)`;
        }

        nextBtn.addEventListener('click', () => {
            const items = document.querySelectorAll('.carousel-item');
            currentIndex = (currentIndex + 1) % items.length;
            updateCarousel();
        });

        prevBtn.addEventListener('click', () => {
            const items = document.querySelectorAll('.carousel-item');
            currentIndex = (currentIndex - 1 + items.length) % items.length;
            updateCarousel();
        });
        var introEdit = document.querySelector('#intro-edit');
        var infoEdit = document.querySelector('#info-edit');
        var dreamEdit = document.querySelector('#dream-edit');
        function edit(selection){

        var editBtn1 = document.querySelector('#edit-btn1');
        var editBtn2 = document.querySelector('#edit-btn2');
        var editBtn3 = document.querySelector('#edit-btn3');
    
    switch(selection){
        case 'intro':
            if (introEdit.style.display === 'none') {
                introEdit.style.display = 'flex';
                infoEdit.style.display = 'none';
                dreamEdit.style.display = 'none';
                editBtn1.style.display = 'none';
            }
            break;

        case 'info':
            if (infoEdit.style.display === 'none') {
                infoEdit.style.display = 'flex';
                introEdit.style.display = 'none';
                dreamEdit.style.display = 'none';
                editBtn2.style.display = 'none';
            }
            break;

        case 'dream':
            if (dreamEdit.style.display === 'none') {
                dreamEdit.style.display = 'flex';
                introEdit.style.display = 'none';
                infoEdit.style.display = 'none';
                editBtn3.style.display = 'none';
            }
            break;
    }
}

    const saveButtons = document.querySelectorAll('form button[type="submit"]');
    saveButtons.forEach((button) => {
        button.addEventListener('click', function() {
            setTimeout(function() {
                var editBtn1 = document.querySelector('.edit-btn1');
                var editBtn2 = document.querySelector('.edit-btn2');
                var editBtn3 = document.querySelector('.edit-btn3');
                editBtn1.style.display = 'flex';
                editBtn2.style.display = 'flex';
                editBtn3.style.display = 'flex';
            }, 100);
        });
    });
    </script>

</body>
</html>