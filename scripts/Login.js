// script fot the navbar collapse
var btn = document.getElementById("collapseBtn");
var element = document.getElementById("myCollapse");

// Create a collapse instance, toggles the collapse element on invocation

var myCollapse = new bootstrap.Collapse(element, {
  toggle: false,
});

btn.addEventListener("click", function () {
  myCollapse.toggle();
});

//prints the year in the footer
const year = new Date().getFullYear();
document.querySelector("#year").innerHTML = ` ${year}`;

const urlParams = new URLSearchParams(window.location.search);
const param = urlParams.get("error");

document.querySelector(".bttSubmit").addEventListener("click", function () {
  document.querySelectorAll("#alert").forEach((e) => e.remove());
  errorLogin(param);
});

function errorLogin(error) {
  if (error) {
    const alert = document.createElement("div"); //creating a div to show the message to the user
    alert.setAttribute("class", "alert alert-danger");
    alert.setAttribute("id", "alert");
    alert.innerHTML = error;
    document.querySelector(".form").before(alert);
  }
}
