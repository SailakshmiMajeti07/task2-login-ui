// Login Form
const loginForm = document.getElementById("loginForm");

if(loginForm){

    loginForm.addEventListener("submit", function(e){

        e.preventDefault();

        alert("Login Successful!");

    });

}

// Register Form
const registerForm = document.getElementById("registerForm");

if(registerForm){

    registerForm.addEventListener("submit", function(e){

        e.preventDefault();

        alert("Registration Successful!");

    });

}

// Show / Hide Password
function togglePassword(){

    const password =
    document.getElementById("password");

    if(password.type === "password"){

        password.type = "text";

    } else {

        password.type = "password";

    }
}