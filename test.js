console.log("CALLED");
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

function callBack(checkbox) {
  console.log("CALLED");
  console.log(checkbox.checked); 
}
