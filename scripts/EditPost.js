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
let filename;

//shows the name of the image/file uploaded
fileInput.onchange = () => {
  const reader = new FileReader();
  reader.readAsDataURL(fileInput.files[0]);
  filename = fileInput.files[0].name;
  fileLabel.innerHTML = `${filename} is uploaded`;
};

window.onload = function () {
  readPost();
};

async function readAllCategories(CurrentCategory) {
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
        if (CurrentCategory != category.title) {
          const option = document.createElement("option");
          option.innerHTML = category.title;
          document.querySelector("#CategoryTitle").append(option);
        }
      });
    })
    .catch(function (error) {
      console.log(error);
    });
}

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

let FILENAME;

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
      const selectCategoryBox = document.querySelector("#CategoryTitle");
      const currentOption = document.createElement("option");
      currentOption.innerHTML = post.category;
      selectCategoryBox.append(currentOption);
      readAllCategories(post.category);

      document.querySelector("#imageLabel").innerHTML =
        "Current Image : " + post.image;
      FILENAME = post.image;
      document.querySelector("#Post").value = post.text
        .replace(/&lt;/g, "<")
        .replace(/&gt;/g, ">");
    })
    .catch(function (error) {
      console.log(error);
    });
}

document.querySelector(".form").addEventListener("submit", function (event) {
  event.preventDefault();

  document.querySelectorAll("#alert").forEach((e) => e.remove());

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

  if (!filename) {
    filename = FILENAME;
  }

  let post = {
    title: document.querySelector("#title").value,
    category: c.options[c.selectedIndex].text,
    image: filename,
    text: document.querySelector("#Post").value,
    id: paramId,
  };

  let JSONpost = JSON.stringify(post);

  fetch("API/post/update.php", {
    method: "PUT",
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
      alert.innerHTML = responseJSON[typeOfAlert];
      alert.setAttribute("id", "alert");
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
