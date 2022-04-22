if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
}


const prevBtn = document.querySelector('.prev-btn');
const nextBtn = document.querySelector('.next-btn');

const submitBtn = document.querySelector('.submit-btn');

const formWrapper = document.querySelector('.signup-form-wrapper');


const circleBx = document.querySelectorAll('.signup-timeline-bx .circle-bx');
const lineBx = document.querySelectorAll('.signup-timeline-bx .line-bx');

class NavigateInput{
    constructor(formWrapper,circleBx,lineBx){
        this.formWrapper = formWrapper;
        this.count = 0;
        this.distance = formWrapper.clientWidth / formWrapper.children.length;
        this.circleBx = circleBx;
        this.lineBx = lineBx;
    }

    prev(){

        this.count--;
        if(this.count >= 0){
            this.formWrapper.style.transform = `translateX(${-(this.distance * this.count)}px)`;
            nextBtn.classList.add('active-btn');

            this.circleBx.forEach((bx,index)=>{
                
                if(index === this.count){
                    bx.firstElementChild.style.color = `var(--secondary-color)`;
                    bx.lastElementChild.style.backgroundColor = `transparent`;
                    
                    bx.lastElementChild.firstElementChild.style.color = `var(--secondary-color)`;       
                    
                    bx.lastElementChild.firstElementChild.textContent = `${parseInt(this.count+1).toString()}`;
                }
            })

            this.lineBx.forEach((bx,index)=>{
                
                if(index === this.count){
                    bx.firstElementChild.style.width= 0;
                }
            })

            // // .circle-bx p
            // this.circleBx.children[this.count].children[0].style.color = `var(--secondary-color)`;

            // // .circle-bx div
            // this.circleBx.children[this.count].children[1].style.backgroundColor = `transparent`;            

            // // .circle-bx div p
            // this.circleBx.children[this.count].children[1].children[0].style.color = `var(--secondary-color)`;            

            // // .circle-bx div p
            // this.circleBx.children[this.count].children[1].children[0].textContent = `${parseInt(this.count+1).toString()}`;

        }

        if(this.count === 0){
            prevBtn.classList.remove('active-btn');
            nextBtn.classList.add('active-btn');
            this.count = 0;

          
        }

        if(this.count < this.formWrapper.children.length-1){
            submitBtn.classList.remove('active-btn');
        }
        
    }

    next(){

        this.count++;

        if(this.count > 0){
            this.formWrapper.style.transform = `translateX(${-(this.distance * this.count)}px)`;
            prevBtn.classList.add('active-btn');


            this.circleBx.forEach((bx,index)=>{
                
                if(index === this.count-1){
                    bx.firstElementChild.style.color = `var(--accent-color)`;
                    bx.lastElementChild.style.backgroundColor = `var(--accent-color)`;
                    
                    bx.lastElementChild.firstElementChild.style.color = `var(--dominant-color)`;        
                    
                    bx.lastElementChild.firstElementChild.textContent = "✓";
                }
            })

            this.lineBx.forEach((bx,index)=>{
                
                if(index === this.count-1){
                    bx.firstElementChild.style.width= `100px`;
                }
            })

            // // .circle-bx p
            // this.circleBx.children[this.count-1].children[0].style.color = `var(--accent-color)`;

            // // .circle-bx div
            // this.circleBx.children[this.count-1].children[1].style.backgroundColor = `var(--accent-color)`;

            // // .circle-bx div p
            // this.circleBx.children[this.count-1].children[1].children[0].style.color = `var(--dominant-color)`;

            // // .circle-bx div p
            // this.circleBx.children[this.count-1].children[1].children[0].textContent = "✓";

        }

        if(this.count === this.formWrapper.children.length-1){
            nextBtn.classList.remove('active-btn');
            submitBtn.classList.add('active-btn');

        }

        if(this.count < this.formWrapper.children.length-1){
            submitBtn.classList.remove('active-btn');

        
        }

    }

    update(){
        this.distance = formWrapper.clientWidth / formWrapper.children.length;
    }
}


const navigateInput = new NavigateInput(formWrapper,circleBx,lineBx);

prevBtn.addEventListener('click',navigateInput.prev.bind(navigateInput));

nextBtn.addEventListener('click',navigateInput.next.bind(navigateInput));

window.addEventListener('resize',navigateInput.update.bind(navigateInput))

// Show or Reveal Password

const revealBtn = document.querySelectorAll('.signup-form-input-bx .signup-reveal-password-btn');

const notRevealBtn = document.querySelectorAll('.signup-form-input-bx .signup-not-reveal-password-btn');  

import {showPassword,hidePassword} from './modules/show-password.js';

revealBtn.forEach(btn =>{
    btn.addEventListener('click',e=>{
        showPassword(e);
    })
})

notRevealBtn.forEach(btn =>{
    btn.addEventListener('click',e=>{
        hidePassword(e);
    })
})


// Floating Labels

const signupFormInputBx = document.querySelectorAll('.signup-form-input-bx');

import {floatLabel,notFloatLabel} from './modules/float-label.js';

signupFormInputBx.forEach(bx=>{
    if(bx.children.length % 2 === 0){
        bx.firstElementChild.nextElementSibling.addEventListener('focus',floatLabel);
        bx.firstElementChild.nextElementSibling.addEventListener('blur',notFloatLabel);
    }

    else {
        bx.firstElementChild.nextElementSibling.nextElementSibling.addEventListener('focus',floatLabel);
        bx.firstElementChild.nextElementSibling.nextElementSibling.addEventListener('blur',notFloatLabel);
    }
});

signupFormInputBx.forEach(bx=>{
    if(bx.children.length % 2 === 1){
        
        if(bx.firstElementChild.nextElementSibling.nextElementSibling.value !== ""){
            bx.firstElementChild.classList.add('signup-float-label');
        }
    }
});







