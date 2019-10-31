<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="<?= BASEURL ?>/css/form.css">
        <title>Login Engima</title>
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

            <form id="form_login" action="login/validate_login" method="post">
                <div class="input-set">
                    <span class="error" id="email-pw_error"></span>
                    <div class="input-label">
                        <label for="email">Email</label>
                    </div>
                    <div class="input-field">
                        <input type="email" id="email" name="email" placeholder="johndoe@example.com" required>
                    </div>
                </div>

                <div class="input-set">
                    <div class="input-label">
                       <label for="password">Password</label>
                    </div>
                    <div class="input-field">
                        <input type="password" id="password" name="password" placeholder="place here" required>
                    </div>
                </div>
                
                <input type="submit" id="submitbutton" value="Login">
            </form>

            <p>Don't have any account? <a href="register">Register here!</a></p>
        </div>
    </body> 
    <script src="<?= BASEURL ?>/js/error-message.js"></script>
    <script src="<?= BASEURL ?>/js/user.js"></script>
</html>