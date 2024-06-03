
// Navbar toggle
const navbarNav = document.querySelector('.navbar-nav');
const menu = document.querySelector('#menu');
document.addEventListener('click', function(e) {
    if (!menu.contains(e.target) && !navbarNav.contains(e.target)) {
        navbarNav.classList.remove('active');
    }
});

menu.onclick = () => {
    navbarNav.classList.toggle('active');
};

window.addEventListener("scroll", function() {
    var navbar = document.querySelector(".navbar");
    if (window.scrollY > navbar.offsetTop) {
        navbar.classList.add("fixed");
    } else {
        navbar.classList
    }
});

function scrollToSection(sectionId) {
    // Mengambil elemen dengan id yang sesuai
    var section = document.querySelector(sectionId);

    // Menggulir halaman ke bagian yang sesuai dengan elemen
    if (section) {
        section.scrollIntoView({ behavior: 'smooth' });
    }
}

window.onscroll = function() {scrollFunction()};

        function scrollFunction() {
            if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
                document.getElementById("navbar").style.top = "0";
            } else {
                document.getElementById("navbar").style.top = "-50px";
            }
        }

        function bookNow() {
            // Your booking logic here
            alert('Button clicked!');
        }
                