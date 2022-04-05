if(window.history.replaceState){
    window.history.replaceState( null, null, window.location.href);
}

// Floating Labels

const profileInfoInputBx = document.querySelectorAll('.profile-info-input-bx');

function floatLabel(){
    

    if(this.closest('.profile-info-input-bx').children.length % 2 === 0){

        this.previousElementSibling.classList.add('profile-float-label');
        this.previousElementSibling.style.color = `var(--accent-color)`;
        this.placeholder = "";
    }

    else {
        this.previousElementSibling.previousElementSibling.classList.add('profile-float-label');
        this.previousElementSibling.previousElementSibling.style.color = `var(--accent-color)`;
        this.placeholder = "";
    }


}

function notFloatLabel(){

    if(this.closest('.profile-info-input-bx').children.length % 2 === 0){
        
        if(this.value !== ""){
            this.previousElementSibling.style.color = `var(--secondary-color)`;
        }
        else{
            this.previousElementSibling.classList.remove('profile-float-label');
            this.previousElementSibling.style.color = `var(--secondary-color)`;
            this.placeholder = this.previousElementSibling.textContent;
        }

    }

    else {

        if(this.value !== ""){
            this.previousElementSibling.previousElementSibling.style.color = `var(--secondary-color)`;
        }
        else{
            this.previousElementSibling.previousElementSibling.classList.remove('profile-float-label');
            this.previousElementSibling.previousElementSibling.style.color = `var(--secondary-color)`;
            this.placeholder = this.previousElementSibling.previousElementSibling.textContent;
        }
    }


}



profileInfoInputBx.forEach(bx=>{
    if(bx.children.length % 2 === 0){
        bx.firstElementChild.nextElementSibling.addEventListener('focus',floatLabel);
        bx.firstElementChild.nextElementSibling.addEventListener('blur',notFloatLabel);
    }

    else {
        bx.firstElementChild.nextElementSibling.nextElementSibling.addEventListener('focus',floatLabel);
        bx.firstElementChild.nextElementSibling.nextElementSibling.addEventListener('blur',notFloatLabel);
    }
});


profileInfoInputBx.forEach(bx=>{
        
    if(bx.firstElementChild.nextElementSibling.value !== ""){
        bx.firstElementChild.classList.add('profile-float-label');
    }
    
  });
