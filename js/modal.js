/*--------------------------
MODAL CONTROL
--------------------------*/
var showModal = document.getElementById('show-modal');
var modal = document.getElementsByClassName('modal')[0];
var overlay = document.getElementsByClassName('overlay')[0];
var updatePostIdField = document.getElementById('modal__post-id');
// If showModal (object) is not undefined...
if (typeof showModal !== "undefined") {
    // on showModal id click show modal and overlay
    showModal.addEventListener('click', function(){
        // Showing the modal and overlay
        overlay.classList.remove('hide');
        modal.classList.remove('hide');
        // If updatePostIdField exists then admin-dashboard page if not then manage-events page
        if (typeof updatePostIdField !== "undefined") {
            // Pulling in variables needed to get and store value of the <select> element
            var postIdSelectElement = document.getElementById('update-post-id')
            var postId = postIdSelectElement.options[postIdSelectElement.selectedIndex].value;
            var postContent = postIdSelectElement.options[postIdSelectElement.selectedIndex].text;
            // Insert the value of the dropdown option into the hidden modal field 'modal__post-id'
            var postField = document.getElementById('modal__input');
            postField.innerHTML = postContent;
            updatePostIdField.setAttribute("value", postId);
        }
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