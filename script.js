// sign in / sign up page script and hide carousel and navbar

$(document).ready(function () {
	hideNavbar();
	hideCarousel();
});

let container = document.getElementById("container");

toggle = () => {
	container.classList.toggle("sign-in");
	container.classList.toggle("sign-up");
};

setTimeout(() => {
	container.classList.add("sign-in");
}, 200);

function hideNavbar() {
	document.getElementById("hideNavbar").style.display = "none";
}

function hideCarousel() {
	document.getElementById("hideCarousel").style.display = "none";
}

let url = window.location.href;
const errors = document.getElementById("signin-feedback-display");

// sign in error display
if (url.match("error=none")) {
	errors.style.display = "block";
	errors.classList.add("alert-success");
	errors.innerHTML = "Your account has been created! ";
} else if (url.match("emptyinput")) {
	errors.style.display = "block";
	errors.classList.add("alert-danger");
	errors.innerHTML = "Username or password is missing!";
} else if (url.match("usernameOrPasswordWrong")) {
	errors.style.display = "block";
	errors.classList.add("alert-danger");
	errors.innerHTML = "Username or password is wrong!";
}
// sign up error display
const changeContainerClass = document.getElementById("#container");
const signuperrors = document.getElementById("signup-feedback-display");
if (url.match("emptySignupinput")) {
	errors.style.display = "block";
	changeContainerClass.classList.remove("sign-in");
	changeContainerClass.classList.add("sign-up");
	errors.classList.add("alert-success");
	errors.innerHTML = "Your account has been created! ";
}


// // pupa code
// function accountManagment() {
//     let url = window.location.href;
//     const errors = document.querySelector(".errorHandler");
//     const wrapper = document.querySelector('#container');
//     const loginLink = document.querySelector('.login-link');
//     const registerLink = document.querySelector('.register-link');

//     registerLink.addEventListener('click', () => {
//         wrapper.classList.add('sign-in');
//         localStorage.setItem('in', registerLink);
//     })

//     loginLink.addEventListener('click', () => {
//         wrapper.classList.remove('sign-up')
//         localStorage.removeItem('in', loginLink);
//     })

//     if (localStorage.getItem('in')) {
//         wrapper.classList.add('active');
//     } else {
//         wrapper.classList.remove('active');
//     }

//     if (url.match("SuccessfullySignedUp")) {
//         errors.style.display = "flex";
//         errors.style.color = "green";
//         wrapper.classList.remove('active');
//         localStorage.removeItem('in', loginLink);
//         errors.innerHTML = "Successfully signed up, feel free to login!";
//     }
// }