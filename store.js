console.log("CALLED");
openNav()
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
  document.getElementById("mySidenav").style.width = "250px";
}

/* Set the width of the side navigation to 0 */
function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}