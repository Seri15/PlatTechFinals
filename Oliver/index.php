<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <title>My Personal Portfolio</title>
</head>
<body>

  <nav id="navbar">
    <div class="logo-container">
      <img src="/Oliver/img/logo 1.jpg" alt="Logo 1" class="logo">
      <img src="/Oliver/img/logo 2.jpg" alt="Logo 2" class="logo">
    </div>
    <ul>
      <li><a href="#home">Home</a></li>
      <li><a href="#about">About Me</a></li>
      <li><a href="#skills">Skills</a></li>
      <li><a href="#projects">Projects</a></li>
      <li><a href="#contact">Contact</a></li>
      <li><a href="updatecontent.php">Edit Content</a></li> 
      <li><a href="view_messages.php">View Contacts</a></li>
    </ul>
  </nav>

  <section id="home" class="full-page">
    <div class="home-content">
      <h1>Welcome to My Portfolio</h1>
      <p>Building the future, one line of code at a time.</p>
    </div>
  </section>

  <section id="about" class="full-page">
    <img src="/Oliver/img/my pic.jpg" alt="Profile Picture">
    <h2>About Me</h2>
    <p><?php echo file_get_contents('about.txt') ?: 'Content is not yet available.'; ?></p>
  </section>

  <section id="skills" class="full-page">
    <h2>Skills</h2>
    <p><?php echo file_get_contents('skills.txt') ?: 'Content is not yet available.'; ?></p>
  </section>

  <section id="projects" class="full-page">
    <h2>My Projects</h2>
    <div class="project-images">
      <div class="project">
        <img src="/Oliver/img/projecct1.jpg" alt="Project 1">
        <div class="project-description-container">
          <p class="project-description">
            This is Project 1. <br>
            This project is an e-commerce website designed to sell organic food products, offering a seamless and intuitive shopping experience. <br>
            The website is crafted with a user-friendly interface, showcasing a wide variety of organic produce, packaged goods, and supplements. 
            Each product is carefully displayed with detailed descriptions availability.
          </p>
        </div>
      </div>

      <div class="project">
        <img src="/Oliver/img/project2.jpg" alt="Project 2">
        <div class="project-description-container">
          <p class="project-description">
            Project 2 is a puzzle game. <br>
            This project is a classic puzzle game developed using Java. The game challenges players with a grid of mixed-up pieces that need to be rearranged into a solved pattern. <br>
            It features an intuitive interface and provides a fun yet challenging experience for players of all ages.
          </p>
        </div>
      </div>
    </div>
  </section>

  <section id="contact" class="full-page">
    <h2>Contact Me</h2>
    <form action="contact.php" method="POST">
      <input type="text" name="name" placeholder="Your Name" required>
      <input type="email" name="email" placeholder="Your Email" required>
      <textarea name="message" placeholder="Your Message" required></textarea>
      <button type="submit">Submit</button>
    </form>
  </section>

</body>
</html>
