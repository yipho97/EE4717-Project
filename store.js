console.log("CALLED");
openNav()
setSideNav()
// Target modal window
let modal = null;
let total = 0;

function openModal(choice) {
  modal = document.getElementById("myModal" + String(choice));
  modal.style.display = "block";
}

function closeModal(choice) {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
};


/* Set the width of the side navigation to 250px */
function openNav() {
  if(document.getElementById("mySidenav").style.width == "250px"){
    document.getElementById("mySidenav").style.width = "0px";
  }else{
    document.getElementById("mySidenav").style.width = "250px";
  }
}

/* Set the width of the side navigation to 0 */
function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}

function setSideNav(){
  // Get query param location to highlight location on side nav
  const urlSearchParams = new URLSearchParams(window.location.search);
  const params = Object.fromEntries(urlSearchParams.entries());
  document.getElementById(params.location).className = 'active'
}