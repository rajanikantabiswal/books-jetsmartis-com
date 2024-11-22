


const sidebar = document.querySelector("aside");
const maxSidebar = document.querySelector(".max")
const miniSidebar = document.querySelector(".mini")
const roundout = document.querySelector(".roundout")
const maxToolbar = document.querySelector(".max-toolbar")
const logo = document.querySelector('.logo')
const content = document.querySelector('.content')
const moon = document.querySelector(".moon")
const sun = document.querySelector(".sun")

function setDark(val) {
    if (val === "dark") {
        document.documentElement.classList.add('dark')
        moon.classList.add("hidden")
        sun.classList.remove("hidden")
    } else {
        document.documentElement.classList.remove('dark')
        sun.classList.add("hidden")
        moon.classList.remove("hidden")
    }
}

function openNav() {
    if (sidebar.classList.contains('-translate-x-48')) {
        // max sidebar 
        sidebar.classList.remove("-translate-x-48")
        sidebar.classList.add("translate-x-none")
        maxSidebar.classList.remove("hidden")
        maxSidebar.classList.add("flex")
        miniSidebar.classList.remove("flex")
        miniSidebar.classList.add("hidden")
        maxToolbar.classList.add("translate-x-0")
        maxToolbar.classList.remove("translate-x-24", "scale-x-0")
        logo.classList.remove("ml-12")
        content.classList.remove("ml-12")
        content.classList.add("ml-12", "md:ml-60")
    } else {
        // mini sidebar
        sidebar.classList.add("-translate-x-48")
        sidebar.classList.remove("translate-x-none")
        maxSidebar.classList.add("hidden")
        maxSidebar.classList.remove("flex")
        miniSidebar.classList.add("flex")
        miniSidebar.classList.remove("hidden")
        maxToolbar.classList.add("translate-x-24", "scale-x-0")
        maxToolbar.classList.remove("translate-x-0")
        logo.classList.add('ml-12')
        content.classList.remove("ml-12", "md:ml-60")
        content.classList.add("ml-12")

    }

}


function showDiv(divId) {
    const div = document.getElementById(divId);
    if (div) {
        div.classList.remove('hidden');
        div.classList.add('fade-in');
        document.body.style.overflow = 'hidden'; // Disable body scroll
    }
}

function hideDiv(divId) {
    const div = document.getElementById(divId);
    if (div) {
        div.classList.remove('fade-in');
        div.classList.add('fade-out');

        // Wait for the animation to complete before hiding
        div.addEventListener('animationend', function () {
            div.classList.add('hidden');
            div.classList.remove('fade-out');
            document.body.style.overflow = 'auto'; // Enable body scroll
        }, {
            once: true
        });
    }
}

// function hideOnClickOutside(event, modalId) {
//     const modal = document.getElementById(modalId);
//     const modalContent = modal.querySelector('div');
    
   
//     if (!modalContent.contains(event.target)) {
//         hideDiv(modalId);
//     }
// }


//  Disable future date
const today = new Date();
const yyyy = today.getFullYear();
const mm = String(today.getMonth() + 1).padStart(2, '0');
const dd = String(today.getDate()).padStart(2, '0');

// Format today's date as YYYY-MM-DD
const maxDate = `${yyyy}-${mm}-${dd}`;

// Select all date fields and set the max attribute
document.querySelectorAll('.disable-future-date').forEach(dateField => {
    dateField.setAttribute('max', maxDate);
});






