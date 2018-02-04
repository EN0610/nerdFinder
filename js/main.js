/*--------------------------
MOBILE NAV
--------------------------*/
var mobileNavControl = document.getElementsByClassName('icon-menu')[0];
var mobileNav = document.getElementsByClassName('nav__item-list')[0];
//
mobileNavControl.addEventListener('click', function(){

    if (mobileNav.style.display == 'block') {
        mobileNav.style.display = 'none';
    } else{
        mobileNav.style.display = 'block';
    }
});
/*--------------------------
TOGGLE NAV DROP DOWN
--------------------------*/
var dropDownButton = document.getElementsByClassName('nav__user-area')[0];
// If dropDownButton (object) is not undefined...
if (typeof dropDownButton !== "undefined") {
    var dropDown = document.getElementsByClassName('nav__drop-down')[0];
    // On click toggle hide class to reveal/hide drop down
    dropDownButton.addEventListener('click', function(){dropDown.classList.toggle('hide')});
}
/*--------------------------
NAVIGATION CURRENT PAGE
--------------------------*/
var navItems = document.getElementsByClassName('nav__item');
// For every nav item check if current page is <a href=""> destination
for (var i = 0; i < navItems.length; i++) {
/* For all elements with the class 'nav__item' get the href of the <a> inside
   if <a href=""> destination is same as current URL then 
   add the class 'nav__item-current' */
    if(navItems[i].getElementsByTagName('a')[0].href == window.location.href){
        
        navItems[i].classList.add('nav__item--current');
    }
}