function deletePizza(id, btn) {
  if (!confirm("Are you sure you want to delete this pizza?")) {
    return;
  }

  if (btn) btn.disabled = true;

  var xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = function () {
    if (this.readyState === 4) {

      if (btn) btn.disabled = false;

      if (this.status === 200 && this.responseText.trim() === "SUCCESS") {
        var row = document.getElementById("pizza-row-" + id);
        if (row) row.remove();
      }
    }
  };

  xhttp.open("POST", "../controller/deletePizzaController.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("id=" + encodeURIComponent(id));
}
