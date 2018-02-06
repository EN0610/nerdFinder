/*--------------------------
SCROLL BOTTOM MESSAGES
--------------------------*/
window.onload=function(){
 	var messageContainer = document.getElementsByClassName('message-container__messages')[0];
    messageContainer.scrollTop = messageContainer.scrollHeight;
}
/*--------------------------
OPENING MODAL
--------------------------*/
var messagesButton = document.getElementsByClassName('messages__button')[0];
var modal = document.getElementsByClassName('modal')[0];
var overlay = document.getElementsByClassName('overlay')[0];
//
messagesButton.addEventListener('click', function(){
    // Showing the modal and overlay
    overlay.classList.remove('hide');
    modal.classList.remove('hide');
    
});
/*--------------------------
CLOSING MODAL
--------------------------*/
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