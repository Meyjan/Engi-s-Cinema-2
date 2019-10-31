<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="<?= BASEURL ?>/css/form.css">
        <title>Register Engima</title>
    </head>
    <body>
        <div class="box_container">
            <div>
                <h2>Welcome to <strong>Engi</strong>ma!</h2>
            </div>
            <div id="err">
            </div>
            <div>
                
            </div>

            <form id="form_register" action="register/registing" method="post" >
                <div class="input-set">
                    <div class="input-label">
                        <label for="username">Username</label>
                    </div>
                    <div class="input-field">
                        <input type="text" id="username" name="username" placeholder="JohnDoe123" onkeyup="validateUsername();" required>
                        <span class="error" id="username_error"></span>
                    </div>
                </div>

                <div class="input-set">
                    <div class="input-label">
                       <label for="email">Email</label>
                    </div>
                    <div class="input-field">
                        <input type="email" id="email" name="email" placeholder="johndoe123@example.com" onkeyup="validateEmail();"required>
                        <span class="error" id="email_error"></span>
                    </div>
                </div>

                <div class="input-set">
                    <div class="input-label">
                        <label for="phone">Phone Number</label>
                    </div>
                    <div class="input-field">
                        <input type="number" id="phone" name="phone" placeholder="0812121212" onkeyup="validatePhone();" required>
                        <span class="error" id="phone_error"></span>
                    </div>
                </div>

                <div class="input-set">
                    <div class="input-label">
                       <label for="password">Password</label>
                    </div>
                    <div class="input-field">
                        <input type="password" id="password" name="password" placeholder="make as strong as possible" required>
                    </div>
                </div>

                <div class="input-set">
                    <div class="input-label">
                        <label for="confirm-pw">Confirm Password</label>
                    </div>
                    <div class="input-field">
                        <input type="password" id="confirm-pw" name="confirm-pw" placeholder="same as above" onkeyup="validateConfirmPassword();"required>
                        <span class="error" id="confirm-pw_error"></span>
                    </div>
                </div>

                <div class="input-set">
                    <div class="input-label">
                       <label for="profile-pic">Profile Picture</label>
                    </div>
                    <div class="input-field">
                        <div class="upload-btn-wrapper">
                            <span><input type="text" id="image-name" disabled/></span>
                            <span><button  class="btn">Browse</button></span>
                            <input type="file" id="fileinput" onclick="getImageName()" name="photo" accept="image/*"  required/>
                        </div>
                    </div>
                </div>
                
                <input type="submit" id="submitbutton" value="Register">
            </form>

            <p>Already have an account? <a href="login">Login here!</a></p>
        </div>
    </body> 
    <script src="<?= BASEURL ?>/js/error-message.js"></script>
    <script src="<?= BASEURL ?>/js/user.js"></script>
</html>