
const prevBtn = document.querySelector('.prev-btn');
const nextBtn = document.querySelector('.next-btn');

const submitBtn = document.querySelector('.submit-btn');

const formWrapper = document.querySelector('.signup-form-wrapper');


const timelineBx = document.querySelector('.signup-timeline-bx');


const signupForm = document.querySelector('.signup-form');

signupForm.addEventListener('submit', (e)=>{
    e.preventDefault();
})


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