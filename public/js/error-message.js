let error_block = document.getElementById("error_block");

let hideErrorMessage = function() {
    error_block.style.display = none;
}

function validateEmail() {
    var rgx =/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    err_email = document.forms["form_register"]["email"].value;
    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            if (xhr.responseText != 0){
                document.getElementById("email_error").innerHTML = "Email " + err_email + " is exist! Please use another email.";
                document.getElementById("email_error").style.display = "block";
            }
            else 
            {
                document.getElementById("email_error").style.display = "none";
                document.getElementById("email").style.border  = "1px solid green";
            }
        }
    };
    var email = document.getElementById('email').value;
    if (rgx.test(email)) {
        xhr.open('POST', 'register/validate_email');
        data = JSON.stringify({ "email": email })
        xhr.send(data);
    }
    else {
        document.getElementById("email_error").style.display = "block";
        document.getElementById("email_error").innerHTML = "Use email format: name@example.com";
    }
}


function validateUsername() {
    var rgx = /^\w+$/;
    err_username = document.forms["form_register"]["username"].value;
    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            if (xhr.responseText != "null"){
                document.getElementById("username_error").innerHTML = "Username " + err_username + " is exist! Please use another username.";
                document.getElementById("username_error").style.display = "block";
            }
            else 
            {
                document.getElementById("username_error").style.display = "none";
                document.getElementById("username").style.border  = "1px solid green";
            }
        }
    };
    var username = document.getElementById('username').value;
    if (rgx.test(username)) {
        xhr.open('POST', 'register/validate_username');
        data = JSON.stringify({ "username": err_username })
        xhr.send(data);
    }
    else {
        document.getElementById("username_error").style.display = "block";
        document.getElementById("username_error").innerHTML = "Only use alphabets, number or underscore.";
    }
}


function validatePhone() {
    err_phone = document.forms["form_register"]["phone"].value;
    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            if (xhr.responseText != 0){
                document.getElementById("phone_error").innerHTML = "Phone number " + err_phone + " is exist! Please use another phone number.";
                document.getElementById("phone_error").style.display = "block";
            }
            else 
            {
                document.getElementById("phone_error").style.display = "none";
                document.getElementById("phone").style.border  = "1px solid green";
            }
        }
    };
    if (err_phone.length <= 12 && err_phone.length >= 9) {
        xhr.open('POST', 'register/validate_phone');
        data = JSON.stringify({ "phone": err_phone })
        xhr.send(data);
    }
    else {
        document.getElementById("phone_error").style.display = "block";
        document.getElementById("phone_error").innerHTML = "Phone number should be 9-12 number";
    }
}

function validateConfirmPassword() {
    err_pw = document.forms["form_register"]["confirm-pw"].value;
    pw = document.forms["form_register"]["password"].value;
    

    if (err_pw == pw) {
        document.getElementById("confirm-pw_error").style.display = "none";
        document.getElementById("confirm-pw").style.border  = "1px solid green";
       
    }
    else {
        document.getElementById("confirm-pw_error").style.display = "block";
        document.getElementById("confirm-pw_error").innerHTML = "Password don't match";
    }
}
