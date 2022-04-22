
function floatLabel(){


    if(this.parentElement.children.length % 2 === 0){

        this.previousElementSibling.classList.add('float-label');
        this.previousElementSibling.style.color = `var(--accent-color)`;
        this.placeholder = "";
    }

    else {
        this.previousElementSibling.previousElementSibling.classList.add('float-label');
        this.previousElementSibling.previousElementSibling.style.color = `var(--accent-color)`;
        this.placeholder = "";
    }
    
    
}
    
 function notFloatLabel(){
    
    if(this.parentElement.children.length % 2 === 0){
        
        if(this.value !== ""){
        this.previousElementSibling.style.color = `var(--secondary-color)`;
        }
        else{
            this.previousElementSibling.classList.remove('float-label');
            this.previousElementSibling.style.color = `var(--secondary-color)`;
            this.placeholder = this.previousElementSibling.textContent;
        }

    }
    
      else {
    
          if(this.value !== ""){
              this.previousElementSibling.previousElementSibling.style.color = `var(--secondary-color)`;
          }
          else{
              this.previousElementSibling.previousElementSibling.classList.remove('float-label');
              this.previousElementSibling.previousElementSibling.style.color = `var(--secondary-color)`;
              this.placeholder = this.previousElementSibling.previousElementSibling.textContent;
          }
      }  
}

export {floatLabel,notFloatLabel};