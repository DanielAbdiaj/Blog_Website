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
const paramId = urlParams.get("id");
const paramAdmin = urlParams.get("admin");
const paramUser = urlParams.get("user");

let param;

if (paramAdmin) {
  param = paramAdmin;
  RedirectURL = `AdminBlogPage.php?admin=${param}`;
} else {
  param = paramUser;
  RedirectURL = `UserBlogPage.php?user=${param}`;
}

window.onload = function () {
  readPost();
};

function readPost() {
  fetch(`API/post/readSingle.php?id=${paramId}`, {
    method: "GET",
    headers: {
      "Content-Type": "application/json",
    },
  })
    .then((response) => {
      return response.json();
    })
    .then((post) => {
      document.querySelector("#title").value = post.title
        .replace(/&lt;/g, "<")
        .replace(/&gt;/g, ">");
      document.querySelector("#title").readOnly = true;
      const selectCategoryBox = document.querySelector("#CategoryTitle");
      const currentOption = document.createElement("option");
      currentOption.innerHTML = post.category;
      selectCategoryBox.append(currentOption);

      document.querySelector("#imagePhoto").src = `uploads/${post.image}`;
      document.querySelector("#Post").value = post.text
        .replace(/&lt;/g, "<")
        .replace(/&gt;/g, ">");
      document.querySelector("#Post").readOnly = true;
    })
    .catch(function (error) {
      console.log(error);
    });
}

document.querySelector(".form").addEventListener("submit", function (event) {
  event.preventDefault();

  fetch(`API/post/delete.php?id=${paramId}`, {
    method: "DELETE",
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
      alert.innerHTML = responseJSON[typeOfAlert];
      document.querySelector(".form").before(alert);

      if (typeOfAlert == "success") {
        setTimeout(() => {
          //Redirecting the user deppending on the succes or danger
          window.location.assign(RedirectURL);
        }, 1500);
      }
    })
    .catch(function (error) {
      console.log(error);
    });
});
