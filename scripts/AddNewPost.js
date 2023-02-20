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

const fileInput = document.querySelector("#imageSelect");
const fileLabel = document.querySelector("#imageLabel");
let filename = "";

//shows the name of the image/file uploaded
fileInput.onchange = () => {
  const reader = new FileReader();
  reader.readAsDataURL(fileInput.files[0]);
  filename = fileInput.files[0].name;
  fileLabel.innerHTML = `${filename} is uploaded`;
};

window.onload = function () {
  readAllCategories();
};

async function readAllCategories() {
  await fetch("API/category/readAll.php", {
    method: "GET",
    headers: {
      "Content-Type": "application/json",
    },
  })
    .then((response) => {
      return response.json();
    })
    .then((data) => {
      data.forEach((category) => {
        const option = document.createElement("option");
        option.innerHTML = category.title;
        document.querySelector("#CategoryTitle").append(option);
      });
    })
    .catch(function (error) {
      console.log(error);
    });
}

const urlParams = new URLSearchParams(window.location.search);
const paramAdmin = urlParams.get("admin");
const paramUser = urlParams.get("user");
let param;
let RedirectURL;

if (paramAdmin) {
  param = paramAdmin;
  RedirectURL = `AdminBlogPage.php?admin=${param}`;
} else {
  param = paramUser;
  RedirectURL = `UserBlogPage.php?user=${param}`;
}

document.querySelector(".form").addEventListener("submit", (event) => {
  event.preventDefault();

  document.querySelectorAll("#Alert").forEach((e) => e.remove());

  function saveImageInUploads() {
    let formData = new FormData();
    formData.append("file", fileInput.files[0]);
    fetch("API/post/saveImage.php", {
      method: "post",
      body: formData,
    })
      .then(function (response) {
        return response.text();
      })
      .then(function (text) {
        console.log(text);
      })
      .catch(function (error) {
        console.log(error);
      });
  }

  let c = document.querySelector("#CategoryTitle");

  let post = {
    title: document.querySelector("#title").value,
    category: c.options[c.selectedIndex].text,
    image: filename,
    text: document.querySelector("#Post").value,
    admin: param,
  };

  let JSONpost = JSON.stringify(post);

  fetch("API/post/create.php", {
    method: "post",
    body: JSONpost,
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
      alert.setAttribute("id", "Alert");
      alert.innerHTML = responseJSON[typeOfAlert];
      document.querySelector(".form").before(alert);

      if (typeOfAlert == "success") {
        setTimeout(() => {
          //Redirecting the user deppending on the succes or danger
          window.location.assign(RedirectURL);
        }, 1000);

        saveImageInUploads();
      }
    })
    .catch(function (error) {
      console.log(error);
    });
});
