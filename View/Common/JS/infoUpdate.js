// ============================================================
// JS FOR EDIT PROFILE
// ============================================================

const UPDATE_INFO_URL =
    "/WebTech-Summer25-26-Group-9/Controller/UpdateInfoController.php";


// ============================================================
// PERSONAL INFORMATION
// ============================================================

const personalInfoForm =
    document.querySelector(".personal-info-form");


if (personalInfoForm) {

    personalInfoForm.noValidate = true;


    const firstName =
        document.getElementById("first_name");

    const lastName =
        document.getElementById("last_name");

    const phone =
        document.getElementById("phone");


    // ========================================================
    // Validate First Name
    // ========================================================

    function validateFirstName() {

        if (firstName.value.trim() === "") {

            showProfileError(
                firstName,
                "First name is required"
            );

            return false;
        }

        removeProfileError(firstName);

        return true;
    }


    // ========================================================
    // Validate Last Name
    // ========================================================

    function validateLastName() {

        if (lastName.value.trim() === "") {

            showProfileError(
                lastName,
                "Last name is required"
            );

            return false;
        }

        removeProfileError(lastName);

        return true;
    }


    // ========================================================
    // Validate Phone
    // ========================================================

    function validatePhone() {

        const value =
            phone.value.trim();


        if (value === "") {

            showProfileError(
                phone,
                "Phone number is required"
            );

            return false;
        }


        if (!isValidPhone(value)) {

            showProfileError(
                phone,
                "Please enter a valid phone number"
            );

            return false;
        }


        removeProfileError(phone);

        return true;
    }


    // ========================================================
    // PERSONAL INFORMATION SUBMIT
    // ========================================================

    personalInfoForm.addEventListener(
        "submit",
        async function (event) {

            event.preventDefault();


            const firstNameValid =
                validateFirstName();

            const lastNameValid =
                validateLastName();

            const phoneValid =
                validatePhone();


            if (
                !firstNameValid ||
                !lastNameValid ||
                !phoneValid
            ) {

                return;
            }


            const formData =
                new FormData(personalInfoForm);


            try {

                const response =
                    await fetch(
                        UPDATE_INFO_URL,
                        {
                            method: "POST",
                            body: formData
                        }
                    );


                const text =
                    await response.text();


                console.log(
                    "Personal Information Server Response:",
                    text
                );


                let data;


                try {

                    data =
                        JSON.parse(text);

                } catch (error) {

                    console.error(
                        "Invalid JSON from server:",
                        text
                    );


                    showProfileBackendError(
                        firstName,
                        "Server returned an invalid response."
                    );

                    return;
                }


                console.log(
                    "Personal Information Response:",
                    data
                );


                if (data.success) {

                    showProfileSuccess(
                        firstName,
                        data.message
                    );

                } else {

                    showProfileBackendError(
                        firstName,
                        data.message
                    );
                }


            } catch (error) {

                console.error(
                    "Personal Information Error:",
                    error
                );


                showProfileBackendError(
                    firstName,
                    "Something went wrong. Please try again."
                );
            }

        }
    );


    // ========================================================
    // FIRST NAME INPUT
    // ========================================================

    firstName.addEventListener(
        "input",
        function () {

            if (
                firstName.value.trim() !== ""
            ) {

                removeProfileError(firstName);
            }

        }
    );


    // ========================================================
    // LAST NAME INPUT
    // ========================================================

    lastName.addEventListener(
        "input",
        function () {

            if (
                lastName.value.trim() !== ""
            ) {

                removeProfileError(lastName);
            }

        }
    );


    // ========================================================
    // PHONE INPUT
    // ========================================================

    phone.addEventListener(
        "input",
        function () {

            if (
                isValidPhone(
                    phone.value.trim()
                )
            ) {

                removeProfileError(phone);
            }

        }
    );

}



// ============================================================
// CHANGE PASSWORD
// ============================================================

const changePasswordForm =
    document.querySelector(
        ".change-password-form"
    );


if (changePasswordForm) {

    changePasswordForm.noValidate = true;


    const currentPassword =
        document.getElementById(
            "current_password"
        );


    const newPassword =
        document.getElementById(
            "new_password"
        );


    const confirmPassword =
        document.getElementById(
            "confirm_password"
        );


    // ========================================================
    // Validate Current Password
    // ========================================================

    function validateCurrentPassword() {

        if (
            currentPassword.value.trim() === ""
        ) {

            showProfileError(
                currentPassword,
                "Current password is required"
            );

            return false;
        }


        removeProfileError(
            currentPassword
        );

        return true;
    }


    // ========================================================
    // Validate New Password
    // ========================================================

    function validateNewPassword() {

        if (
            newPassword.value.trim() === ""
        ) {

            showProfileError(
                newPassword,
                "New password is required"
            );

            return false;
        }


        removeProfileError(
            newPassword
        );

        return true;
    }


    // ========================================================
    // Validate Confirm Password
    // ========================================================

    function validateConfirmPassword() {

        if (
            confirmPassword.value.trim() === ""
        ) {

            showProfileError(
                confirmPassword,
                "Please confirm your new password"
            );

            return false;
        }


        if (
            confirmPassword.value !==
            newPassword.value
        ) {

            showProfileError(
                confirmPassword,
                "Passwords do not match"
            );

            return false;
        }


        removeProfileError(
            confirmPassword
        );

        return true;
    }


    // ========================================================
    // CHANGE PASSWORD SUBMIT
    // ========================================================

    changePasswordForm.addEventListener(
        "submit",
        async function (event) {

            event.preventDefault();


            const currentValid =
                validateCurrentPassword();

            const newValid =
                validateNewPassword();

            const confirmValid =
                validateConfirmPassword();


            if (
                !currentValid ||
                !newValid ||
                !confirmValid
            ) {

                return;
            }


            const formData =
                new FormData(
                    changePasswordForm
                );


            try {

                const response =
                    await fetch(
                        UPDATE_INFO_URL,
                        {
                            method: "POST",
                            body: formData
                        }
                    );


                const text =
                    await response.text();


                console.log(
                    "Password Server Response:",
                    text
                );


                let data;


                try {

                    data =
                        JSON.parse(text);

                } catch (error) {

                    console.error(
                        "Invalid JSON:",
                        text
                    );


                    showProfileBackendError(
                        currentPassword,
                        "Server returned an invalid response."
                    );

                    return;
                }


                if (data.success) {

                    showProfileSuccess(
                        newPassword,
                        data.message
                    );


                    changePasswordForm.reset();

                } else {

                    showProfileBackendError(
                        currentPassword,
                        data.message
                    );
                }


            } catch (error) {

                console.error(
                    "Password Error:",
                    error
                );


                showProfileBackendError(
                    currentPassword,
                    "Something went wrong. Please try again."
                );
            }

        }
    );


    // ========================================================
    // CURRENT PASSWORD INPUT
    // ========================================================

    currentPassword.addEventListener(
        "input",
        function () {

            if (
                currentPassword.value.trim() !== ""
            ) {

                removeProfileError(
                    currentPassword
                );
            }

        }
    );


    // ========================================================
    // NEW PASSWORD INPUT
    // ========================================================

    newPassword.addEventListener(
        "input",
        function () {

            if (
                newPassword.value.trim() !== ""
            ) {

                removeProfileError(
                    newPassword
                );
            }


            if (
                confirmPassword.value !== "" &&
                confirmPassword.value ===
                newPassword.value
            ) {

                removeProfileError(
                    confirmPassword
                );
            }

        }
    );


    // ========================================================
    // CONFIRM PASSWORD INPUT
    // ========================================================

    confirmPassword.addEventListener(
        "input",
        function () {

            if (
                confirmPassword.value !== "" &&
                confirmPassword.value ===
                newPassword.value
            ) {

                removeProfileError(
                    confirmPassword
                );
            }

        }
    );

}



// ============================================================
// DELETE ACCOUNT
// ============================================================

const deleteAccountForm =
    document.querySelector(
        ".delete-account-form"
    );


if (deleteAccountForm) {

    deleteAccountForm.noValidate = true;


    const deleteConfirmation =
        document.getElementById(
            "delete_confirmation"
        );


    // ========================================================
    // DELETE SUBMIT
    // ========================================================

    deleteAccountForm.addEventListener(
        "submit",
        async function (event) {

            event.preventDefault();


            const value =
                deleteConfirmation.value.trim();


            if (value === "") {

                showProfileError(
                    deleteConfirmation,
                    "Please type DELETE to confirm"
                );

                return;
            }


            if (value !== "DELETE") {

                showProfileError(
                    deleteConfirmation,
                    "Please type DELETE exactly"
                );

                return;
            }


            removeProfileError(
                deleteConfirmation
            );


            const formData =
                new FormData(
                    deleteAccountForm
                );


            try {

                const response =
                    await fetch(
                        UPDATE_INFO_URL,
                        {
                            method: "POST",
                            body: formData
                        }
                    );


                const text =
                    await response.text();


                console.log(
                    "Delete Server Response:",
                    text
                );


                let data;


                try {

                    data =
                        JSON.parse(text);

                } catch (error) {

                    console.error(
                        "Invalid JSON:",
                        text
                    );


                    showProfileBackendError(
                        deleteConfirmation,
                        "Server returned an invalid response."
                    );

                    return;
                }


                if (data.success) {

                    showProfileSuccess(
                        deleteConfirmation,
                        data.message
                    );


                    deleteAccountForm.reset();

                } else {

                    showProfileBackendError(
                        deleteConfirmation,
                        data.message
                    );
                }


            } catch (error) {

                console.error(
                    "Delete Error:",
                    error
                );


                showProfileBackendError(
                    deleteConfirmation,
                    "Something went wrong. Please try again."
                );
            }

        }
    );


    // ========================================================
    // DELETE INPUT
    // ========================================================

    deleteConfirmation.addEventListener(
        "input",
        function () {

            if (
                deleteConfirmation.value.trim() ===
                "DELETE"
            ) {

                removeProfileError(
                    deleteConfirmation
                );
            }

        }
    );

}



// ============================================================
// PHONE VALIDATION
// ============================================================

function isValidPhone(value) {

    return /^[0-9+\-\s()]{7,20}$/.test(
        value
    );
}



// ============================================================
// GET MESSAGE PARENT
// ============================================================

function getProfileMessageParent(input) {

    return input.closest(
        ".form-group"
    );
}



// ============================================================
// SHOW ERROR
// ============================================================

function showProfileError(
    input,
    message
) {

    removeProfileError(input);


    input.style.setProperty(
        "border",
        "1px solid red",
        "important"
    );


    const error =
        document.createElement("span");


    error.className =
        "validation-error";


    error.textContent =
        message;


    error.style.color =
        "red";


    error.style.fontSize =
        "12px";


    error.style.display =
        "block";


    error.style.marginTop =
        "4px";


    const parent =
        getProfileMessageParent(input);


    if (parent) {

        parent.appendChild(error);
    }
}



// ============================================================
// SHOW BACKEND ERROR
// ============================================================

function showProfileBackendError(
    input,
    message
) {

    removeProfileError(input);


    input.style.setProperty(
        "border",
        "1px solid red",
        "important"
    );


    const error =
        document.createElement("span");


    error.className =
        "backend-error";


    error.textContent =
        message;


    error.style.color =
        "red";


    error.style.fontSize =
        "12px";


    error.style.display =
        "block";


    error.style.marginTop =
        "4px";


    const parent =
        getProfileMessageParent(input);


    if (parent) {

        parent.appendChild(error);
    }
}



// ============================================================
// SHOW SUCCESS
// ============================================================

function showProfileSuccess(
    input,
    message
) {

    removeProfileError(input);


    input.style.setProperty(
        "border",
        "1px solid green",
        "important"
    );


    const success =
        document.createElement("span");


    success.className =
        "validation-success";


    success.textContent =
        message;


    success.style.color =
        "green";


    success.style.fontSize =
        "12px";


    success.style.display =
        "block";


    success.style.marginTop =
        "4px";


    const parent =
        getProfileMessageParent(input);


    if (parent) {

        parent.appendChild(success);
    }
}



// ============================================================
// REMOVE ERROR / SUCCESS
// ============================================================

function removeProfileError(input) {

    if (!input) {
        return;
    }


    input.style.removeProperty(
        "border"
    );


    const parent =
        getProfileMessageParent(input);


    if (!parent) {
        return;
    }


    const messages =
        parent.querySelectorAll(
            ".validation-error, " +
            ".backend-error, " +
            ".validation-success"
        );


    messages.forEach(
        message => message.remove()
    );
}
