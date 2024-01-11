
function validateForm() {
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("confirm-password").value;

    var nameError = document.getElementById("nameError");
    var emailError = document.getElementById("emailError");
    var passwordError = document.getElementById("passwordError");
    var confirmPasswordError = document.getElementById("confirmPasswordError");

    nameError.innerHTML = "";
    emailError.innerHTML = "";
    passwordError.innerHTML = "";
    confirmPasswordError.innerHTML = "";

    if (name.trim() === "") {
        nameError.innerHTML = "Name is required.";
        return false;
    }

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

    if (confirmPassword.trim() === "") {
        confirmPasswordError.innerHTML = "Confirm Password is required.";
        return false;
    }

    if (password !== confirmPassword) {
        confirmPasswordError.innerHTML = "Passwords do not match.";
        return false;
    }

    return true;
}
