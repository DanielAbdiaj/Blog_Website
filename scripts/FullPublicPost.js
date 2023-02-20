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

window.onload = function () {
  readPost();
};

function readPost() {
  const urlParams = new URLSearchParams(window.location.search);
  const paramId = urlParams.get("id");
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
      const divCard = document.createElement("div");
      divCard.setAttribute("class", "card shadow-lg");
      const image = document.createElement("img");
      image.src = "uploads/" + post.image;
      image.style = "max-height:450px;";
      image.setAttribute("class", "img-fluid card-img-top");

      divCard.appendChild(image);

      const divCardBody = document.createElement("div");
      divCardBody.setAttribute("class", "card-body");

      const header = document.createElement("h4");
      header.setAttribute("class", "card-title");
      header.innerHTML = post.title;
      divCardBody.appendChild(header);

      const AdminDate = document.createElement("small");
      AdminDate.setAttribute("class", "text-muted");
      AdminDate.innerHTML = "Writen by " + post.admin + " On " + post.datetime;
      divCardBody.appendChild(AdminDate);

      divCardBody.appendChild(document.createElement("hr"));

      const postDescription = document.createElement("p");
      postDescription.setAttribute("class", "card-text");
      postDescription.innerHTML = post.text;
      divCardBody.appendChild(postDescription);

      divCard.appendChild(divCardBody);

      document.querySelector("#PublicSite").append(divCard);

      const b = document.createElement("br");
      b.setAttribute("id", "BR");
      document.querySelector("#PublicSite").append(b);
    })
    .catch(function (error) {
      console.log(error);
    });
}
