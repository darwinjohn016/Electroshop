
const hamburgerBtn = document.querySelector('.hamburger-btn');
const closeBtn = document.querySelector('.close-btn');
const heroNav = document.querySelector('.hero-nav');

function openNav(){
    heroNav.style.transform = `translateX(${0}%)`;
}

function closeNav(){
    heroNav.style.transform = `translateX(${100}%)`;
}

hamburgerBtn.addEventListener('click',openNav);
closeBtn.addEventListener('click',closeNav);