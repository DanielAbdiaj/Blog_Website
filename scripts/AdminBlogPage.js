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
  readAllPosts();
};

const urlParams = new URLSearchParams(window.location.search);
const paramAdmin = urlParams.get("admin");

async function readAllPosts() {
  await fetch(`API/post/readAll.php?admin=${paramAdmin}`, {
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
        alert.innerHTML = data["danger"];
        document.querySelector(".table").after(alert);
      } else {
        let cnt = 1;
        data.forEach((post) => {
          const tableBody = document.createElement("tbody");
          const tableRow = document.createElement("tr");

          const tdCount = document.createElement("td");
          const tdTitle = document.createElement("td");
          const tdCategory = document.createElement("td");
          const tdDatetime = document.createElement("td");
          const tdAuthor = document.createElement("td");
          const tdImage = document.createElement("td");
          const tdEditDelete = document.createElement("td");
          const tdLivePreview = document.createElement("td");

          tdCount.innerHTML = `${cnt++}`;
          tableRow.appendChild(tdCount);

          if (post.title.length > 20) {
            post.title = post.title.substring(0, 18) + "...";
          }
          tdTitle.innerHTML = post.title;
          tableRow.appendChild(tdTitle);

          if (post.category.length > 10) {
            post.title = post.title.substring(0, 10) + "...";
          }
          tdCategory.innerHTML = post.category;
          tableRow.appendChild(tdCategory);

          if (post.datetime.length > 11) {
            post.datetime = post.datetime.substring(0, 11) + "...";
          }
          tdDatetime.innerHTML = post.datetime;
          tableRow.appendChild(tdDatetime);

          if (post.admin.length > 10) {
            post.admin = post.admin.substring(0, 10) + "...";
          }
          tdAuthor.innerHTML = post.admin;
          tableRow.appendChild(tdAuthor);

          const image = document.createElement("img");
          image.src = `uploads/${post.image}`;
          image.setAttribute("width", "170px;");
          image.setAttribute("height", "50px;");
          tdImage.appendChild(image);
          tableRow.appendChild(tdImage);

          const EditPost = document.createElement("a");
          EditPost.href = `EditPost.php?id=${post.id}&admin=${paramAdmin}`;
          const EditSpan = document.createElement("span");
          EditSpan.setAttribute("class", "btn btn-warning mb-2 mr-1");
          EditSpan.innerHTML = "Edit";
          EditPost.append(EditSpan);
          tdEditDelete.appendChild(EditPost);

          const DeletePost = document.createElement("a");
          DeletePost.href = `DeletePost.php?id=${post.id}&admin=${paramAdmin}`;
          const DeleteSpan = document.createElement("span");
          DeleteSpan.setAttribute("class", "btn btn-danger mb-2");
          DeleteSpan.innerHTML = "Delete";
          DeletePost.append(DeleteSpan);
          tdEditDelete.appendChild(DeletePost);

          tableRow.appendChild(tdEditDelete);

          const LivePreview = document.createElement("a");
          LivePreview.href = `FullPublicPost.php?id=${post.id}`;
          LivePreview.target = "_blank";
          const LivePreviewSpan = document.createElement("span");
          LivePreviewSpan.setAttribute("class", "btn btn-primary");
          LivePreviewSpan.innerHTML = "Live Preview";
          LivePreview.append(LivePreviewSpan);
          tdLivePreview.appendChild(LivePreview);
          target = "_blank";

          tableRow.appendChild(tdLivePreview);

          tableBody.appendChild(tableRow);

          document.querySelector("#table").append(tableBody);
        });
      }
    })
    .catch(function (error) {
      console.log(error);
    });
}
