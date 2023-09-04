// sign in / sign up page script and hide carousel and navbar

$(document).ready(function () {
	hideNavbar();
	hideCarousel();
	accountManagment();
});


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

const signuperrors = document.getElementById("signup-feedback-display");
if (url.match("emptySignupinput")) {
	signuperrors.style.display = "block";
	signuperrors.classList.add("alert-danger");
	signuperrors.innerHTML = "Please fill all information!";
}else if (url.match("wrongUsernameOrPwd")) {
	signuperrors.style.display = "block";
	signuperrors.classList.add("alert-danger");
	signuperrors.innerHTML = "Username or password is wrong!";
}else if (url.match("invalidemail")) {
	signuperrors.style.display = "block";
	signuperrors.classList.add("alert-danger");
	signuperrors.innerHTML = "Email is invalid!";
}else if (url.match("passwordmatch")) {
	signuperrors.style.display = "block";
	signuperrors.classList.add("alert-danger");
	signuperrors.innerHTML = "Passwords must match!";
}else if (url.match("useroremailtaken")) {
	signuperrors.style.display = "block";
	signuperrors.classList.add("alert-danger");
	signuperrors.innerHTML = "Username or email is taken!";
}



function accountManagment() {
	let container = document.getElementById("container");
    const loginLink = document.querySelector('.signinLink');
    const registerLink = document.querySelector('.signupLink');

    registerLink.addEventListener('click', () => {
		container.classList.remove("sign-in");
		container.classList.add("sign-up");
        localStorage.setItem('in', registerLink);
    })

    loginLink.addEventListener('click', () => {
		container.classList.remove("sign-up");
		container.classList.add("sign-in");
        localStorage.removeItem('in', loginLink);
    })

    if (localStorage.getItem('in')) {
        container.classList.remove("sign-in");
        container.classList.add("sign-up");
    } else {
        container.classList.remove("sign-up");
        container.classList.add("sign-in")
    }
	if(url.match("error=none")){
		container.classList.remove("sign-up");
		container.classList.add("sign-in");
		localStorage.removeItem('in', loginLink);
	}
    
}