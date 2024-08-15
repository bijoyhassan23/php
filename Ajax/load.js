window.addEventListener("DOMContentLoaded", function () {
  document.querySelector("#save-button").addEventListener("click", clickFun);

  async function ajaxFun() {
    try {
      const response = await fetch("ajax-load.php");
      const data = await response.text();
      document.querySelector("#table-data").innerHTML = data;
    } catch {
      console.log("there is an error");
    }
  }
  ajaxFun();

  async function clickFun(e) {
    e.preventDefault();
    let fname = await document.getElementById("fname").value;
    let lname = await document.getElementById("lname").value;
    if (!fname && !lname) {
      alert("Please fill in the fields");
      return;
    }
    let option = {
      method: "POST",
      headers: {
        "content-type": "application/json",
      },
      body: JSON.stringify({
        first_name: fname,
        last_name: lname,
      }),
    };
    try {
      const response = await fetch("ajax-insert.php", option);
      const data = await response.text();
      if (data == "true") {
        ajaxFun();
      } else {
        alert("There is an issue with data insert");
      }
    } catch {
      console.log("error with uploading");
    }
  }

  document.addEventListener("click", function (ele) {
    if (confirm("Do you really want to delete this data")) {
      if (ele.target.classList.contains("deleted-btn")) {
        let options = {
          method: "POST",
          headers: {
            "content-type": "application/json",
          },
          body: JSON.stringify({
            id: ele.target.getAttribute("data-id"),
          }),
        };
        fetch("ajax-delete.php", options)
          .then(function (x) {
            return x.text();
          })
          .then(function (y) {
            if (y == "true") {
              ajaxFun();
            } else {
              alert("There is an issue with data delete");
            }
          })
          .catch(function () {
            console.log("error with deleting");
          });
      }
    }
  });
});
