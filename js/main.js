/*--------------------------
TOGGLE NAV DROP DOWN
--------------------------*/

var dropDownButton = document.getElementsByClassName('nav__user-area')[0];
var dropDown = document.getElementsByClassName('nav__drop-down')[0];
// If dropDownButton (object) is not undefined...
if (typeof dropDownButton !== "undefined") {
    // On click toggle hide class to reveal/hide drop down
    dropDownButton.addEventListener('click', function(){dropDown.classList.toggle('hide')});
}

/*--------------------------
NAVIGATION CURRENT PAGE
--------------------------*/

var navItems = document.getElementsByClassName('nav__item');

for (var i = 0; i < navItems.length; i++) {

/* For all elements with the class 'nav__item' get the href of the <a> inside
   if <a href=""> destination is same as current URL then 
   add the class 'nav__item-current' */

    if(navItems[i].getElementsByTagName('a')[0].href === window.location.href){
        
        navItems[i].classList.add('nav__item--current');
    }
}

/*--------------------------
MODAL CONTROL
--------------------------*/

var showModal = document.getElementById('show-modal');
var postIdSelectElement = document.getElementById('update-post-id')
var postIdToUpdate = postIdSelectElement.options[postIdSelectElement.selectedIndex].value;
var updatePostIdField = document.getElementById('modal__post-id');
var modal = document.getElementsByClassName('modal')[0];
var overlay = document.getElementsByClassName('overlay')[0];
var exitIcon = document.getElementsByClassName('icon-exit-dark')[0];
// If showModal (object) is not undefined...
if (typeof showModal !== "undefined") {
    // on showModal id click show modal and overlay
    showModal.addEventListener('click', function(){

        if (typeof updatePostIdField !== "undefined") {
            // If update post modal not add new post
            // Insert the value of the dropdown option into the hidden modal field 'modal__post-id'
            updatePostIdField.setAttribute("value", postIdToUpdate);
        }
        //
        overlay.classList.remove('hide');
        modal.classList.remove('hide');
    });
}
// If overlay AND modal (objects) are not undefined...
if ((typeof overlay !== "undefined") && (typeof modal !== "undefined")) {
    // on overlay click hide overlay and modal
    overlay.addEventListener('click', function(){
        overlay.classList.add('hide');
        modal.classList.add('hide');
    });
    // on exit icon click hide overlay and modal
    exitIcon.addEventListener('click', function(){
        overlay.classList.add('hide');
        modal.classList.add('hide');
    });
}