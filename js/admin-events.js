/*--------------------------
EVENT MODAL CONTROL
--------------------------*/
var showModal = document.getElementById('show-modal');
var modal = document.getElementsByClassName('modal')[0];
var overlay = document.getElementsByClassName('overlay')[0];
// Showing modal on click
showModal.addEventListener('click', function(){
    // Showing the modal and overlay
    overlay.classList.remove('hide');
    modal.classList.remove('hide');
    
});
/*--------------------------
UPDATE EVENT VALUE CONTROL
--------------------------*/
function updateEvent(buttonId){
    // Removing first character of the buttonId to get the corresponding formName
    var eventToEditName = buttonId.substr(1);
    // Getting the name of the event clicked on
    var eventToEdit = document.forms[eventToEditName];
    // Getting form input values from event clicked on
    var eventid = eventToEdit['eventid'].value;
    var eventname = eventToEdit['eventname'].value;
    var eventtype = eventToEdit['eventtype'].value;
    var eventdescription = eventToEdit['eventdescription'].value;
    var eventdate = eventToEdit['eventdate'].value;
    var starttime = eventToEdit['starttime'].value;
    var endtime = eventToEdit['endtime'].value;
    var location = eventToEdit['location'].value;
    //
    var updateEventForm = document.forms['event-form'];
    // Setting the values of the updae event modal to be the values of the event clicked on
    updateEventForm['eventid'].setAttribute("value", eventid);
    updateEventForm['eventname'].setAttribute("value", eventname);
    updateEventForm['eventtype'].setAttribute("value", eventtype);
    updateEventForm['eventdesc'].innerHTML = eventdescription;
    updateEventForm['eventdate'].setAttribute("value", eventdate);
    updateEventForm['starttime'].setAttribute("value", starttime);
    updateEventForm['endtime'].setAttribute("value", endtime);
    updateEventForm['location'].setAttribute("value", location);
    // Showing the overlay and modal
    overlay.classList.remove('hide');
    modal.classList.remove('hide');
    // add-event button
    document.getElementsByClassName('center-button')[0].classList.add('hide');
    // update-event button
    document.getElementsByClassName('center-button')[1].classList.remove('hide');
}