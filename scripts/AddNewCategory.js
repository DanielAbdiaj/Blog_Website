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
const paramAdmin = urlParams.get("admin");

document.querySelector(".form").addEventListener("submit", (event) => {
  event.preventDefault();

  document.querySelectorAll("#alert").forEach((e) => e.remove());

  let category = {
    title: document.querySelector("#title").value,
    admin: paramAdmin,
  };

  let JSONcategory = JSON.stringify(category);
  console.log(JSONcategory);

  fetch("API/category/create.php", {
    method: "post",
    body: JSONcategory,
    headers: {
      "Content-Type": "application/json",
    },
  })
    .then(function (response) {
      return response.json();
    })
    .then(function (responseJSON) {
      typeOfAlert = Object.keys(responseJSON)[0]; //getting the response if it's success or failure
      const alert = document.createElement("div"); //creating a div to show the message to the user
      alert.setAttribute("class", `alert alert-${typeOfAlert}`);
      alert.setAttribute("id", "alert");
      alert.innerHTML = responseJSON[typeOfAlert];
      document.querySelector(".form").before(alert);

      if (typeOfAlert == "success") {
        setTimeout(() => {
          //Redirecting the user deppending on the succes or danger
          window.location.assign(`AdminBlogPage.php?admin=${paramAdmin}`);
        }, 1500);
      }
    })
    .catch(function (error) {
      console.log(error);
    });
});
