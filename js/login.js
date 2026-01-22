function sendLogin() {
    var email = document.getElementById("email").value.trim();
    var password = document.getElementById("password").value.trim();
    var msg = document.getElementById("msg");

    msg.innerHTML = "";

    if (email === "" || password === "") {
        msg.innerHTML = "Email and Password are required.";
        msg.className = "msg error";
        return;
    }

    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {

            if (this.responseText.startsWith("SUCCESS")) {
                var parts = this.responseText.split("|");
                msg.className = "msg success";
                msg.innerHTML = "Login successful. Redirecting...";
                window.location.href = parts[1];
            } 
            else {
                msg.className = "msg error";
                msg.innerHTML = this.responseText;
            }
        }
    };

    xhttp.open("POST", "../controller/loginController.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhttp.send(
        "email=" + encodeURIComponent(email) +
        "&password=" + encodeURIComponent(password)
    );
}
