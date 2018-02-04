/*--------------------------
DASHBOARD RESIZER
--------------------------*/
var dashboardResizer = document.getElementById('dashboardResizer');
// If dashboard resizer button '<' is clicked then...
dashboardResizer.addEventListener('click', function(){
    // Pulling in all variables needed
    var dashboardNavItems = document.getElementsByClassName('admin-tools__link-text');
    var dashboardNavLinkIcons = document.getElementsByClassName('admin-tools__link-icon');
    var adminToolsPanel = document.getElementsByClassName('admin-tools')[0];
    var adminInterface = document.getElementsByClassName('admin-interface')[0];
    // Change the direction of '<' (dashboard resizer button)
    dashboardResizer.classList.toggle('icon-arrow-left');
    dashboardResizer.classList.toggle('icon-arrow-right');
    adminInterface.classList.toggle('interface-minimize');
    adminToolsPanel.classList.toggle('tools-minimize');
    // For all dashboard nav items toggle visibility
    for (var i = 0; i < dashboardNavItems.length; i++) {
        // Toggle showing dashboard panel link text
        dashboardNavItems[i].classList.toggle('hide');
    }
    for (var i = 0; i < dashboardNavLinkIcons.length; i++) {
        // Toggle the padding on dashboard panel icons
        dashboardNavLinkIcons[i].classList.toggle('no-pad');
    }
});