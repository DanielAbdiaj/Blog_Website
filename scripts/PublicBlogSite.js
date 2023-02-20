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

let fetchURL = "API/post/readAll.php";

const urlParams = new URLSearchParams(window.location.search);
const param = urlParams.get("success");

window.onload = function () {
  readAllPosts(fetchURL);
  loggedOutSuccess(param);
};

function loggedOutSuccess(success) {
  if (success) {
    const alert = document.createElement("div"); //creating a div to show the message to the user
    alert.setAttribute("class", "alert alert-success");
    alert.innerHTML = success;
    document.querySelector("#Row").before(alert);
  }
}

document
  .querySelector("#searchBtt")
  .addEventListener("click", function (event) {
    event.preventDefault();

    document.querySelectorAll(".card").forEach((e) => e.remove());
    document.querySelectorAll("#BR").forEach((e) => e.remove());
    document.querySelectorAll("#Alert").forEach((e) => e.remove());

    fetchURL =
      "API/post/readAll.php" +
      `?Search=${document.querySelector("#searchBar").value}`;

    readAllPosts(fetchURL);
  });

function readAllPosts(fetchURL) {
  fetch(fetchURL, {
    method: "GET",
    headers: {
      "Content-Type": "application/json",
    },
  })
    .then((response) => {
      return response.json();
    })
    .then((data) => {
      if (Object.keys(data)[0] == "danger") {
        const alert = document.createElement("div"); //creating a div to show the message to the user
        alert.setAttribute("class", "alert alert-danger");
        alert.setAttribute("id", "Alert");
        alert.innerHTML = data["danger"];
        document.querySelector("#Row").after(alert);
      } else {
        data.forEach((post) => {
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
          AdminDate.innerHTML =
            "Writen by " + post.admin + " On " + post.datetime;
          divCardBody.appendChild(AdminDate);

          divCardBody.appendChild(document.createElement("hr"));

          const postDescription = document.createElement("p");
          postDescription.setAttribute("class", "card-text");
          if (post.text.length > 150) {
            post.text = post.text.substring(0, 150) + "...";
          }
          postDescription.innerHTML = post.text;
          divCardBody.appendChild(postDescription);

          const readMore = document.createElement("a");
          readMore.href = `FullPublicPost.php?id=${post.id}`;
          readMore.style = "float:right;";
          const readMoreSpan = document.createElement("span");
          readMoreSpan.setAttribute("class", "btn btn-info");
          readMoreSpan.innerHTML = "Read More &rang;&rang;";
          readMore.appendChild(readMoreSpan);
          divCardBody.appendChild(readMore);

          divCard.appendChild(divCardBody);

          document.querySelector("#PublicSite").append(divCard);

          const b = document.createElement("br");
          b.setAttribute("id", "BR");
          document.querySelector("#PublicSite").append(b);
        });
      }
    })
    .catch(function (error) {
      console.log(error);
    });
}
