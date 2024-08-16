window.addEventListener("DOMContentLoaded", function () {
  const getModal = document.getElementById("modal");
  const getEditFfild = document.getElementById("edit-fname");
  const getEditLfild = document.getElementById("edit-lname");
  const getSaveEditBtn = document.getElementById("edit-save-btn");
  const getSearchFild = document.getElementById("search");

  let tempId;

  getSearchFild.addEventListener("input", function () {
    ajaxFun();
  });

  document.getElementById("close-modal").addEventListener("click", closemodal);

  function closemodal() {
    getModal.setAttribute("active-status", false);
  }

  document.querySelector("#save-button").addEventListener("click", clickFun);

  async function ajaxFun(page = 1) {
    try {
      const tempFrom = new FormData();
      tempFrom.append("searchData", getSearchFild.value);
      tempFrom.append("page", page);

      const option = {
        method: "POST",
        body: tempFrom,
      };
      const response = await fetch("ajax-load.php", option);
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
    if (ele.target.classList.contains("deleted-btn")) {
      if (confirm("Do you really want to delete this data")) {
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

    if (ele.target.classList.contains("edit-btn")) {
      getModal.setAttribute("active-status", true);
      let getId = ele.target.getAttribute("data-eid");
      tempId = getId;

      const fromFild = new FormData();
      fromFild.append("sid", getId);
      fetch("getFildValue.php", {
        method: "POST",
        body: fromFild,
      })
        .then((x) => x.json())
        .then((y) => {
          getEditFfild.value = y["first_name"];
          getEditLfild.value = y["last_name"];
        });
    }

    if (ele.target.classList.contains("pagi-nation")) {
      let getPage = ele.target.getAttribute("page-no");
      ajaxFun(getPage);
    }
  });

  getSaveEditBtn.addEventListener("click", editFun);

  function editFun() {
    const fromFilds = new FormData();

    fromFilds.append("sid", tempId);
    fromFilds.append("sfname", getEditFfild.value);
    fromFilds.append("slname", getEditLfild.value);

    fetch("ajax-update.php", {
      method: "POST",
      body: fromFilds,
    })
      .then((x) => x.text())
      .then((y) => {
        if (y == "true") {
          closemodal();
          ajaxFun();
        } else {
          alert("There is an issue with data update");
        }
      });
  }
});
