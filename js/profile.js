if(window.history.replaceState){
    window.history.replaceState( null, null, window.location.href);
}

// Floating Labels

const profileFormInputBx = document.querySelectorAll('.profile-form-input-bx');

function floatLabel(){
    

    if(this.closest('.profile-form-input-bx').children.length % 2 === 0){

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

    if(this.closest('.profile-form-input-bx').children.length % 2 === 0){
        
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



profileFormInputBx.forEach(bx=>{
    if(bx.children.length % 2 === 0){
        bx.firstElementChild.nextElementSibling.addEventListener('focus',floatLabel);
        bx.firstElementChild.nextElementSibling.addEventListener('blur',notFloatLabel);
    }

    else {
        bx.firstElementChild.nextElementSibling.nextElementSibling.addEventListener('focus',floatLabel);
        bx.firstElementChild.nextElementSibling.nextElementSibling.addEventListener('blur',notFloatLabel);
    }
});


profileFormInputBx.forEach(bx=>{
        
    if(bx.firstElementChild.nextElementSibling.value !== ""){
        bx.firstElementChild.classList.add('profile-float-label');
    }
    if(bx.children.length % 2 === 1 && bx.firstElementChild.nextElementSibling.nextElementSibling.value === ""){
        bx.firstElementChild.classList.remove('profile-float-label');
    }

    
    
  });


// Preview Image

const submitImgBtn = document.querySelector('.submit-img-btn');
const profileImg = document.querySelector('.profile-img');

function previewImage() {


    const files = submitImgBtn.files[0];
    if (files) {
      const fileReader = new FileReader();
      fileReader.readAsDataURL(files);
      fileReader.addEventListener("load", function () {
        profileImg.src = this.result;
      });   
      
    }
}

submitImgBtn.addEventListener("change",previewImage);

    
// Open Password Modal


const profilePasswordContainer = document.querySelector('.profile-password-container');
const profilePassBtn = document.querySelector('.profile-pass-btn');

const profileCloseBtn = document.querySelector('.profile-close-btn');
const overlay = document.querySelector('.overlay');

const profileFormInputBx2 = document.querySelectorAll('.profile-form-bx .profile-form-input-bx');

function showModal(){
    profilePasswordContainer.classList.add('profile-toggle-modal');
    overlay.classList.add('overlay-toggle');
    profileFormInputBx2.forEach(bx=>{

        bx.lastElementChild.setAttribute('readonly','true');
    });
}

function hideModal(){
    profilePasswordContainer.classList.remove('profile-toggle-modal');
    overlay.classList.remove('overlay-toggle');
    profileFormInputBx2.forEach(bx=>{

        bx.lastElementChild.setAttribute('readonly','false');
    });
}


profilePassBtn.addEventListener('click',showModal);profileCloseBtn.addEventListener('click',hideModal);

