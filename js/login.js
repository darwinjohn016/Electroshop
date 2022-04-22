if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
}

// Show or Reveal Password

const revealBtn = document.querySelector('.login-form-input-bx .login-reveal-password-btn');

const notRevealBtn = document.querySelector('.login-form-input-bx .login-not-reveal-password-btn');  

import {showPassword,hidePassword} from './modules/show-password.js';

revealBtn.addEventListener('click',e=>{
    showPassword(e);
})





notRevealBtn.addEventListener('click',e=>{
    hidePassword(e);
})


// Floating Labels

const loginFormInputBx = document.querySelectorAll('.login-form-input-bx');

import {floatLabel,notFloatLabel} from './modules/float-label.js';


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
          bx.firstElementChild.classList.add('float-label');
      }
  }
});