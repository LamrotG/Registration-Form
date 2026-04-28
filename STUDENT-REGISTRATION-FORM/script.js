document.getElementById("registerForm").addEventListener("submit", function(e){
    e.preventDefault();

    let valid = true;
    document.querySelectorAll(".error").forEach(el => el.textContent = "");

    const fname = document.getElementById("fname").value.trim();
    const lname = document.getElementById("lname").value.trim();
    const email = document.getElementById("email").value.trim();
    const username = document.getElementById("username").value.trim();
    const password = document.getElementById("password").value;
    const confirmPassword = document.getElementById("confirmPassword").value;
    const gender = document.querySelector('input[name="gender"]:checked');
    const year = document.getElementById("year").value;
    const department = document.getElementById("department").value;

    const namePattern = /^[A-Za-z]+$/;

    if(fname === "" || !namePattern.test(fname)){
        document.getElementById("fnameError").textContent = "Only letters allowed";
        valid = false;
    }

    if(lname === "" || !namePattern.test(lname)){
        document.getElementById("lnameError").textContent = "Only letters allowed";
        valid = false;
    }

    if(email === ""){
        document.getElementById("emailError").textContent = "Email is required";
        valid = false;
    }

    if(username === ""){
        document.getElementById("usernameError").textContent = "Username is required";
        valid = false;
    }

    if(password.length < 8){
        document.getElementById("passwordError").textContent = "Minimum 8 characters";
        valid = false;
    }

    if(password !== confirmPassword){
        document.getElementById("confirmPasswordError").textContent = "Passwords do not match";
        valid = false;
    }

    if(!gender){
        document.getElementById("genderError").textContent = "Gender is required";
        valid = false;
    }

    if(year === ""){
        document.getElementById("yearError").textContent = "Year is required";
        valid = false;
    }

    if(department === ""){
        document.getElementById("departmentError").textContent = "Department is required";
        valid = false;
    }

    if(valid){
        this.submit();
    }
});