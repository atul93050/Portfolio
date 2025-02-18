function windowScroll() {
    const e = document.getElementById("navbar");
    e && (document.body.scrollTop >= 50 || document.documentElement.scrollTop >= 50 ? e.classList.add("nav-sticky") : e.classList.remove("nav-sticky"))
}
window.addEventListener("scroll", windowScroll);



document.querySelectorAll('.anchordefault').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const targetID = this.getAttribute('href').substring(1);
        const targetElement = document.getElementById(targetID);
        window.scrollTo({
            top: targetElement.offsetTop - 70,
            behavior: 'smooth'
        });
    });
});




// animation 

// back to top 
window.addEventListener('scroll', () => {
    const backToTopButton = document.querySelector('.back-to-top');
    const navlist = document.querySelectorAll('.nav-list');
    const contactButton = document.querySelector('.contact-button');
    var bar = document.querySelectorAll('.bar');

    if (window.scrollY > 100) {
        backToTopButton.style.display = 'flex';

        navlist.forEach(item => {
            item.classList.add('anchor-scrolled');
            item.classList.remove('anchordefault');
        });
        bar.forEach(item => {
            item.classList.add('anchor-scrolled');
            item.classList.remove('anchordefault');
        });
        contactButton.classList.remove('outline');
        contactButton.classList.add('fill');
    }
    else {
        backToTopButton.style.display = 'none';
        bar.forEach(item => {
            item.classList.add('anchordefault');
            item.classList.remove('anchor-scrolled');

        });

        navlist.forEach(item => {
            item.classList.add('anchordefault');
            item.classList.remove('anchor-scrolled');
        });
        contactButton.classList.remove('fill');
        contactButton.classList.add('outline');
    }
});

const backToTopButton = document.querySelector('.back-to-top');

backToTopButton.addEventListener('click', (e) => {
    e.preventDefault();
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
});


// toggle menu

const hamburger = document.getElementById('hamburger');
const navMenu = document.getElementById('navMenu');

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


// Contact modal Start

const modal = document.getElementById("ContactModal");
const openModalButton = document.getElementById("Contact-Btn");
const closeModalButton = document.querySelector("#close-model");

// Open the modal
openModalButton.addEventListener("click", () => {
    modal.style.display = "grid";
});

// Close the modal using the close button
closeModalButton.addEventListener("click", () => {
    console.log("Close button clicked");
    modal.style.display = "none";
});

// Close modal if clicked outside of it
window.addEventListener("click", (event) => {
    if (event.target === modal) {
        modal.style.display = "none";
    }
});
document.addEventListener("DOMContentLoaded", function () {
    // First Form (Modal)
    const fullname = document.getElementById("name");
    const email = document.getElementById("Email");
    const phone = document.getElementById("Phone");
    const message = document.getElementById("Message");
    const submit = document.getElementById("submit");

    // Second Form (Contact Form)
    const contactName = document.getElementById("ContactName");
    const contactEmail = document.getElementById("ContactEmail");
    const contactMessage = document.getElementById("ContactMessage");
    const contactSubmit = document.getElementById("ContactSubmit");

    // Validation functions
    function validateName(input, errorId) {
        const nameError = document.getElementById(errorId);
        if (input.value.trim() === "") {
            nameError.textContent = "Name cannot be empty.";
            nameError.style.color = "red";
            return false;
        } else if (input.value.length < 2) {
            nameError.textContent = "Name must be at least 2 characters.";
            nameError.style.color = "red";
            return false;
        } else {
            nameError.textContent = "";
            return true;
        }
    }

    function validateEmail(input, errorId) {
        const emailError = document.getElementById(errorId);
        const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
        if (input.value.trim() === "") {
            emailError.textContent = "Email cannot be empty.";
            emailError.style.color = "red";
            return false;
        } else if (!emailPattern.test(input.value)) {
            emailError.textContent = "Invalid email format.";
            emailError.style.color = "red";
            return false;
        } else {
            emailError.textContent = "";
            return true;
        }
    }

    function validatePhone(input, errorId) {
        const phoneError = document.getElementById(errorId);
        const phonePattern = /^[0-9]{10}$/;
        if (input.value.trim() === "") {
            phoneError.textContent = "Phone number cannot be empty.";
            phoneError.style.color = "red";
            return false;
        } else if (!phonePattern.test(input.value)) {
            phoneError.textContent = "Phone number must be 10 digits.";
            phoneError.style.color = "red";
            return false;
        } else {
            phoneError.textContent = "";
            return true;
        }
    }

    function validateMessage(input, errorId) {
        const messageError = document.getElementById(errorId);
        if (input.value.trim() === "") {
            messageError.textContent = "Message cannot be empty.";
            messageError.style.color = "red";
            return false;
        } else if (input.value.length < 10) {
            messageError.textContent = "Message must be at least 10 characters.";
            messageError.style.color = "red";
            return false;
        } else {
            messageError.textContent = "";
            return true;
        }
    }

    // Function to check form validity and enable/disable submit button
    function checkFormValidity(formType) {
        if (formType === "modal") {
            if (validateName(fullname, "name-error") && validateEmail(email, "email-error") && validatePhone(phone, "phone-error") && validateMessage(message, "message-error")) {
                submit.disabled = false;
                submit.style.backgroundColor = "";
                submit.style.cursor = "pointer";
            } else {
                submit.disabled = true;
                submit.style.backgroundColor = "red";
                submit.style.cursor = "not-allowed";
            }
        } else if (formType === "contact") {
            if (validateName(contactName, "contact-name-error") && validateEmail(contactEmail, "contact-email-error") && validateMessage(contactMessage, "contact-message-error")) {
                contactSubmit.disabled = false;
                contactSubmit.style.backgroundColor = "";
                contactSubmit.style.cursor = "pointer";
            } else {
                contactSubmit.disabled = true;
                contactSubmit.style.backgroundColor = "red";
                contactSubmit.style.cursor = "not-allowed";
            }
        }
    }

    // Add Blur Event Listeners (Validation when user leaves the field)
    fullname?.addEventListener("blur", () => validateName(fullname, "name-error"));
    email?.addEventListener("blur", () => validateEmail(email, "email-error"));
    phone?.addEventListener("blur", () => validatePhone(phone, "phone-error"));
    message?.addEventListener("blur", () => validateMessage(message, "message-error"));

    contactName?.addEventListener("blur", () => validateName(contactName, "contact-name-error"));
    contactEmail?.addEventListener("blur", () => validateEmail(contactEmail, "contact-email-error"));
    contactMessage?.addEventListener("blur", () => validateMessage(contactMessage, "contact-message-error"));

    // Add Focusout Event Listener to check form validity
    fullname?.addEventListener("focusout", () => checkFormValidity("modal"));
    email?.addEventListener("focusout", () => checkFormValidity("modal"));
    phone?.addEventListener("focusout", () => checkFormValidity("modal"));
    message?.addEventListener("focusout", () => checkFormValidity("modal"));

    contactName?.addEventListener("focusout", () => checkFormValidity("contact"));
    contactEmail?.addEventListener("focusout", () => checkFormValidity("contact"));
    contactMessage?.addEventListener("focusout", () => checkFormValidity("contact"));

    // Prevent Form Submission if Validation Fails
    document.getElementById("ContactForm")?.addEventListener("submit", function (event) {
        if (!validateName(contactName, "contact-name-error") || !validateEmail(contactEmail, "contact-email-error") || !validateMessage(contactMessage, "contact-message-error")) {
            event.preventDefault();
        }
        else {

            document.getElementById("ContactForm").addEventListener("submit", function (e) {
                e.preventDefault();

                let formData = new FormData(this);

                fetch("db/message.php", {
                    method: "POST",
                    body: formData
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === "success") {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: data.message
                            });
                            document.getElementById("ContactForm").reset();
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: data.message
                            });
                        }
                    })
                    .catch(error => {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'An error occurred. Please try again later.'
                        });
                        console.error("Error:", error);
                    });
            });
        }
    });
});







//App and Games

const project = [

    {
        image: "Calculator/Calculator.png",
        name: "Calculator",
        description: "A Basic Calculator by HTML, CSS and JS",
        link: "Calculator/calculator.php"
    },
    {
        image: "clock/Analog/Analog.png",
        name: "Analog Clock",
        description: "A Analog Clock by HTML, CSS and JS",
        link: "clock/Analog/Analog.php"
    },
    {
        image: "clock/Digital/Digital.png",
        name: "Digital Clock",
        description: "A Digital Clock by HTML, CSS and JS",
        link: "clock/Digital/Digital.php"
    },
    // {
    //     image: "tic-toc/Tic-toc.png",
    //     name: "Tic-Toc-Toe",
    //     description: "A Tic-Toc-Toe Game by HTML, CSS and JS",
    //     link: "tic-toc/tictoc.html"
    // },
    {
        image: "image/todo.png",
        name: "To-Do App List",
        description: "A To-Do App by HTML, CSS, JS, PHP and MySQL",
        link: "todo/to_do.php"
    },
    {
        image : "image/roll-dice.png",
        name : "Roll Dice",
        description : "A Roll Dice Game by HTML, CSS and JS",
        link : "Assignment/rolling_dice.php"
    },
    {
        image : "image/name-game.png",
        name : "Name Game",
        description : "A Name Game by HTML, CSS and JS",
        link : "Assignment/name-game.php"
    },
    {
        image : "image/mouse-move.png",
        name : "Mouse Move",
        description : "A Mouse Move Game by HTML, CSS and JS",
        link : "MouseMove/mouse.php"
    }
];

const project_cards = document.getElementById("project-cards");

project.forEach(({ image, name, description, link }) => {
    project_cards.innerHTML += `
       
        <div class="container-card">
                <div class="wrapper">
                    <div class="banner-image" style="background-image: url('${image}');"> </div>
                     <h1>${name}</h1>
                    <p>${description}</p>
                 </div>
             <div class="button-wrapper"> 
                    <a class="btn outline">View Code</a>
                     <a class="btn fill" href="${link}">View</a>
            </div>
          
       </div>
    `;
});

// Education section
const Education = [
    {
        color: "red",
        degree: "Diploma in Information Technology",
        college: "Hewett Polytechnic Lucknow",
        year: "2022 - Present",
        description: "Pursuing a comprehensive diploma program focused on core IT skills, including programming, networking, and database management."
    },
    {
        color: "#ff6f00",
        degree: "Intermediate (12<sup>th</sup>  PCM)",
        college: "Adarsh Inter College, Ghazipur",
        year: "2020 - 2021",
        description: "Completed higher secondary education with a focus on science subjects, including Physics, Chemistry, and Mathematics."
    },
    {
        color: "blue",
        degree: "High School (10<sup>th</sup>)",
        college: "Adarsh Inter College, Ghazipur",
        year: "2018 - 2019",
        description: "Acquired foundational knowledge in core subjects like Mathematics, Science, and English, preparing for further academic growth."
    },
];

const Educationlist = document.getElementById("Education-List");

Education.forEach(({ color, degree, college, year, description }) => {
    Educationlist.innerHTML += `
    <div class="timeline-item" style="--accent:${color}">
       
        <div class="timeline-content">
            <h2 style="color:${color};"> ${college}</h2>
            <p><strong>${degree}</strong> | ${year}</p>
            <p>${description}</p>
        </div>
    </div>
    `;
});


// Experience section Start

const Experience = [


    {
        color: "blue",
        title: "PHP Web Developer Intern",
        company: "Kryotek Softwares",
        duration: "Jul 2024 - Present",
        description: "Currently working as a PHP Web Development Intern. Enhancing backend development skills, managing databases, and creating dynamic, user-friendly web applications.",
        skills: ["PHP", "Backend Development", "Database Management", "Responsive Web Design"]
    },
    {
        color: "#ff6f00",
        title: "Summer Trainee in PHP Web Development",
        company: "SRKinfoDigit Pvt. Ltd.",
        duration: "Aug 2024 - Sep 2024",
        description: "Gained hands-on experience in PHP web development. Learned core PHP, MySQL integration, and implemented CRUD operations for dynamic and interactive websites.",
        skills: ["PHP", "MySQL", "CRUD Operations", "Web Development"]
    },
    {
        color: "red",
        title: "Summer Trainee in Python with Django",
        company: "Mecatredz Technology Pvt. Ltd., Lucknow",
        duration: "Jul 2023 - Sep 2023",
        description: "Completed summer training focused on Python with Django framework. Developed web applications with an emphasis on backend development and integration of APIs.",
        skills: ["Python", "Django", "API Integration", "Backend Development"]
    },
];

const Experiencelist = document.getElementById("Experience-List");

Experience.forEach(({ color, title, company, duration, description, skills }) => {
    Experiencelist.innerHTML += `
        <div class="timeline-item" style="--accent:${color}">
           
            <div class="timeline-content">
                            <h2 style="color: ${color};">${title}</h2>

                <p> <strong>${company}</strong/> | ${duration}</p>
                <p>${description}</p>
                <ul>
                    ${skills.map(skill => `<li>${skill}</li>`).join("")}
                </ul>
            </div>
        </div>
    `;
});


document.addEventListener("DOMContentLoaded", () => {
    const filterButtons = document.querySelectorAll(".filter-options li");
    const projectItems = document.querySelectorAll(".picture-item");

    // Function to filter projects based on category
    function filterProjects(category) {
        projectItems.forEach(item => {
            const itemCategory = item.getAttribute("data-category"); // Get category from data-category attribute
            if (category === "all" || itemCategory === category) {
                item.classList.add("visible");
            } else {
                item.classList.remove("visible");
            }
        });
    }

    // Function to set active state for the selected filter button
    function setActiveButton(activeButton) {
        filterButtons.forEach(button => button.classList.remove("active"));
        activeButton.classList.add("active");
    }

    // Add click event listeners to all filter buttons
    filterButtons.forEach(button => {
        button.addEventListener("click", () => {
            const category = button.id.replace("filter-", ""); // Extract category from ID
            setActiveButton(button);
            filterProjects(category);
        });
    });

    // Show all projects by default on page load
    filterProjects("all");
});
