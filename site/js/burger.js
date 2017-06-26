//MENU BURGER

var content = document.querySelector('#hamburger-content');
var sidebarBody = document.querySelector('#hamburger-sidebar-body');

sidebarBody.innerHTML = content.innerHTML;

var button = document.querySelector('#hamburger-button');
var overlay = document.querySelector('#hamburger-overlay');
var activatedClass ='hamburger-activated';

button.addEventListener('click', function(e) {
   e.preventDefault();
   this.parentNode.classList.add(activatedClass);
});

overlay.addEventListener('click', function(e) {
    e.preventDefault();
    this.parentNode.classList.remove(activatedClass);
});
var nav = document.querySelector('#hamburger-sidebar');

button.addEventListener('click', function(){
    nav.classList.toggle('closed');
});
