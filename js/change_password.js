// ../js/change_password.js
document.addEventListener("DOMContentLoaded", function () {
  const form = document.querySelector('form[action="../controller/passwordController.php"]');
  if (!form) return;

  const password = form.querySelector('input[name="password"]');

  function isValidPassword(value) {
    const pattern = /^[A-Za-z0-9]{6,}$/;
    return pattern.test(value);
  }

  form.addEventListener("submit", function (e) {
    const pw = password.value.trim();

    if (pw === "") {
      alert("New password is required.");
      password.focus();
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
