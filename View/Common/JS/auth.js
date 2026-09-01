// JS for login start here 
 
const loginForm = document.querySelector(".login-form"); 
 
if (loginForm) { 
 
    const loginEmail = document.getElementById("email"); 
    const loginPassword = document.getElementById("password"); 
    const loginBtn = document.getElementById("loginBtn"); 
 
 
    // Handle Login 
    function handleLogin(event) { 
 
        event.preventDefault(); 
 
        const emailValid = validateLoginEmail(); 
        const passwordValid = validateLoginPassword(); 
 
        if (emailValid && passwordValid) { 
            sendLoginRequest(); 
        } 
 
        return false; 
    } 
 
 
    // Validate Email 
    function validateLoginEmail() { 
 
        const emailValue = loginEmail.value.trim(); 
 
        if (emailValue === "") { 
            showLoginError(loginEmail, "Email is required"); 
            return false; 
        } 
 
        if (!isValidLoginEmail(emailValue)) { 
            showLoginError(loginEmail, "Please enter a valid email address"); 
            return false; 
        } 
 
        removeLoginError(loginEmail); 
 
        return true; 
    } 
 
 
    // Validate Password 
    function validateLoginPassword() { 
 
        const passwordValue = loginPassword.value.trim(); 
 
        if (passwordValue === "") { 
            showLoginError(loginPassword, "Password is required"); 
            return false; 
        } 
 
        removeLoginError(loginPassword); 
 
        return true; 
    } 
 
 
    // Validate Email Format 
    function isValidLoginEmail(emailValue) { 
 
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; 
 
        return emailPattern.test(emailValue); 
    } 
 
 
    // Show Error 
    function showLoginError(input, message) { 
 
        removeLoginError(input); 
 
        input.style.setProperty("border", "1px solid red", "important"); 
 
        const error = document.createElement("span"); 
 
        error.classList.add("validation-error"); 
        error.textContent = message; 
 
        error.style.color = "red"; 
        error.style.fontSize = "12px"; 
        error.style.marginLeft = "10px"; 
        error.style.display = "block"; 
        error.style.marginTop = "4px"; 
 
        input.parentElement.appendChild(error); 
    } 
 
 
    // Show Backend Error 
    function showLoginBackendError(input, message) { 
 
        removeLoginError(input); 
 
        const error = document.createElement("span"); 
 
        error.classList.add("backend-error"); 
        error.textContent = message; 
 
        error.style.color = "red"; 
        error.style.fontSize = "12px"; 
        error.style.display = "block"; 
        error.style.marginTop = "4px"; 
        error.style.textAlign = "center"; 
 
        input.parentElement.appendChild(error); 
    } 
 
 
    // Show Success 
    function showLoginSuccess(input, message) { 
 
        removeLoginError(input); 
 
        const success = document.createElement("span"); 
 
        success.classList.add("validation-success"); 
        success.textContent = message; 
 
        success.style.color = "green"; 
        success.style.fontSize = "12px"; 
        success.style.display = "block"; 
        success.style.marginTop = "4px"; 
        success.style.textAlign = "center"; 
 
        input.parentElement.appendChild(success); 
    } 
 
 
    // Remove Error 
    function removeLoginError(input) { 
 
        input.style.removeProperty("border"); 
 
        const error = input.parentElement.querySelector(".validation-error"); 
 
        if (error) { 
            error.remove(); 
        } 
 
        const backendError = input.parentElement.querySelector(".backend-error"); 
 
        if (backendError) { 
            backendError.remove(); 
        } 
 
        const success = input.parentElement.querySelector(".validation-success"); 
 
        if (success) { 
            success.remove(); 
        } 
    } 
 
 
    // Send Login Request 
    function sendLoginRequest() { 
 
        const formData = new FormData(loginForm); 
 
        fetch(loginForm.action, { 
            method: "POST", 
            body: formData 
        }) 
        .then(response => response.json()) 
        .then(data => { 
 
            if (data.success) { 
 
                showLoginSuccess(loginPassword, data.message); 
 
                if (data.role === "buyer") {

 
 
                    window.location.href =
 
 
                        "/WebTech-Summer25-26-Group-9/View/Common/Pages/shop.php";

 
 
                }
 
 
                else if (data.role === "admin") { 
 
                    window.location.href = 
                        "/WebTech-Summer25-26-Group-9/View/Admin/Pages/adminDashboardPage.php"; 
 
                } 
                else if (data.role === "seller") { 
 
                    window.location.href = 
                        "/WebTech-Summer25-26-Group-9/View/Seller/Pages/sellerProductPage.php"; 
 
                } 
                else if (data.role === "delivery") { 
 
                    window.location.href = 
                        "/WebTech-Summer25-26-Group-9/View/Delivery/Pages/deliveryDashboardPage.php"; 
 
                } 
 
            } else { 
 
                showLoginBackendError(loginPassword, data.message); 
 
            } 
 
        }) 
        .catch(error => { 
 
            showLoginBackendError( 
                loginPassword, 
                "Something went wrong. Please try again." 
            ); 
 
            console.log(error); 
        }); 
    } 
 
 
    // Email Input Handler 
    function handleLoginEmailInput() { 
 
        const emailValue = loginEmail.value.trim(); 
 
        if (emailValue !== "" && isValidLoginEmail(emailValue)) { 
            removeLoginError(loginEmail); 
        } 
    } 
 
 
    // Password Input Handler 
    function handleLoginPasswordInput() { 
 
        const passwordValue = loginPassword.value.trim(); 
 
        if (passwordValue !== "") { 
            removeLoginError(loginPassword); 
        } 
    } 
 
 
    // Login Button Event 
    loginBtn.addEventListener("click", handleLogin); 
 
 
    // Input Events 
    loginEmail.addEventListener("input", handleLoginEmailInput); 
    loginPassword.addEventListener("input", handleLoginPasswordInput); 
 
} 
 
 
// JS for login ended here 
 
 
// ================================================================ 
 
 
// JS for signUpPage start here 
 
const registerForm = document.querySelector(".register-form"); 
 
if (registerForm) { 
 
    registerForm.noValidate = true; 
 
    const firstName = document.getElementById("firstName"); 
    const lastName = document.getElementById("lastName"); 
    const role = document.getElementById("role"); 
    const registerEmail = document.getElementById("email"); 
    const phone = document.getElementById("phone"); 
    const registerPassword = document.getElementById("password"); 
    const confirmPassword = document.getElementById("confirmPassword"); 
 
 
    // Handle Register 
    function handleRegister(event) { 
 
        event.preventDefault(); 
 
        const firstNameValid = validateFirstName(); 
        const lastNameValid = validateLastName(); 
        const roleValid = validateRole(); 
        const emailValid = validateRegisterEmail(); 
        const phoneValid = validatePhone(); 
        const passwordValid = validateRegisterPassword(); 
        const confirmPasswordValid = validateConfirmPassword(); 
 
        if ( 
            firstNameValid && 
            lastNameValid && 
            roleValid && 
            emailValid && 
            phoneValid && 
            passwordValid && 
            confirmPasswordValid 
        ) { 
            sendRegisterRequest(); 
        } 
    } 
 
 
    // Validate First Name 
    function validateFirstName() { 
 
        if (firstName.value.trim() === "") { 
            showRegisterError(firstName, "First name is required"); 
            return false; 
        } 
 
        removeRegisterError(firstName); 
 
        return true; 
    } 
 
 
    // Validate Last Name 
    function validateLastName() { 
 
        if (lastName.value.trim() === "") { 
            showRegisterError(lastName, "Last name is required"); 
            return false; 
        } 
 
        removeRegisterError(lastName); 
 
        return true; 
    } 
 
 
    // Validate Role 
    function validateRole() { 
 
        if (role.value === "") { 
            showRegisterError(role, "Please select a role"); 
            return false; 
        } 
 
        removeRegisterError(role); 
 
        return true; 
    } 
 
 
    // Validate Email 
    function validateRegisterEmail() { 
 
        const value = registerEmail.value.trim(); 
 
        if (value === "") { 
            showRegisterError(registerEmail, "Email is required"); 
            return false; 
        } 
 
        if (!isValidRegisterEmail(value)) { 
            showRegisterError( 
                registerEmail, 
                "Please enter a valid email address" 
            ); 
 
            return false; 
        } 
 
        removeRegisterError(registerEmail); 
 
        return true; 
    } 
 
 
    // Validate Phone 
    function validatePhone() { 
 
        const value = phone.value.trim(); 
 
        if (value === "") { 
            showRegisterError(phone, "Phone number is required"); 
            return false; 
        } 
 
        if (!isValidPhone(value)) { 
            showRegisterError( 
                phone, 
                "Please enter a valid phone number" 
            ); 
 
            return false; 
        } 
 
        removeRegisterError(phone); 
 
        return true; 
    } 
 
 
    // Validate Password 
    function validateRegisterPassword() { 
 
        const value = registerPassword.value; 
 
        if (value.trim() === "") { 
            showRegisterError( 
                registerPassword, 
                "Password is required" 
            ); 
 
            return false; 
        } 
 
        if (value.length < 8) { 
            showRegisterError( 
                registerPassword, 
                "Password must be at least 8 characters" 
            ); 
 
            return false; 
        } 
 
        removeRegisterError(registerPassword); 
 
        return true; 
    } 
 
 
    // Validate Confirm Password 
    function validateConfirmPassword() { 
 
        const value = confirmPassword.value; 
 
        if (value.trim() === "") { 
            showRegisterError( 
                confirmPassword, 
                "Please confirm your password" 
            ); 
 
            return false; 
        } 
 
        if (value !== registerPassword.value) { 
            showRegisterError( 
                confirmPassword, 
                "Passwords do not match" 
            ); 
 
            return false; 
        } 
 
        removeRegisterError(confirmPassword); 
 
        return true; 
    } 
 
 
    // Validate Email Format 
    function isValidRegisterEmail(value) { 
 
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value); 
    } 
 
 
    // Validate Phone Format 
    function isValidPhone(value) { 
 
        return /^[0-9+\-\s()]{7,20}$/.test(value); 
    } 
 
 
    // Show Error 
    function showRegisterError(input, message) { 
 
        removeRegisterError(input); 
 
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
 
 
    // Remove Error 
    function removeRegisterError(input) { 
 
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
 
 
    // Show Backend Error 
    function showRegisterBackendError(input, message) { 
 
        removeRegisterError(input); 
 
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
    function showRegisterSuccess(input, message) { 
 
        removeRegisterError(input); 
 
        const success = document.createElement("span"); 
 
        success.classList.add("validation-success"); 
        success.textContent = message; 
 
        success.style.color = "green"; 
        success.style.fontSize = "12px"; 
        success.style.display = "block"; 
        success.style.marginTop = "4px"; 
 
        input.parentElement.appendChild(success); 
    } 
 
 
    // Send Register Request 
    function sendRegisterRequest() { 
 
        const formData = new FormData(registerForm); 
 
        fetch(registerForm.action, { 
            method: "POST", 
            body: formData 
        }) 
        .then(response => response.json()) 
        .then(data => { 
 
            if (data.success) { 
 
                showRegisterSuccess( 
                    registerEmail, 
                    data.message 
                ); 
 
                setTimeout(function () { 
                    window.location.href = "loginPage.php"; 
                }, 1000); 
 
            } else { 
 
                showRegisterBackendError( 
                    registerEmail, 
                    data.message 
                ); 
            } 
 
        }) 
        .catch(error => { 
 
            showRegisterBackendError( 
                registerEmail, 
                "Something went wrong. Please try again." 
            ); 
 
            console.log(error); 
        }); 
    } 
 
 
    // Remove Error While Typing 
    firstName.addEventListener("input", function () { 
 
        if (firstName.value.trim() !== "") { 
            removeRegisterError(firstName); 
        } 
    }); 
 
 
    lastName.addEventListener("input", function () { 
 
        if (lastName.value.trim() !== "") { 
            removeRegisterError(lastName); 
        } 
    }); 
 
 
    role.addEventListener("change", function () { 
 
        if (role.value !== "") { 
            removeRegisterError(role); 
        } 
    }); 
 
 
    registerEmail.addEventListener("input", function () { 
 
        if (isValidRegisterEmail(registerEmail.value.trim())) { 
            removeRegisterError(registerEmail); 
        } 
    }); 
 
 
    phone.addEventListener("input", function () { 
 
        if (isValidPhone(phone.value.trim())) { 
            removeRegisterError(phone); 
        } 
    }); 
 
 
    registerPassword.addEventListener("input", function () { 
 
        if (registerPassword.value.length >= 8) { 
            removeRegisterError(registerPassword); 
        } 
 
        if ( 
            confirmPassword.value !== "" && 
            confirmPassword.value === registerPassword.value 
        ) { 
            removeRegisterError(confirmPassword); 
        } 
    }); 
 
 
    confirmPassword.addEventListener("input", function () { 
 
        if ( 
            confirmPassword.value !== "" && 
            confirmPassword.value === registerPassword.value 
        ) { 
            removeRegisterError(confirmPassword); 
        } 
    }); 
 
 
    // Form Submit Event 
    registerForm.addEventListener("submit", handleRegister); 
 
} 
 
 
// JS for signUpPage end here


// ================================================================
// JS for Logout start here
// ================================================================

const logoutButtons = document.querySelectorAll(".logout-btn");

logoutButtons.forEach(function (button) {

    button.addEventListener("click", async function (event) {

        event.preventDefault();

        try {

            const response = await fetch(
                "/WebTech-Summer25-26-Group-9/Controller/AuthController.php?action=logout",
                {
                    method: "POST"
                }
            );


            const data = await response.json();


            if (data.success) {

                window.location.href =
                    "/WebTech-Summer25-26-Group-9/View/Common/Pages/loginPage.php";

            } else {

                alert(data.message);

            }

        } catch (error) {

            console.error("Logout Error:", error);

            alert(
                "Something went wrong. Please try again."
            );

        }

    });

});


// JS for Logout ended here