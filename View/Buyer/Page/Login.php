<?php
include "../../../Controller/LoginValidation.php";
?>

<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>MiniMart - Login</title>
        <link rel="stylesheet" href="../Design/Login.css">

        <script>
            function collect_data()
            {
                let email=document.getElementById("email").value.trim();
                let password=document.getElementById("password").value.trim();

                let valid=true;
                let message="";

                if(email.length<5)
                {
                    message+="E-mail Must be at least 5 Char\n";
                    valid=false;
                }

                if(password.length<5)
                {
                    message+="Password Must be at least 5 Char";
                    valid=false;
                }

                if(!valid)
                {
                    alert(message);
                }

                return valid;
            }
        </script>
    </head>

    <body>

        <section class="login-section">

            <div class="login-container">

                <div class="tab-headers">
                    <a href="Login.php" class="tab active">LOGIN</a>
                    <a href="#" class="tab">REGISTER</a>
                </div>

                <form class="login-form" method="post" action="" onsubmit="return collect_data()">

                    <div class="form-group">
                        <label class="floating-label" for="email">E-mail</label>

                        <input
                            type="text"
                            id="email"
                            name="email"
                            class="form-control"
                            value="<?php echo $email; ?>"
                            placeholder="Enter E-mail here"
                        >
                    </div>


                    <div class="form-group has-label">

                        <label class="floating-label" for="password">
                            Password
                        </label>

                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="form-control input-dark-border"
                        >

                    </div>


                    <div class="form-options">

                        <label class="remember-label" for="remember">

                            <input
                                type="checkbox"
                                id="remember"
                                name="remember"
                            >

                            Remember me

                        </label>

                        <a href="#" class="forgot-link">
                            Lost password?
                        </a>

                    </div>


                    <input
                        type="submit"
                        class="btn-submit"
                        value="LOG IN"
                    >


                    <p class="validationMessage">
                        <?php echo $message; ?>
                    </p>


                    <div class="register">
                        No account yet? <a href="#">Create Account</a>
                    </div>

                </form>

            </div>

        </section>

    </body>
</html>
