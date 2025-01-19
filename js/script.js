function windowScroll() {
    const e = document.getElementById("navbar");
    e && (document.body.scrollTop >= 50 || document.documentElement.scrollTop >= 50 ? e.classList.add("nav-sticky") : e.classList.remove("nav-sticky"))
}
window.addEventListener("scroll", windowScroll);

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
    document.getElementById('bar1').style.transform = "rotate(90deg)";
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
// Validation contact model
const form = document.getElementById("ContactFormModal");
const fullname = document.getElementById("name");
const email = document.getElementById("Email");
const phone = document.getElementById("Phone");
const message = document.getElementById("Message");
const submit = document.getElementById("submit");

// Validation Contact Form

const ContactForm = document.getElementById("ContactForm");
const ContactName = document.getElementById("ContactName");
const ContactEmail = document.getElementById("ContactEmail");
const ContactMessage = document.getElementById("ContactMessage");
const ContactSubmit = document.getElementById("ContactSubmit");


// Validation functions
function validateName(name) {
    const nameError = document.getElementById("name-error");
    if (name.value.trim() === "") {
        nameError.textContent = "Name cannot be empty.";
        nameError.style.color = "red";
        return false;
    } else if (name.value.length < 2) {
        nameError.textContent = "Name must be at least 2 characters.";
        nameError.style.color = "red";
        return false;
    } else {
        nameError.textContent = "";
        return true;
    }
}

function validateEmail(email) {
    const emailError = document.getElementById("email-error");
    const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    if (email.value.trim() === "") {
        emailError.textContent = "Email cannot be empty.";
        emailError.style.color = "red";
        return false;
    } else if (!emailPattern.test(email.value)) {
        emailError.textContent = "Invalid email format.";
        emailError.style.color = "red";
        return false;
    } else {
        emailError.textContent = "";
        return true;
    }
}

function validatePhone(phone) {
    const phoneError = document.getElementById("phone-error");
    const phonePattern = /^[0-9]{10}$/;
    if (phone.value.trim() === "") {
        phoneError.textContent = "Phone number cannot be empty.";
        phoneError.style.color = "red";
        return false;
    } else if (!phonePattern.test(phone.value)) {
        phoneError.textContent = "Phone number must be 10 digits.";
        phoneError.style.color = "red";
        return false;
    } else {
        phoneError.textContent = "";
        return true;
    }
}

function validateMessage(message) {
    const messageError = document.getElementById("message-error");
    if (message.value.trim() === "") {
        messageError.textContent = "Message cannot be empty.";
        messageError.style.color = "red";
        return false;
    } else if (message.value.length < 10) {
        messageError.textContent = "Message must be at least 10 characters.";
        messageError.style.color = "red";
        return false;
    } else {
        messageError.textContent = "";
        return true;
    }
}

// Main Validation Function
function validateForm(event) {
    const isNameValid = validateName();
    const isEmailValid = validateEmail();
    const isPhoneValid = validatePhone();
    const isMessageValid = validateMessage();

    const isValid = isNameValid && isEmailValid && isPhoneValid && isMessageValid;
    if (!isValid) {
        submit.disabled = true;
        submit.style.backgroundColor = "red";
        submit.style.cursor = "not-allowed";
        if (event) event.preventDefault();
    } else {
        submit.disabled = false;
        submit.style.backgroundColor = "";
        submit.style.cursor = "pointer";
    }
}


// Add keyup event listeners for real-time validation

fullname.addEventListener("keyup", () => {
    validateName();
    validateForm();

});
email.addEventListener("keyup", () => {
    validateEmail();
    validateForm();

});
phone.addEventListener("keyup", () => {
    validatePhone();
    validateForm();

});
message.addEventListener("keyup", () => {
    validateMessage();
    validateForm();

});

// Add event listener to the submit button
submit.addEventListener("click", validateForm);





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
        link: "clock/Analog/Analog.html"
    },
    {
        image: "clock/Digital/Digital.png",
        name: "Digital Clock",
        description: "A Digital Clock by HTML, CSS and JS",
        link: "clock/Digital/Digital.html"
    },
    {
        image: "tic-toc/Tic-toc.png",
        name: "Tic-Toc-Toe",
        description: "A Tic-Toc-Toe Game by HTML, CSS and JS",
        link: "tic-toc/tictoc.html"
    },
    {
        image: "image/todo.png",
        name: "To-Do App List",
        description: "A To-Do App by HTML, CSS, JS, PHP and MySQL",
        link: "todo/to_do.php"
    },
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

//skill section


const skills = [
    {
        image: "image/c.png",
        name: "C Programming",
        Ex: "1 year Experience"
    },
    {
        image: "image/html.png",
        name: "HTML",
        Ex: "1 Year Experience"
    },
    {
        image: "image/css.png",
        name: "CSS",
        Ex: "1 Year Experience"
    },
    {
        image: "image/js.png",
        name: "JavaScript",
        Ex: "1 Year Experience"
    },
    {
        image: "image/bootstrap.png",
        name: "Bootstrap",
        Ex: "1 Year Experience"
    }
    ,
    {
        image: "image/php.png",
        name: "PHP",
        Ex: "6 Month Experience"
    },
    {
        image: "image/sql.png",
        name: "SQL",
        Ex: "8 Month Experience"
    },
    {
        image: "image/django.png",
        name: "django",
        Ex: "1 Month Experience"
    },
    {
        image: "image/wordpress.png",
        name: "Wordpress",
        Ex: "1 Month Experience"
    },
    {
        image: "image/laravel.png",
        name: "Laravel",
        Ex: "1 Month Experience"
    },
];

const skillList = document.getElementById("skill-list");

skills.forEach(({ image, name, Ex }) => {
    skillList.innerHTML += `
        <div class="skill-card">
                  <img src="${image}" alt="${image}" class="skill-icon">
                  <div>
                      <h6 class="skill-name">${name}</h6>
                      <p class="skill-experience">${Ex}</p>
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
