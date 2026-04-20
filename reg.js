const termsCheckbox = document.getElementById("terms");
const createBtn = document.getElementById("createBtn");

termsCheckbox.addEventListener("change", function () {
    if (this.checked) {
        createBtn.disabled = false;
        createBtn.classList.add("enabled");
    } else {
        createBtn.disabled = true;
        createBtn.classList.remove("enabled");
    }
});

document.getElementById("registerForm").addEventListener("submit", function(e) {
    let valid = true;

    const fullName = document.getElementById("full_name");
    const email = document.getElementById("email");
    const password = document.getElementById("password");
    const confirmPassword = document.getElementById("confirm_password");
    const terms = document.getElementById("terms");

    document.querySelectorAll(".error").forEach(el => el.textContent = "");

    if (fullName.value.trim() === "") {
        document.getElementById("nameError").textContent = "Full name is required.";
        valid = false;
    }

    if (email.value.trim() === "") {
        document.getElementById("emailError").textContent = "Email is required.";
        valid = false;
    }

    if (password.value.trim() === "") {
        document.getElementById("passwordError").textContent = "Password is required.";
        valid = false;
    }

    if (confirmPassword.value !== password.value) {
        document.getElementById("confirmError").textContent = "Passwords do not match.";
        valid = false;
    }

    if (!terms.checked) {
        document.getElementById("termsError").textContent = "You must accept the terms.";
        valid = false;
    }

    if (!valid) {
        e.preventDefault();
    }
});