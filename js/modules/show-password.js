function showPassword(e){
    const input = e.target.previousElementSibling;
    input.type = "text";

    e.target.nextElementSibling.classList.remove('toggle-reveal-password-btn');
    e.target.classList.add('toggle-reveal-password-btn');
}

function hidePassword(e){
    const input = e.target.previousElementSibling.previousElementSibling;

    input.type = "password";

    e.target.previousElementSibling.classList.remove('toggle-reveal-password-btn');
    e.target.classList.add('toggle-reveal-password-btn');
}

export {showPassword,hidePassword};
