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
let statisticsURL="API/statistics/readStatistics.php"

const urlParams = new URLSearchParams(window.location.search);
const adminParam = urlParams.get("admin");
const userParam = urlParams.get("user");

if (adminParam) {
  fetchURL += `?admin=${adminParam}`;
  statisticsURL+=`?admin=${adminParam}`;
} else {
  fetchURL += `?user=${userParam}`;

}

window.onload = function () {
  readAllPosts();
  if(adminParam){
  readStatistics();
  }
};


function readStatistics(){

  fetch(statisticsURL, {
    method: "GET",
    headers: {
      "Content-Type": "application/json",
    },
  })
    .then((response) => {
      return response.json();
    })
    .then((statistics) => {

  document.querySelector('#post').append(statistics.postNr);
  document.querySelector('#category').append(statistics.categoryNr);
  document.querySelector('#admin').append(statistics.adminNr);
  document.querySelector('#users').append(statistics.userNr);
     

    }).catch(function (error) {
      console.log(error);
    });

}



function readAllPosts() {
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
          postDescription.innerHTML = post.text;
          divCardBody.appendChild(postDescription);

          //  const readMore=document.createElement('a');
          //  readMore.href=`FullPublicPost.php?id=${post.id}`;
          //  readMore.style='float:right;';
          //  const readMoreSpan=document.createElement('span');
          //  readMoreSpan.setAttribute('class','btn btn-info');
          //  readMoreSpan.innerHTML='Read More &rang;&rang;';
          //  readMore.appendChild(readMoreSpan);
          //  divCardBody.appendChild(readMore);

          divCard.appendChild(divCardBody);
          console.log();
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
