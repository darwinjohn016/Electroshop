

const hamburgerBtn = document.querySelector('.hamburger-btn');
const closeBtn = document.querySelector('.close-btn');
const heroNav = document.querySelector('.hero-nav');


// Open and Close Navigation on Mobile

function openNav(){
    heroNav.style.transform = `translateX(${0}%)`;
}

function closeNav(){
    heroNav.style.transform = `translateX(${100}%)`;
}

hamburgerBtn.addEventListener('click',openNav);
closeBtn.addEventListener('click',closeNav);

const heroHeader = document.querySelector('.hero-header');
const heroLogo = document.querySelector('.hero-logo');
const navBtnBx = document.querySelectorAll('.nav-btn-bx a');

const heroHeaderAnchor = document.querySelectorAll('.hero-header a');

// Indicate Active Button Using Some Styles

for(let i=0;i<navBtnBx.length;i++){
    navBtnBx[i].addEventListener('click',e=>{

        const length = document.querySelectorAll('.nav-btn-style').length

        console.log(length);

        if (length > 0){

            navBtnBx.forEach(anchor=>{
                anchor.classList.remove('nav-btn-style');
            })
            e.target.classList.add('nav-btn-style');  
        }

        else {
            e.target.classList.add('nav-btn-style');       
        }

 

    });   

}


// Change Color of the Contents of the Header and the Header

function scrollHeader(){
    if(this.scrollY > 20){
        heroHeader.style.backgroundColor = `var(--accent-color)`;
        heroLogo.style.color = `var(--dominant-color)`;
        Array.from(heroLogo.children).forEach(span =>{
            span.style.color = `var(--dominant-color)`;
        })

        heroHeaderAnchor.forEach((anchor,index) =>{
            anchor.style.color = `var(--dominant-color)`;

            if(index === heroHeaderAnchor.length-1){
                anchor.style.color = `var(--secondary-color)`;
                anchor.style.backgroundColor = `var(--dominant-color)`;
            }   
        })
    }
    else{
        heroHeader.style.backgroundColor = `transparent`;
        heroLogo.style.color = `var(--secondary-color)`;
        Array.from(heroLogo.children).forEach(span =>{
            span.style.color = `var(--accent-color)`;
        })

        heroHeaderAnchor.forEach((anchor,index) =>{
            anchor.style.color = `var(--secondary-color)`;

            if(index === heroHeaderAnchor.length-1){
                anchor.style.color = `var(--dominant-color)`;
                anchor.style.backgroundColor = `var(--accent-color)`;
            }
        })
    }
}

window.addEventListener('scroll',scrollHeader);

