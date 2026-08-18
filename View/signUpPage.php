<?php include 'Layouts/header.php'; ?>

<!-- Register Section -->
<section class="register-section">
    <div class="register-container">
        
        <!-- Tabs -->
        <div class="tab-headers">
            <a href="#" class="tab">LOGIN</a>
            <a href="#" class="tab active">REGISTER</a>
        </div>

        <!-- Register Form -->
        <form class="register-form" action=" " method="POST">
            
            <div class="form-group">
                <input 
                    type="text"
                    id="firstName"
                    name="firstName"
                    class="form-control"
                    placeholder="First name"
                >
            </div>
            
            <div class="form-group">
                <input 
                    type="text"
                    id="lastName"
                    name="lastName"
                    class="form-control"
                    placeholder="Last name"
                >
            </div>

            <div class="form-group">
                <input 
                    type="text"
                    id="username"
                    name="username"
                    class="form-control"
                    placeholder="Username"
                >
            </div>

            <div class="form-group">
                <input 
                    type="email"
                    id="email"
                    name="email"
                    class="form-control"
                    placeholder="Email address *"
                    required
                >
            </div>

            <div class="form-group">
                <input 
                    type="tel"
                    id="phone"
                    name="phone"
                    class="form-control"
                    placeholder="Phone number"
                >
            </div>

            <div class="form-group">
                <input 
                    type="password"
                    id="password"
                    name="password"
                    class="form-control"
                    placeholder="Password *"
                    required
                >
            </div>

            <div class="form-group">
                <input 
                    type="password"
                    id="confirmPassword"
                    name="confirmPassword"
                    class="form-control"
                    placeholder="Confirm password *"
                    required
                >
            </div>

            <!-- Privacy Policy Disclaimer -->
            <p class="privacy-disclaimer">
                Your personal data will be used to support your experience throughout this website, 
                to manage access to your account, and for other purposes described in our privacy policy.
            </p>

            <!-- Submit Button -->
            <button type="submit" class="btn-submit">REGISTER</button>

            <!-- Login Prompt -->
            <div class="auth-prompt">
                Already have an account? <a href="loginPage.php">LOG IN</a>
            </div>

        </form>
    </div>
</section>

<?php include 'Layouts/footer.php'; ?>