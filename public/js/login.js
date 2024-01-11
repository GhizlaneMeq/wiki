function validateForm() {
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var emailError = document.getElementById("emailError");
    var passwordError = document.getElementById("passwordError");

    emailError.innerHTML = "";
    passwordError.innerHTML = "";

    if (email.trim() === "") {
        emailError.innerHTML = "Email is required.";
        return false;
    }

    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        emailError.innerHTML = "Invalid email format.";
        return false;
    }

    if (password.trim() === "") {
        passwordError.innerHTML = "Password is required.";
        return false;
    }

    return true;
}
