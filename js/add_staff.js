// ../js/add_staff.js
document.addEventListener("DOMContentLoaded", function () {
  const form = document.querySelector("form");
  const name = document.getElementById("name");
  const email = document.getElementById("email");
  const password = document.getElementById("password");

  function isValidEmail(value) {
    const pattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return pattern.test(value);
  }

  function isValidPassword(value) {
    const pattern = /^[A-Za-z0-9]{6,}$/;
    return pattern.test(value);
  }

  form.addEventListener("submit", function (e) {
    const n = name.value.trim();
    const em = email.value.trim();
    const pw = password.value.trim();

    if (n === "" || em === "" || pw === "") {
      alert("All fields are required.");
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

    if (!isValidPassword(pw)) {
      alert("Password must be alphanumeric and at least 6 characters (e.g., Abc123).");
      password.focus();
      e.preventDefault();
      return;
    }
  });
});
