// JS for forgot password start here

const forgotPasswordForm = document.querySelector(".forgot-password-form");

if (forgotPasswordForm) {

    forgotPasswordForm.noValidate = true;

    const forgotEmail = document.getElementById("email");
    const newPassword = document.getElementById("new-password");
    const confirmPassword = document.getElementById("confirm-password");


    // Handle Forgot Password

    function handleForgotPassword(event) {

        event.preventDefault();

        const emailValid = validateForgotEmail();
        const passwordValid = validateNewPassword();
        const confirmPasswordValid = validateConfirmNewPassword();

        if (
            emailValid &&
            passwordValid &&
            confirmPasswordValid
        ) {
            changePassword();
        }
    }


    // Validate Email

    function validateForgotEmail() {

        const value = forgotEmail.value.trim();

        if (value === "") {

            showForgotPasswordError(
                forgotEmail,
                "Email is required"
            );

            return false;
        }

        if (!isValidForgotEmail(value)) {

            showForgotPasswordError(
                forgotEmail,
                "Please enter a valid email address"
            );

            return false;
        }

        removeForgotPasswordError(forgotEmail);

        return true;
    }


    // Validate New Password

    function validateNewPassword() {

        const value = newPassword.value;

        if (value.trim() === "") {

            showForgotPasswordError(
                newPassword,
                "Password is required"
            );

            return false;
        }

        removeForgotPasswordError(newPassword);

        return true;
    }


    // Validate Confirm Password

    function validateConfirmNewPassword() {

        const value = confirmPassword.value;

        if (value.trim() === "") {

            showForgotPasswordError(
                confirmPassword,
                "Please confirm your password"
            );

            return false;
        }

        if (value !== newPassword.value) {

            showForgotPasswordError(
                confirmPassword,
                "Passwords do not match"
            );

            return false;
        }

        removeForgotPasswordError(confirmPassword);

        return true;
    }


    // Validate Email Format

    function isValidForgotEmail(value) {

        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value);
    }


    // Show Error

    function showForgotPasswordError(input, message) {

        removeForgotPasswordError(input);

        input.style.setProperty(
            "border",
            "1px solid red",
            "important"
        );

        const error = document.createElement("span");

        error.classList.add("validation-error");
        error.textContent = message;

        error.style.color = "red";
        error.style.fontSize = "12px";
        error.style.display = "block";
        error.style.marginTop = "4px";

        input.parentElement.appendChild(error);
    }


    // Show Backend Error

    function showForgotPasswordBackendError(input, message) {

        removeForgotPasswordError(input);

        const error = document.createElement("span");

        error.classList.add("backend-error");
        error.textContent = message;

        error.style.color = "red";
        error.style.fontSize = "12px";
        error.style.display = "block";
        error.style.marginTop = "4px";

        input.parentElement.appendChild(error);
    }


    // Show Success

    function showForgotPasswordSuccess(input, message) {

        removeForgotPasswordError(input);

        const success = document.createElement("span");

        success.classList.add("validation-success");
        success.textContent = message;

        success.style.color = "green";
        success.style.fontSize = "12px";
        success.style.display = "block";
        success.style.marginTop = "4px";

        input.parentElement.appendChild(success);
    }


    // Remove Error

    function removeForgotPasswordError(input) {

        input.style.removeProperty("border");

        const error =
            input.parentElement.querySelector(".validation-error");

        if (error) {
            error.remove();
        }

        const backendError =
            input.parentElement.querySelector(".backend-error");

        if (backendError) {
            backendError.remove();
        }

        const success =
            input.parentElement.querySelector(".validation-success");

        if (success) {
            success.remove();
        }
    }


    // Change Password

    function changePassword() {

        const formData = new FormData(forgotPasswordForm);

        fetch(forgotPasswordForm.action, {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {

            if (data.success) {

                showForgotPasswordSuccess(
                    newPassword,
                    data.message
                );

                forgotPasswordForm.reset();

            } else {

                showForgotPasswordBackendError(
                    forgotEmail,
                    data.message
                );
            }

        })
        .catch(error => {

            showForgotPasswordBackendError(
                forgotEmail,
                "Something went wrong. Please try again."
            );

            // console.log(error);
        });
    }


    // Email Input Handler

    forgotEmail.addEventListener("input", function () {

        if (
            isValidForgotEmail(
                forgotEmail.value.trim()
            )
        ) {
            removeForgotPasswordError(forgotEmail);
        }
    });


    // New Password Input Handler

    newPassword.addEventListener("input", function () {

        if (newPassword.value.trim() !== "") {
            removeForgotPasswordError(newPassword);
        }

        if (
            confirmPassword.value !== "" &&
            confirmPassword.value === newPassword.value
        ) {
            removeForgotPasswordError(confirmPassword);
        }
    });


    // Confirm Password Input Handler

    confirmPassword.addEventListener("input", function () {

        if (
            confirmPassword.value !== "" &&
            confirmPassword.value === newPassword.value
        ) {
            removeForgotPasswordError(confirmPassword);
        }
    });


    // Form Submit Event

    forgotPasswordForm.addEventListener(
        "submit",
        handleForgotPassword
    );
}


// JS for forgot password end here