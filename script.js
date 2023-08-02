$(document).ready(function() {
	
	hideNavbar();
	hideCarousel();
	
	
})


let container = document.getElementById('container')

toggle = () => {
	container.classList.toggle('sign-in')
	container.classList.toggle('sign-up')
}

setTimeout(() => {
	container.classList.add('sign-in')
}, 200)

function hideNavbar() {
	document.getElementById("hideNavbar").style.display = "none";
	
}

function hideCarousel() {
        
	document.getElementById("hideCarousel").style.display = "none";
}