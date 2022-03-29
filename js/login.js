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