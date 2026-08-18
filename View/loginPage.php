<?php include 'Layouts/header.php'; ?> 
 
<!-- Login Section --> 
<section class="login-section"> 
    <div class="login-container"> 
         
        <!-- Tabs --> 
        <div class="tab-headers"> 
            <a href="#" class="tab active">LOGIN</a> 
            <a href="#" class="tab">REGISTER</a> 
        </div> 
 
        <!-- Login Form --> 
        <form class="login-form" action="" method=""> 
             
            <!-- Username Input --> 
            <div class="form-group"> 
                <label class="floating-label" for="email">E-mail</label> 
                <input 
                    type="text" 
                    id="email"
                    name="email"
                    class="form-control" 
                    placeholder="Enter E-mail here"
                > 
            </div> 
 
            <!-- Password Input --> 
            <div class="form-group has-label"> 
                <label class="floating-label" for="password">Password</label> 
                <input 
                    type="password" 
                    id="password"
                    name="password"
                    class="form-control input-dark-border"
                > 
            </div> 
 
            <!-- Options Remember me & Lost password --> 
            <div class="form-options"> 
                <label class="remember-label" for="remember"> 
                    <input 
                        type="checkbox"
                        id="remember"
                        name="remember"
                    > 
                    Remember me 
                </label> 
                
                <a href="#" class="forgot-link">Lost password?</a> 
            </div> 
 
            <!-- Submit Button --> 
            <button type="button" class="btn-submit" id="loginBtn">
                LOG IN
            </button> 
         
            <script> 
                document.getElementById("loginBtn").addEventListener("click", function() { 
                    window.location.href = "/WebTech-Summer25-26-Group-9/View/Admin/adminDashboardPage.php"; 
                }); 
            </script> 
 
            <!-- Create Account Link --> 
            <div class="register"> 
                No account yet? <a href="signUpPage.php">Create Account</a> 
            </div> 
 
        </form> 
    </div> 
</section> 
 
<?php include 'Layouts/footer.php'; ?>