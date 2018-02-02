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
/*--------------------------
MODAL CONTROL
--------------------------*/
var showModal = document.getElementById('show-modal');
var modal = document.getElementsByClassName('modal')[0];
var overlay = document.getElementsByClassName('overlay')[0];
// If showModal (object) is not undefined...
if (typeof showModal !== "undefined") {
    // on showModal id click show modal and overlay
    showModal.addEventListener('click', function(){
        // Pulling in variables needed to get and store value of the <select> element
        var postIdSelectElement = document.getElementById('update-post-id')
        var updatePostIdField = document.getElementById('modal__post-id');
        var postField = document.getElementById('modal__input');

        if (typeof updatePostIdField !== "undefined") {
            // If update post modal not add new post
            var postId = postIdSelectElement.options[postIdSelectElement.selectedIndex].value;
            var postContent = postIdSelectElement.options[postIdSelectElement.selectedIndex].text;
            // Insert the value of the dropdown option into the hidden modal field 'modal__post-id'
            postField.innerHTML = postContent;
            updatePostIdField.setAttribute("value", postId);
        }
        //
        overlay.classList.remove('hide');
        modal.classList.remove('hide');
    });
}
// If overlay AND modal (objects) are not undefined...
if ((typeof overlay !== "undefined") && (typeof modal !== "undefined")) {
    // Pulling in variable for 'x' icon  
    var exitIcon = document.getElementsByClassName('icon-exit-dark')[0];
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