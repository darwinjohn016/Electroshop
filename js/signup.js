if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
}


const prevBtn = document.querySelector('.prev-btn');
const nextBtn = document.querySelector('.next-btn');

const submitBtn = document.querySelector('.submit-btn');

const formWrapper = document.querySelector('.signup-form-wrapper');


const timelineBx = document.querySelector('.signup-timeline-bx');


class NavigateInput{
    constructor(formWrapper,timelineBx){
        this.formWrapper = formWrapper;
        this.count = 0;
        this.distance = formWrapper.clientWidth / formWrapper.children.length;
        this.timelineBx = timelineBx;
    }

    prev(){

        this.count--;
        if(this.count >= 0){
            this.formWrapper.style.transform = `translateX(${-(this.distance * this.count)}px)`;
            nextBtn.classList.add('active-btn');

            
            // .circle-bx p
            this.timelineBx.children[this.count].children[0].style.color = `var(--secondary-color)`;

            // .circle-bx div
            this.timelineBx.children[this.count].children[1].style.backgroundColor = `transparent`;            

            // .circle-bx div p
            this.timelineBx.children[this.count].children[1].children[0].style.color = `var(--secondary-color)`;            

            // .circle-bx div p
            this.timelineBx.children[this.count].children[1].children[0].textContent = `${parseInt(this.count+1).toString()}`;

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

            // .circle-bx p
            this.timelineBx.children[this.count-1].children[0].style.color = `var(--accent-color)`;

            // .circle-bx div
            this.timelineBx.children[this.count-1].children[1].style.backgroundColor = `var(--accent-color)`;

            // .circle-bx div p
            this.timelineBx.children[this.count-1].children[1].children[0].style.color = `var(--dominant-color)`;

            // .circle-bx div p
            this.timelineBx.children[this.count-1].children[1].children[0].textContent = "✓";

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


const navigateInput = new NavigateInput(formWrapper,timelineBx);

prevBtn.addEventListener('click',navigateInput.prev.bind(navigateInput));

nextBtn.addEventListener('click',navigateInput.next.bind(navigateInput));

window.addEventListener('resize',navigateInput.update.bind(navigateInput))

// Show or Reveal Password

const inputPassword = document.querySelector('input[type="password"]');

const revealBtn = document.querySelector('.signup-reveal-password-btn');

const notRevealBtn = document.querySelector('.signup-not-reveal-password-btn');  

class PasswordDisplay{
  constructor(inputPassword){
    this.inputPassword = inputPassword;
  }


  show(){
    revealBtn.classList.toggle('toggle-reveal-password-btn');
    notRevealBtn.classList.toggle('toggle-reveal-password-btn');
    this.inputPassword.type = 'text';
  }

  hide(){
    revealBtn.classList.toggle('toggle-reveal-password-btn');
    notRevealBtn.classList.toggle('toggle-reveal-password-btn');
    this.inputPassword.type = 'password';
  }

}

const passwordDisplay = new PasswordDisplay(inputPassword);

revealBtn.addEventListener('click',passwordDisplay.show.bind(passwordDisplay));

notRevealBtn.addEventListener('click',passwordDisplay.hide.bind(passwordDisplay));


// Floating Labels

const signupFormInputBx = document.querySelectorAll('.signup-form-input-bx');

function floatLabel(){
    
    if(this.closest('.signup-form-input-bx').children.length % 2 === 0){

        this.previousElementSibling.classList.add('signup-float-label');
        this.previousElementSibling.style.color = `var(--accent-color)`;
        this.placeholder = "";
    }

    else {
        this.previousElementSibling.previousElementSibling.classList.add('signup-float-label');
        this.previousElementSibling.previousElementSibling.style.color = `var(--accent-color)`;
        this.placeholder = "";
    }


}

function notFloatLabel(){

    if(this.closest('.signup-form-input-bx').children.length % 2 === 0){
        
        if(this.value !== ""){
            this.previousElementSibling.style.color = `var(--secondary-color)`;
        }
        else{
            this.previousElementSibling.classList.remove('signup-float-label');
            this.previousElementSibling.style.color = `var(--secondary-color)`;
            this.placeholder = this.previousElementSibling.textContent;
        }

    }

    else {

        if(this.value !== ""){
            this.previousElementSibling.previousElementSibling.style.color = `var(--secondary-color)`;
        }
        else{
            this.previousElementSibling.previousElementSibling.classList.remove('signup-float-label');
            this.previousElementSibling.previousElementSibling.style.color = `var(--secondary-color)`;
            this.placeholder = this.previousElementSibling.previousElementSibling.textContent;
        }
    }

}

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







