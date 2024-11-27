


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

function toggleSubmitButton(button, isSubmitting) {
    if (isSubmitting) {
        button.attr("disabled", true)
              .html('<svg aria-hidden="true" role="status" class="inline w-4 h-4 me-3 text-white animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/><path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/></svg> Submitting...');
    } else {
        button.attr("disabled", false).html("Save");
    }
}









