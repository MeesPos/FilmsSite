const navSlide = () => {
    const burger = document.querySelector('.burger');
    const nav = document.querySelector('.navbar-ul');
    const navLinks = document.querySelectorAll('.navbar-ul li');

    // Toggle nav
    burger.addEventListener('click', () => {
        nav.classList.toggle('nav-active');

        // Animate links
        navLinks.forEach((link, index) => {
            if(link.style.animation){
                link.style.animation = ''
            } else {
                link.style.animation = `navLinkFade 0.5s ease forwards ${index / 7 + .45}s`;
            }
        });

    // Burger animation
    burger.classList.toggle('toggle');
    });
}

navSlide();