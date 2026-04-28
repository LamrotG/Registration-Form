document.getElementById("loginForm").addEventListener("submit", function(e){
    let username = document.getElementById("username").value.trim();
    let password = document.getElementById("password").value;
    let valid = true;

    document.getElementById("usernameError").textContent = "";
    document.getElementById("passwordError").textContent = "";

    if(username === ""){
        document.getElementById("usernameError").textContent = "Username is required";
        valid = false;
    }

    if(password === ""){
        document.getElementById("passwordError").textContent = "Password is required";
        valid = false;
    }

    if(!valid){
        e.preventDefault();
    }
});