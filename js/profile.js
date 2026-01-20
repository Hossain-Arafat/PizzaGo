// ../js/profile.js
document.addEventListener("DOMContentLoaded", function () {
  const form = document.querySelector('form[action="../controller/profileController.php"]');
  if (!form) return;

  const name = form.querySelector('input[name="name"]');
  const email = form.querySelector('input[name="email"]');

  function isValidEmail(value) {
    const pattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return pattern.test(value);
  }

  form.addEventListener("submit", function (e) {
    const n = name.value.trim();
    const em = email.value.trim();

    if (n === "" || em === "") {
      alert("Name and Email are required.");
      e.preventDefault();
      return;
    }

    if (n.length < 2) {
      alert("Name must be at least 2 characters.");
      name.focus();
      e.preventDefault();
      return;
    }

    if (!isValidEmail(em)) {
      alert("Please enter a valid email address.");
      email.focus();
      e.preventDefault();
      return;
    }
  });
});
