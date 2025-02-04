<?php
include("db/session.php");
SessionStart();
include("db/insertdata.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = trim($_POST["name"]) ?? null;
  $email = trim($_POST["Email"]) ?? null;
  $phone = trim($_POST["Phone"]) ?? null;
  $message = trim($_POST["Message"]) ?? null;
  $rememberMe = isset($_POST["rememberMe"]) ? 1 : 0;

  insertData($name, $email, $phone, $message, $rememberMe);
}

$end_date = new DateTime();



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Atul Verma - Web Developer Portfolio</title>
  <meta name="description"
    content="Welcome to my portfolio! I am Atul Verma, a skilled web developer specializing in creating modern and responsive websites. Explore my projects and contact me for collaboration.">
  <meta name="author" content="Atul Verma">
  <meta name="keywords"
    content="web developer, portfolio, Laravel developer, PHP developer, projects, web design, freelance">
  <meta property="og:title" content="Atul Verma - Web Developer Portfolio">
  <meta property="og:description"
    content="Check out my portfolio showcasing modern, responsive websites and innovative projects.">
  <!-- <meta property="og:image" content="https://yourwebsite.com/path-to-image.jpg"> -->
  <meta property="og:url" content="https://atul-verma.kryotek.in">
  <meta property="og:type" content="website">
  <meta property="og:locale" content="en_US">
  <link rel="icon" type="image/png" sizes="32x32" href="image/atul.png">

  <link rel="canonical" href="https://atul-verma.kryotek.in">

  <link rel="stylesheet" href="css/style.css?v=<?php echo filemtime('css/style.css'); ?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
  <meta http-equiv="Pragma" content="no-cache">
  <meta http-equiv="Expires" content="0">
</head>

<body>
  <header>

    <nav class="navbar" id="navbar">
      <div class="logo">
        <a href=""><img src="image/atul.png" alt="Atul Verma logo"></a>
      </div>
      <div class="nav-menu" id="navMenu">
        <a href="/Home" class="nav-list  anchordefault">Home</a>
        <a href="#About-me" class="nav-list  anchordefault">About</a>
        <a href="#Education-Experience" class="nav-list  anchordefault">Education</a>
        <a href="#projects" class="nav-list anchordefault">Projects</a>
        <a href="#Education-Experience" class="nav-list anchordefault">Experience</a>

        <div class="contact-button outline" id="Contact-Btn">
          <a href=""><i class="fa-solid fa-feather-pointed"></i> Contact</a>

        </div>

        <!-- Contact Modal Start  -->
        <div id="ContactModal" class="modal">
          <div class="modal-content">
            <span class="close-model" id="close-model">&times;</span>
            <h2>Contact Me</h2>
            <form id="ContactFormModal" method="POST" action="index.php">
              <div class="form-group">
                <label class="label" for="name">Name :</label>
                <input class="input" type="text" id="name" name="name" placeholder="Enter your Name">
                <div class="error" id="name-error"></div>
              </div>


              <div class="form-group">
                <label class="label" for="Email">Email :</label>
                <input class="input" type="text" id="Email" name="Email" placeholder="Email">
                <div class="error" id="email-error"></div>
              </div>
              <div class="form-group">
                <label class="label" for="Phone">Phone :</label>
                <input class="input" type="text" id="Phone" name="Phone" placeholder="Phone Number">
                <div class="error" id="phone-error"></div>
              </div>
              <div class="form-group">
                <label class="label" for="Message">Message :</label>
                <textarea class="input textarea" id="Message" name="Message" placeholder="Message">
                  </textarea>
                <div class="error" id="message-error"></div>
              </div>

              <div class="remember-me">
                <input type="checkbox" id="rememberMe" name="rememberMe">
                <label for="rememberMe">Remember Me</label>
              </div>

              <button type="submit" id="submit">Submit</button>

            </form>
          </div>
        </div>
        <!-- Contact Modal End -->

      </div>
      <div class="hamburger" id="hamburger">
        <div class="bar anchordefault" id="bar1"></div>
        <div class="bar anchordefault" id="bar2"></div>
        <div class="bar anchordefault" id="bar3"></div>
      </div>

    </nav>
    <section class="banner">
      <div class="container">

        <span class="iam">Hi, I'm</span>
        <h1><span class="highlight-name">Atul Verma</span></h1>
        <h2 class="rotating-text">
          <span>PHP Developer</span>
          <span>Web Designer</span>
          <span>Software Engineer</span>
        </h2>
        <p>Building scalable and efficient web applications with modern technologies.</p>
        <div class="hero-buttons">
          <a class="fill" href="#projects">View Projects</a>
          <a class="outline" href="#contact">Hire Me</a>
        </div>
      </div>


    </section>

  </header>
  <main>
    <section id="About-me" class="personal-details-section">
      <div class="personal-details-container">
        <div class="details-row">
          <div class="photo-container">


          </div>
          <div class="personal-info">
            <h1 class="section-title">Personal Details</h1>
            <p class="info-description">
              Hi, my name is <span class="highlight">Atul Verma</span>.
              I am a web developer currently working as a PHP Developer Intern at Kryotek Software since May 2024. I
              have a strong background in computer science and a diploma in Information Technology. I’ve worked on
              projects like a travel website using Python with Django, a expense track system website using PHP with
              MySQL and I’m passionate about learning new technologies and improving my skills.

              I enjoy solving problems, building websites, and creating useful tools. I am eager to grow as a software
              engineer and contribute to impactful projects.
            </p>
            <div class="personal-info-details">
              <p><span class="detail-label">Name:</span> Atul Verma</p>
              <p><span class="detail-label">Date of birth:</span> 10 Feb 2004</p>
              <p><span class="detail-label">Nationality:</span> India</p>
              <p><span class="detail-label">Current Location:</span> Lucknow, India</p>
              <p><span class="detail-label">Email:</span> <a href="mailto:atul800498@gmail.com">atul800498@gmail.com</a>
              </p>
              <p><span class="detail-label">Phone:</span> <a href="tel:+919305089318">+91 9305089318</a></p>
            </div>
            <div class="social-icons">
              <a href="#" class="social-icon github" aria-label="Github">
                <i class="fab fa-github"></i>
              </a>
              <a href="https://wa.me/919305089318?text=Hi,%20I%20would%20like%20to%20know%20more%20about%20your%20services!"
                class="social-icon whatsapp" aria-label="Whatsapp">
                <i class="fab fa-whatsapp"></i>
              </a>
              <a href="#" class="social-icon twitter" aria-label="Twitter">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon linkedin" aria-label="Linkedin">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
            <button><a class="fill" href="" id="Contact-Btn">Contact Me</a></button> <button><a class="outline"
                href="documents/Resume.pdf">RESUME</a></button>
          </div>
        </div>
        <!-- Skills Section Start-->
        <div class="skills-container">
          <!-- Skills will be loaded here -->
          <?php require "includes/skilllist.php" ?>
        </div>
        <!-- Skills Section End-->
      </div>
    </section>




    <!-- apps and games section start -->
    <section id="Apps-Games">
      <h1 class="heading">My Apps and Games</h1>
      <div id="project-cards">
        <!-- App and Games will be loaded here -->
      </div>

    </section>
    <!-- apps and games section end -->


    <!-- Project section Start -->


    <section class="section" id="projects">
      <h1 class="heading">My Projects</h1>
      <div class="container-project">
        <div class="filters-group">
          <ul class="filter-options">
            <li id="filter-all" class="active">All</li>
            <li id="filter-c">C</li>
            <li id="filter-html">Html</li>
            <li id="filter-js">JS</li>
            <li id="filter-php">PHP</li>
          </ul>
        </div>
        <div class="row" id="grid">
          <div class="picture-item" data-category="php">
            <div class="card">
              <img src="image/EMS.jpg" alt="Expense Tracker">
              <div class="card-body">
                <h5>Expense Tracker Management</h5>
                <p><strong>Description:</strong> A web application to track daily expenses with user authentication.</p>
                <ul>
                  <li>Login System</li>
                  <li>Payment Gateway Integration</li>
                  <li>Expense Categories</li>
                </ul>
                <p class="project-link">
                  Live Demo: <a href="Khata_Book/index.php" target="_blank" rel="noopener noreferrer">Visit Project
                    &#8599;</a>
                </p>
                <p class="project-link">
                  Source Code: <a href="https://github.com/atul93050/Portfolio/tree/main/Khata_Book" target="_blank"
                    rel="noopener noreferrer">View Source
                    Code &#8599;</a>
                </p>
              </div>
            </div>
          </div>
          <div class="picture-item" data-category="c">
            <div class="card">
              <img src="image/BMS.jpg" alt="BMS">
              <div class="card-body">
                <h5>Bank Management System</h5>
                <p><strong>Description:</strong> A console-based banking management system developed in C.</p>
                <ul>
                  <li>Account Creation and User Login</li>
                  <li>Deposit, Withdraw, and Check Balance</li>
                  <li>Money Transfer Between Accounts</li>
                  <li>Data Persistence through File Handling</li>
                </ul>
                <p class="project-link">
                  Source Code: <a
                    href="https://github.com/atul93050/C-Projects/blob/35d6dae0e52f1db03de4ebb30d4e2083f027e226/BankManagementSystem.c"
                    target="_blank" rel="noopener noreferrer">View Source Code &#8599;</a>
                </p>
              </div>

            </div>
          </div>
          <div class="picture-item" data-category="c">
            <div class="card">
              <img src="image/FMS.jpg" alt="Food Order Management">
              <div class="card-body">
                <h5>Food Order Management System</h5>
                <p>
                  <strong>Description:</strong> A console-based food order management system developed in C.
                </p>
                <ul>
                  <li>Add, Update, and Delete Options</li>

                  <li>Real-Time Bill Calculation</li>
                  <li>Order History and Summary Reports</li>
                  <li>Data Persistence through File Handling</li>
                </ul>
                <p class="project-link">
                  Source Code: <a
                    href="https://github.com/atul93050/C-Projects/blob/9b91db74fb0615401949b004b0366bee08119d69/FoodOrderManagementSystem.c"
                    target="_blank" rel="noopener noreferrer">View Source Code &#8599;</a>
                </p>
              </div>

            </div>
          </div>

        </div>
      </div>
    </section>
    <!-- Project section End -->


    <!-- Education Section Start -->
    <section id="Education-Experience">
      <h1 class="heading">Education & Experience</h1>
      <div class="container">
        <div class="education-container">
          <h3>Education</h3>

          <div class="timeline-container" id="Education-List">

            <!-- content will be Loaded Here through js-->

          </div>

        </div>
        <div class="experience-container">
          <h3>Experience</h3>
          <div class="timeline-container" id="Experience-List">

            <!-- content will be Loaded Here through js -->

          </div>
        </div>
      </div>
    </section>
    <!-- Education Section End -->

  </main>
  <!-- Contact Section Start-->
  <section class="contact-section">
    <div class="container">
      <div class="contact-details">
        <h2>Drop me a message</h2>
        <p>Got a question or want to get in touch? Send me a message, and I'll get back to you as soon as possible!</p>

        <div class="contact-item">
          <i class="fas fa-phone-alt"></i>
          <p><a href="tel:9305089318">+91 9305089318</a></p>
        </div>

        <div class="contact-item">
          <i class="fas fa-envelope"></i>
          <p><a href="mailto:atul800498@gmail.com">atul800498@gmail.com</a></p>
        </div>

        <div class="contact-item">
          <i class="fas fa-map-marker-alt"></i>
          <p>Amari gate, Tirchhi road, Dullahapur, Ghazipur, 275202, Uttar Pradesh</p>
        </div>


      </div>

      <div class="contact-form">
        <h3>Contact Us</h3>
        <form action="db/message.php" method="POST" id="ContactForm">
          <input type="text" id="ContactName" name="name" placeholder="Your Name" required>
          <span id="contact-name-error" class="error-message"></span>

          <input type="email" id="ContactEmail" name="email" placeholder="Your Email" required>
          <span id="contact-email-error" class="error-message"></span>

          <textarea name="message" id="ContactMessage" placeholder="Your Message" rows="5" required></textarea>
          <span id="contact-message-error" class="error-message"></span>

          <button type="submit" id="ContactSubmit" class="submit-button">Send Message</button>
        </form>

      </div>
    </div>
  </section>
  <!-- Contact Section End-->

  <!-- Footer Section Start -->
  <footer class="footer">
    <section class="social-media">
      <div class="social-media-left">
        <span>Stay connected with me on social networks:</span>
      </div>
      <div class="social-media-right">
        <a href="https://www.facebook.com/atul.verma.1" class="social-icon" target="_blank"><i
            class="fab fa-facebook-f"></i></a>
        <a href="https://twitter.com/atul_verma" class="social-icon" target="_blank"><i class="fab fa-twitter"></i></a>
        <a href="https://plus.google.com/atul.verma" class="social-icon" target="_blank"><i
            class="fab fa-google"></i></a>
        <a href="https://www.instagram.com/atul_verma" class="social-icon" target="_blank"><i
            class="fab fa-instagram"></i></a>
        <a href="https://www.linkedin.com/in/atul-verma930" class="social-icon" target="_blank"><i
            class="fab fa-linkedin"></i></a>
        <a href="https://github.com/atul93050" class="social-icon" target="_blank"><i class="fab fa-github"></i></a>
      </div>
    </section>

    <section class="footer-links">
      <div class="footer-container">

        <div class="footer-column">
          <h6 class="footer-title">About Us</h6>
          <hr class="footer-divider">
          <p>
            We are a tech-focused company aiming to provide software solutions that make your business run smoothly.
            Founded by Atul Verma, we specialize in web development, PHP programming, and providing IT consulting
            services.
          </p>
        </div>

        <div class="footer-column">
          <h6 class="footer-title">Our Services</h6>
          <hr class="footer-divider">
          <p><a href="/web-development" class="footer-link">Web Development</a></p>
          <p><a href="/seo-services" class="footer-link">SEO Services</a></p>
          <p><a href="/mobile-app-development" class="footer-link">Mobile App Development</a></p>
          <p><a href="/digital-marketing" class="footer-link">Digital Marketing</a></p>
        </div>

        <div class="footer-column">
          <h6 class="footer-title">Useful Links</h6>
          <hr class="footer-divider">
          <p><a href="/about-us" class="footer-link">About Us</a></p>
          <p><a href="/contact-us" class="footer-link">Contact Us</a></p>
          <p><a href="/terms" class="footer-link">Terms & Conditions</a></p>
          <p><a href="/privacy-policy" class="footer-link">Privacy Policy</a></p>
        </div>


        <div class="footer-column">
          <h6 class="footer-title">Contact</h6>
          <hr class="footer-divider">

          <div class="footer-contact-item">
            <i class="fas fa-home footer-icon"></i>
            <p class="footer-text">Amari Gate, Tirchhi Road, Dullahapur, Ghazipur, Uttar Pradesh, 275202</p>
          </div>

          <div class="footer-contact-item">
            <i class="fas fa-envelope footer-icon"></i>
            <p class="footer-text">
              <a href="mailto:atul800498@gmail.com" class="footer-link">atul800498@gmail.com</a>
            </p>
          </div>

          <div class="footer-contact-item">
            <i class="fas fa-phone footer-icon"></i>
            <p class="footer-text">
              <a href="tel:+919305089318" class="footer-link">+91 9305089318</a>
            </p>
          </div>
        </div>

      </div>
    </section>

    <!-- Copyright -->
    <section class="footer-copyright">
      <p>© 2024. All Rights Reserved | Designed by <a href="/Home" class="footer-copyright-link">Atul Verma</a></p>
    </section>
  </footer>
  <!-- Footer Section End-->




  <!-- Back to Top Start -->
  <a href="#" class="back-to-top">
    <img src="image/atul.png" alt="atul logo" srcset="" height="30px">
  </a>
  <!-- Back to Top End -->


  <!-- Main Js -->
  <script src="js/script.js?v=<?php echo filemtime('js/script.js'); ?>"></script>

</body>

</html>