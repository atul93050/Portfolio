<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="title" content="Expense Tracker Digital Ledger Management">
    <meta name="description"
        content="Manage your business transactions and financial records with our optimized expense tracker interface.">
    <meta name="robots" content="index, follow">
    <meta name="author" content="Atul-Verma">
    <meta name="keywords"
        content="Khata Book, Digital Ledger, Expense Tracker, Business Transactions, Financial Records">
    <meta property="og:title" content="Expense Tracker | Khata Book Digital Ledger Management">
    <meta property="og:description"
        content="Manage your business transactions and financial records with our optimized expense tracker interface.">
    <meta property="og:image" content="your-image-url.jpg">
    <meta property="og:url" content="your-page-url">
    <meta name="twitter:card" content="summary_large_image">
    <title>Expense Tracker</title>
    <link rel="stylesheet" href="css/landing-page.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


</head>

<body>
    <!-- Navbar HTML -->
    <nav class="navbar">
        <div class="nav-container">
            <a href="#" class="logo">
                <div class="logo-icon">$</div>
                ExpenTrack
            </a>

            <div class="hamburger" id="hamburger">
                <div class="bar" id="bar1"></div>
                <div class="bar " id="bar2"></div>
                <div class="bar" id="bar3"></div>
            </div>

            <div class="nav-links">
                <a href="" class="nav-link">Dashboard</a>
                <a href="" class="nav-link">Analytics</a>
                <a href="" class="nav-link">Reports</a>
                <a href="" class="nav-link">Settings</a>
                <a href="login.php" class="cta-button">Get Started</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-container">
            <div class="hero-content">
                <h1 class="hero-title">
                    Take Control of Your <span>Finances</span>
                </h1>
                <p class="hero-subtitle">
                    Track expenses, set budgets, and achieve financial goals with our intuitive
                    expense tracking platform. Start managing your money smarter today!
                </p>

                <div class="cta-buttons">
                    <a href="login.php" class="primary-cta">Get Started Free</a>
                    <a href="#" class="secondary-cta">Watch Demo</a>
                </div>

                <div class="stats-container">
                    <div class="stat-card">
                        <div class="stat-number">50K+</div>
                        <div class="stat-text">Active Users</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number">4.9★</div>
                        <div class="stat-text">App Rating</div>
                    </div>
                </div>
            </div>

            <div class="hero-illustration">
                <img src="icon/hero-img.jpg" alt="Expense Tracker Dashboard" class="dashboard-mockup">
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features">
        <div class="container">
            <div class="section-header">
                <h2>Powerful Features for Smart Money Management</h2>
                <p>Everything you need to take control of your finances</p>
            </div>

            <div class="features-grid">
                <!-- Feature Card 1 -->
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-wallet"></i>
                    </div>
                    <h3>Expense Tracking</h3>
                    <p>Real-time tracking of all your expenses with automatic categorization</p>
                    <div class="feature-highlight">
                        <span>AI-Powered Insights</span>
                    </div>
                </div>

                <!-- Feature Card 2 -->
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-chart-pie"></i>
                    </div>
                    <h3>Budget Planning</h3>
                    <p>Create custom budgets and get alerts when approaching limits</p>
                    <div class="feature-highlight">
                        <span>Smart Alerts</span>
                    </div>
                </div>

                <!-- Feature Card 3 -->
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-file-invoice-dollar"></i>
                    </div>
                    <h3>Detailed Reports</h3>
                    <p>Generate comprehensive financial reports in multiple formats</p>
                    <div class="feature-highlight">
                        <span>PDF/Excel Export</span>
                    </div>
                </div>

                <!-- Feature Card 4 -->
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <h3>Multi-Device Sync</h3>
                    <p>Access your data anywhere with seamless cloud synchronization</p>
                    <div class="feature-highlight">
                        <span>24/7 Access</span>
                    </div>
                </div>

                <!-- Feature Card 5 -->
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3>Bank-Level Security</h3>
                    <p>256-bit encryption ensures your financial data stays protected</p>
                    <div class="feature-highlight">
                        <span>SSL Secure</span>
                    </div>
                </div>

                <!-- Feature Card 6 -->
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-tags"></i>
                    </div>
                    <h3>Smart Categories</h3>
                    <p>Automatically categorize expenses using machine learning</p>
                    <div class="feature-highlight">
                        <span>AI Technology</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="feedback-section">
        <!-- Feedback Form -->
        <div class="feedback-form">
            <h2 class="form-title">🌟 We Value Your Feedback!</h2>

            <div class="rating-stars">
                <span class="star" data-value="1">★</span>
                <span class="star" data-value="2">★</span>
                <span class="star" data-value="3">★</span>
                <span class="star" data-value="4">★</span>
                <span class="star" data-value="5">★</span>
            </div>

            <select class="feedback-input" id="feedbackType">
                <option>Select Feedback Type</option>
                <option>Bug Report</option>
                <option>Feature Request</option>
                <option>General Feedback</option>
            </select>

            <textarea class="feedback-input" id="feedbackMessage" rows="5"
                placeholder="Share your thoughts..."></textarea>

            <button class="submit-btn" id="SubmitFeedback">Submit Feedback</button>
        </div>

        <!-- Testimonials -->
        <div class="testimonials">
            <h3>What Our Users Say</h3>

            <div class="testimonial-card">
                <p class="testimonial-text">
                    "This expense tracker transformed how I manage my budget!"
                </p>
                <div class="user-rating">★★★★★</div>
                <small>- Sarah J.</small>
            </div>


        </div>
    </section>

    <!-- Footer Section -->
    <footer class="footer">
        <div class="footer-container">
            <!-- Company Info -->
            <div class="footer-section">
                <h3>Expense Tracker</h3>
                <p>Take control of your finances with our intuitive expense tracking solution.</p>
                <div class="social-links">
                    <a href="#" aria-label="Twitter"><ion-icon name="logo-twitter"></ion-icon></a>
                    <a href="#" aria-label="Facebook"><ion-icon name="logo-facebook"></ion-icon></a>
                    <a href="#" aria-label="Instagram"><ion-icon name="logo-instagram"></ion-icon></a>
                    <a href="#" aria-label="LinkedIn"><ion-icon name="logo-linkedin"></ion-icon></a>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="footer-section">
                <h3>Quick Links</h3>
                <ul class="footer-links">
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Features</a></li>
                    <li><a href="#">Pricing</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Support</a></li>
                </ul>
            </div>

            <!-- Resources -->
            <div class="footer-section">
                <h3>Resources</h3>
                <ul class="footer-links">
                    <li><a href="#">Documentation</a></li>
                    <li><a href="#">Guides & Tutorials</a></li>
                    <li><a href="#">API Reference</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms of Service</a></li>
                </ul>
            </div>

            <!-- Newsletter -->
            <div class="footer-section">
                <h3>Newsletter</h3>
                <p>Subscribe to get financial tips and updates</p>
                <form class="newsletter-form">
                    <input type="email" class="newsletter-input" placeholder="Enter your email" required>
                    <button type="submit" class="newsletter-btn">Subscribe</button>
                </form>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; 2023 Expense Tracker. All rights reserved.</p>
            <p>Made with ♥ by Atul Verma</p>
        </div>
    </footer>
    <div class="loader-container" id="loader">
        <span class="loader"></span>
    </div>








    <script>

        // toggle menu

        const hamburger = document.getElementById('hamburger');
        const navMenu = document.querySelector('.nav-links');

        hamburger.addEventListener('click', () => {
            navMenu.classList.toggle('active');

            const bar1 = document.getElementById('bar1');
            const bar2 = document.getElementById('bar2');
            const bar3 = document.getElementById('bar3');

            if (navMenu.classList.contains('active')) {
                bar1.style.transform = "rotate(45deg)";
                bar1.style.transformOrigin = "top left";
                bar2.style.opacity = "0";
                bar3.style.transform = "rotate(-45deg)";
                bar3.style.transformOrigin = "bottom left";
            } else {
                bar1.style.transform = "rotate(0)";
                bar1.style.transformOrigin = "initial";
                bar2.style.opacity = "1";
                bar3.style.transform = "rotate(0)";
                bar3.style.transformOrigin = "initial";
            }
        });


        // Theme Toggle
        // document.querySelector('.theme-toggle').addEventListener('click', () => {
        //     document.body.classList.toggle('dark-theme');
        //     const icon = document.querySelector('.theme-toggle i');
        //     icon.classList.toggle('fa-moon');
        //     icon.classList.toggle('fa-sun');
        // });

        // Star Rating Interaction
        let selectedRating = 0;
        const star = document.querySelectorAll('.star');
        star.forEach(star => {
            star.addEventListener('click', function () {
                selectedRating = this.getAttribute("data-value");
                document.querySelectorAll('.star').forEach(star => {
                    star.classList.remove('selected');
                });
            });


        });




        // Loader
        window.addEventListener('DOMContentLoaded', (event) => {
            const loader = document.getElementById('loader');

            window.addEventListener('load', () => {
                setTimeout(() => {
                    loader.classList.add('hidden');
                }, 1000); // 1 second delay for demo
            });
        });
    </script>
</body>

</html>