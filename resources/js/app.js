import './bootstrap';

var sectionList = document.querySelectorAll('.header__section-list .header__section-link')
var url = window.location.href;



sectionList.forEach(section => {
   if(url.includes(section.id)){
        section.classList.toggle('section--active');
   }});

