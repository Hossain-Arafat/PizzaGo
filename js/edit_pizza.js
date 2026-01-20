document.addEventListener("DOMContentLoaded", function () {
  const form = document.querySelector('form[action="../controller/updatePizzaController.php"]');

  if (!form) return;

  const name = form.querySelector('input[name="pizza_name"]');
  const desc = form.querySelector('textarea[name="description"]');
  const price = form.querySelector('input[name="price"]');
  const availability = form.querySelector('select[name="availability"]');

  form.addEventListener("submit", function (e) {
    const n = name.value.trim();
    const d = desc.value.trim();
    const p = price.value.trim();
    const a = availability.value;

    if (n === "" || d === "" || p === "") {
      alert("All fields are required.");
      e.preventDefault();
      return;
    }

    if (n.length < 2) {
      alert("Pizza name must be at least 2 characters.");
      name.focus();
      e.preventDefault();
      return;
    }

    if (isNaN(p) || Number(p) <= 0) {
      alert("Price must be a positive number.");
      price.focus();
      e.preventDefault();
      return;
    }

    if (a !== "in_stock" && a !== "out_of_stock") {
      alert("Please select a valid availability option.");
      e.preventDefault();
      return;
    }
  });
});
