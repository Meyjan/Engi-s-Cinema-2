function fileNameUpdate() {
    document.getElementById("InputFile").innerHTML = document.getElementById("file").value;
}

function formCheck(e) {
    let form = new FormData(document.forms.form_registration);

    let request = new XMLHttpRequest();
    request.open("POST", "../php/RegisterPage.php");
    request.send(form);

    document.getElementById('username-error').innerHTML = "";
    document.getElementById('email-error').innerHTML = "";
    document.getElementById('password-error').innerHTML = "";
    document.getElementById('confirm_password-error').innerHTML = "";
    document.getElementById('phone-error').innerHTML = "";
    document.getElementById('photo-error').innerHTML = "";


    request.onload = () => {
        let response = request.response;
        console.log(response);

        if (response.length == 0) {
            window.location.replace('../html/LoginPage.html');
        }
        else {
            response = response.split(";;");
            for (let i = 0; i < response.length; i++){
                response[i] = response[i].split(";");
            }
            console.log(response);

            for (let i = 0; i < response.length; i++) {
                switch (response[i][0]) {
                    case "username":
                        document.getElementById('username-error').innerHTML = response[i][1];
                        break;
                    case "email":
                        document.getElementById('email-error').innerHTML = response[i][1];
                        break;
                    case "phone":
                        document.getElementById('phone-error').innerHTML = response[i][1];
                        break;
                    case "password":
                        document.getElementById('password-error').innerHTML = response[i][1];
                        break;
                    case "confirmpassword":
                        document.getElementById('confirm_password-error').innerHTML = response[i][1];
                        break;
                    case "photo":
                        document.getElementById('photo-error').innerHTML = response[i][1];
                        break;
                }
                console.log(i);
            }
        }
    };

    e.preventDefault();
}

document.getElementById("form_registration").addEventListener("submit", formCheck);