
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
const userBtnBx = document.querySelectorAll('.user-btn-bx a');

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

    if(this.scrollY > 20 && this.innerWidth >= 1024){
        heroHeader.style.backgroundColor = `var(--accent-color)`;
        heroLogo.style.color = `var(--dominant-color)`;
        Array.from(heroLogo.children).forEach(span =>{
            span.style.color = `var(--dominant-color)`;
        })

        navBtnBx.forEach((anchor) =>{
            anchor.style.color = `var(--dominant-color)`;
        })

        userBtnBx.forEach((anchor,index) =>{
            if(index === 0){
                anchor.style.color = `var(--dominant-color)`;
            }
            else{
                anchor.style.backgroundColor = `var(--dominant-color)`;
                anchor.style.color = `var(--secondary-color)`;
                anchor.style.fontWeight = `bold`;
            }
        })


    }
    else if (this.scrollY < 20 && this.innerWidth >= 1024){
        heroHeader.style.backgroundColor = `transparent`;
        heroLogo.style.color = `var(--secondary-color)`;
        Array.from(heroLogo.children).forEach(span =>{
            span.style.color = `var(--accent-color)`;
        })

        navBtnBx.forEach((anchor) =>{
            anchor.style.color = `var(--secondary-color)`;
        })

        userBtnBx.forEach((anchor,index) =>{
            if(index === 0){
                anchor.style.color = `var(--secondary-color)`;
            }
            else{
                anchor.style.backgroundColor = `var(--accent-color)`;
                anchor.style.color = `var(--dominant-color)`;
                anchor.style.fontWeight = `normal`;
            }
        })
    }

    else if (this.scrollY > 20 && this.innerWidth < 1024){
        heroHeader.style.backgroundColor = `var(--accent-color)`;
        heroLogo.style.color = `var(--dominant-color)`;
        Array.from(heroLogo.children).forEach(span =>{
            span.style.color = `var(--dominant-color)`;
        })

        navBtnBx.forEach((anchor) =>{
            anchor.style.color = `var(--secondary-color)`;
        })

        userBtnBx.forEach((anchor) =>{
            anchor.style.color = `var(--secondary-color)`;
            anchor.style.fontWeight = `normal`;
            
        })

    }

    else if (this.scrollY < 20 && this.innerWidth < 1024){
        heroHeader.style.backgroundColor = `transparent`;
        heroLogo.style.color = `var(--secondary-color)`;
        Array.from(heroLogo.children).forEach(span =>{
            span.style.color = `var(--accent-color)`;
        })

        navBtnBx.forEach((anchor) =>{
            anchor.style.color = `var(--secondary-color)`;
        })
    }


}

window.addEventListener('scroll',scrollHeader);
window.addEventListener('resize',scrollHeader);

// Open or Close User Info bx

const userBtn = document.querySelector('.user-btn');
const userBtnBx3 = document.querySelector('.user-btn-bx-3');

function toggleInfoBx(){

    userBtnBx3.classList.toggle('hide-user-btn-bx-3');
    if(document.querySelectorAll('.hide-user-btn-bx-3').length === 0){
        document.body.style.position = "fixed";
    }
    else {
        document.body.style.position = "relative";
    
    }
}

if(userBtn != null){
    userBtn.addEventListener('click',toggleInfoBx);
}