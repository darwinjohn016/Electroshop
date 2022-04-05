if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
}

const inputPassword = document.querySelector('input[type="password"]');

const revealBtn = document.querySelector('.login-reveal-password-btn');

const notRevealBtn = document.querySelector('.login-not-reveal-password-btn');  

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

const loginFormInputBx = document.querySelectorAll('.login-form-input-bx');

function floatLabel(){
    
  if(this.closest('.login-form-input-bx').children.length % 2 === 0){

      this.previousElementSibling.classList.add('login-float-label');
      this.previousElementSibling.style.color = `var(--accent-color)`;
      this.placeholder = "";
  }

  else {
      this.previousElementSibling.previousElementSibling.classList.add('login-float-label');
      this.previousElementSibling.previousElementSibling.style.color = `var(--accent-color)`;
      this.placeholder = "";
  }


}

function notFloatLabel(){

  if(this.closest('.login-form-input-bx').children.length % 2 === 0){
      
      if(this.value !== ""){
        this.previousElementSibling.style.color = `var(--secondary-color)`;
      }
      else{
          this.previousElementSibling.classList.remove('login-float-label');
          this.previousElementSibling.style.color = `var(--secondary-color)`;
          this.placeholder = this.previousElementSibling.textContent;
      }

  }

  else {

      if(this.value !== ""){
          this.previousElementSibling.previousElementSibling.style.color = `var(--secondary-color)`;
      }
      else{
          this.previousElementSibling.previousElementSibling.classList.remove('login-float-label');
          this.previousElementSibling.previousElementSibling.style.color = `var(--secondary-color)`;
          this.placeholder = this.previousElementSibling.previousElementSibling.textContent;
      }
  }


}


loginFormInputBx.forEach(bx=>{
  if(bx.children.length % 2 === 0){
      bx.firstElementChild.nextElementSibling.addEventListener('focus',floatLabel);
      bx.firstElementChild.nextElementSibling.addEventListener('blur',notFloatLabel);
  }

  else {
      bx.firstElementChild.nextElementSibling.nextElementSibling.addEventListener('focus',floatLabel);
      bx.firstElementChild.nextElementSibling.nextElementSibling.addEventListener('blur',notFloatLabel);
  }
});

loginFormInputBx.forEach(bx=>{
  if(bx.children.length % 2 === 1){
      
      if(bx.firstElementChild.nextElementSibling.nextElementSibling.value !== ""){
          bx.firstElementChild.classList.add('login-float-label');
      }
  }
});