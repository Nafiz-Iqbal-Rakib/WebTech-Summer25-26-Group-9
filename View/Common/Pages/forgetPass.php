<?php include '../../Layouts/header.php'; ?>

<main class="main-content">

    <div class="form-container">

        <h1 class="title">Forgot Password</h1>

        <form
            action="../../../Controller/ForgotPasswordController.php"
            method="POST"
            class="forgot-password-form"
        >

            <!-- Email Address -->

            <div class="input-group">

                <label for="email">Email Address</label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="Enter your email address"
                >

            </div>


            <hr class="divider">


            <!-- Verification Code -->

            <div class="input-group">

                <div class="verification-header">

                    <label for="verification-code-1">
                        Verification Code
                    </label>

                    <button type="button" class="send-code-btn"> Send code </button>

                </div>


                <div class="code-inputs">

                    <input
                        type="text"
                        id="verification-code-1"
                        name="code1"
                        maxlength="1"
                        inputmode="numeric"
                    >

                    <input
                        type="text"
                        name="code2"
                        maxlength="1"
                        inputmode="numeric"
                    >

                    <input
                        type="text"
                        name="code3"
                        maxlength="1"
                        inputmode="numeric"
                    >

                    <input
                        type="text"
                        name="code4"
                        maxlength="1"
                        inputmode="numeric"
                    >

                    <input
                        type="text"
                        name="code5"
                        maxlength="1"
                        inputmode="numeric"
                    >

                    <input
                        type="text"
                        name="code6"
                        maxlength="1"
                        inputmode="numeric"
                    >

                </div>

            </div>


            <hr class="divider">


            <!-- New Password -->

            <div class="input-group">

                <label for="new-password">
                    New Password
                </label>

                <input
                    type="password"
                    id="new-password"
                    name="new_password"
                    placeholder="Enter your new password"
                >

            </div>


            <!-- Confirm Password -->

            <div class="input-group">

                <label for="confirm-password">
                    Confirm New Password
                </label>

                <input
                    type="password"
                    id="confirm-password"
                    name="confirm_password"
                    placeholder="Re-enter your new password"
                >

            </div>


            <!-- Submit Button -->

            <button
                type="submit"
                class="submit-btn"
            >
                Change Password
            </button>

        </form>


        <div class="footer-link">

            Remembered your password?

            <a href="/WebTech-Summer25-26-Group-9/View/Common/Pages/loginPage.php">
                Log in
            </a>

        </div>

    </div>


    <script src="/WebTech-Summer25-26-Group-9/View/Common/JS/forgotPassword.js"></script>

</main>