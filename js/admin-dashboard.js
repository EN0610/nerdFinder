/*--------------------------
POST MODAL CONTROL
--------------------------*/
var postModal = document.getElementById('post-modal');
var modal = document.getElementsByClassName('modal')[0];
var overlay = document.getElementsByClassName('overlay')[0];
// on showModal id click show modal and overlay
postModal.addEventListener('click', function(){
    // If updatePostIdField exists then admin-dashboard page if not then manage-events page
    overlay.classList.remove('hide');
    modal.classList.remove('hide');
    // Pulling in variables needed to get and store value of the <select> element
    var updatePostIdField = document.getElementById('modal__post-id');
    var postIdSelectElement = document.getElementById('update-post-id')
    var postId = postIdSelectElement.options[postIdSelectElement.selectedIndex].value;
    var postContent = postIdSelectElement.options[postIdSelectElement.selectedIndex].text;
    // Insert the value of the dropdown option into the hidden modal field 'modal__post-id'
    var postField = document.getElementById('modal__input');
    postField.innerHTML = postContent;
    updatePostIdField.setAttribute("value", postId);
});