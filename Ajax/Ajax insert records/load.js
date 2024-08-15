window.addEventListener("DOMContentLoaded", function () {
  document.querySelector("#save-button").addEventListener("click", ajaxFun);

  async function ajaxFun(e) {
    try {
      const response = await fetch("ajax-load.php");
      const data = await response.text();
      document.querySelector("#table-data").innerHTML = data;
    } catch {
      console.log("there is an error");
    }
  }
  ajaxFun();
});
