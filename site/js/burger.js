//MENU BURGER
var smartMenu = document.querySelector('.burger-menu'),
	smartNav = document.querySelector('header nav');
	fake = 0;

smartMenu.addEventListener('mousedown', function () {
	fake = 1;
	smartNav.classList.toggle('appear');
});

smartMenu.addEventListener('mouseup', function () {
	fake = 0;
});

window.addEventListener('mousedown', function () {
	if (fake !== 1) {
		smartNav.classList.remove('appear');
	}
});
