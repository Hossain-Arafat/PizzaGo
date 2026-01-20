document.addEventListener("DOMContentLoaded", function () {
  const form = document.querySelector("form");
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
    const emailVal = email.value.trim();
    const passVal = password.value.trim();

    if (emailVal === "") {
      alert("Email is required.");
      email.focus();
      e.preventDefault();
      return;
    }

    if (!isValidEmail(emailVal)) {
      alert("Please enter a valid email address.");
      email.focus();
      e.preventDefault();
      return;
    }

    if (passVal === "") {
      alert("New Password is required.");
      password.focus();
      e.preventDefault();
      return;
    }

    if (!isValidPassword(passVal)) {
      alert("Password must be alphanumeric and at least 6 characters (e.g., Abc123).");
      password.focus();
      e.preventDefault();
      return;
    }
  });
});
