// JS for edit profile start here

const personalInfoForm = document.querySelector(".personal-info-form");
const changePasswordForm = document.querySelector(".change-password-form");
const deliveryAddressForm = document.querySelector(".delivery-address-form");
const deleteAccountForm = document.querySelector(".delete-account-form");


// Personal Information

if (personalInfoForm) {

    personalInfoForm.noValidate = true;

    const fullName = document.getElementById("full_name");
    const phone = document.getElementById("phone");

    function handlePersonalInfo(event) {

        event.preventDefault();

        const nameValid = validateFullName();
        const phoneValid = validatePhone();

        if (nameValid && phoneValid) {
            updatePersonalInfo();
        }
    }

    function validateFullName() {

        if (fullName.value.trim() === "") {
            showProfileError(fullName, "Full name is required");
            return false;
        }

        removeProfileError(fullName);
        return true;
    }

    function validatePhone() {

        const value = phone.value.trim();

        if (value === "") {
            showProfileError(phone, "Phone number is required");
            return false;
        }

        if (!isValidPhone(value)) {
            showProfileError(phone, "Please enter a valid phone number");
            return false;
        }

        removeProfileError(phone);
        return true;
    }

    function updatePersonalInfo() {

        const formData = new FormData(personalInfoForm);

        fetch(personalInfoForm.action, {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {

            if (data.success) {

                showProfileSuccess(
                    fullName,
                    data.message
                );

            } else {

                showProfileBackendError(
                    fullName,
                    data.message
                );
            }

        })
        .catch(error => {

            showProfileBackendError(
                fullName,
                "Something went wrong. Please try again."
            );

        });
    }

    fullName.addEventListener("input", function () {

        if (fullName.value.trim() !== "") {
            removeProfileError(fullName);
        }
    });

    phone.addEventListener("input", function () {

        if (isValidPhone(phone.value.trim())) {
            removeProfileError(phone);
        }
    });

    personalInfoForm.addEventListener(
        "submit",
        handlePersonalInfo
    );
}


// Change Password

if (changePasswordForm) {

    changePasswordForm.noValidate = true;

    const currentPassword =
        document.getElementById("current_password");

    const newPassword =
        document.getElementById("new_password");

    const confirmPassword =
        document.getElementById("confirm_password");

    function handleChangePassword(event) {

        event.preventDefault();

        const currentValid = validateCurrentPassword();
        const newValid = validateNewPassword();
        const confirmValid = validateConfirmPassword();

        if (
            currentValid &&
            newValid &&
            confirmValid
        ) {
            updatePassword();
        }
    }

    function validateCurrentPassword() {

        if (currentPassword.value.trim() === "") {

            showProfileError(
                currentPassword,
                "Current password is required"
            );

            return false;
        }

        removeProfileError(currentPassword);
        return true;
    }

    function validateNewPassword() {

        if (newPassword.value.trim() === "") {

            showProfileError(
                newPassword,
                "New password is required"
            );

            return false;
        }

        removeProfileError(newPassword);
        return true;
    }

    function validateConfirmPassword() {

        if (confirmPassword.value.trim() === "") {

            showProfileError(
                confirmPassword,
                "Please confirm your new password"
            );

            return false;
        }

        if (confirmPassword.value !== newPassword.value) {

            showProfileError(
                confirmPassword,
                "Passwords do not match"
            );

            return false;
        }

        removeProfileError(confirmPassword);
        return true;
    }

    function updatePassword() {

        const formData =
            new FormData(changePasswordForm);

        fetch(changePasswordForm.action, {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {

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

        })
        .catch(error => {

            showProfileBackendError(
                currentPassword,
                "Something went wrong. Please try again."
            );

        });
    }

    currentPassword.addEventListener("input", function () {

        if (currentPassword.value.trim() !== "") {
            removeProfileError(currentPassword);
        }
    });

    newPassword.addEventListener("input", function () {

        if (newPassword.value.trim() !== "") {
            removeProfileError(newPassword);
        }

        if (
            confirmPassword.value !== "" &&
            confirmPassword.value === newPassword.value
        ) {
            removeProfileError(confirmPassword);
        }
    });

    confirmPassword.addEventListener("input", function () {

        if (
            confirmPassword.value !== "" &&
            confirmPassword.value === newPassword.value
        ) {
            removeProfileError(confirmPassword);
        }
    });

    changePasswordForm.addEventListener(
        "submit",
        handleChangePassword
    );
}


// Delivery Address

if (deliveryAddressForm) {

    deliveryAddressForm.noValidate = true;

    const streetAddress =
        document.getElementById("street_address");

    const areaCity =
        document.getElementById("area_city");

    function handleDeliveryAddress(event) {

        event.preventDefault();

        const streetValid = validateStreetAddress();
        const cityValid = validateAreaCity();

        if (streetValid && cityValid) {
            updateDeliveryAddress();
        }
    }

    function validateStreetAddress() {

        if (streetAddress.value.trim() === "") {

            showProfileError(
                streetAddress,
                "Street address is required"
            );

            return false;
        }

        removeProfileError(streetAddress);
        return true;
    }

    function validateAreaCity() {

        if (areaCity.value.trim() === "") {

            showProfileError(
                areaCity,
                "Area / City is required"
            );

            return false;
        }

        removeProfileError(areaCity);
        return true;
    }

    function updateDeliveryAddress() {

        const formData =
            new FormData(deliveryAddressForm);

        fetch(deliveryAddressForm.action, {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {

            if (data.success) {

                showProfileSuccess(
                    streetAddress,
                    data.message
                );

            } else {

                showProfileBackendError(
                    streetAddress,
                    data.message
                );
            }

        })
        .catch(error => {

            showProfileBackendError(
                streetAddress,
                "Something went wrong. Please try again."
            );

        });
    }

    streetAddress.addEventListener("input", function () {

        if (streetAddress.value.trim() !== "") {
            removeProfileError(streetAddress);
        }
    });

    areaCity.addEventListener("input", function () {

        if (areaCity.value.trim() !== "") {
            removeProfileError(areaCity);
        }
    });

    deliveryAddressForm.addEventListener(
        "submit",
        handleDeliveryAddress
    );
}


// Delete Account

if (deleteAccountForm) {

    deleteAccountForm.noValidate = true;

    const deleteConfirmation =
        document.getElementById("delete_confirmation");

    function handleDeleteAccount(event) {

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

        removeProfileError(deleteConfirmation);

        deleteAccount();
    }

    function deleteAccount() {

        const formData =
            new FormData(deleteAccountForm);

        fetch(deleteAccountForm.action, {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {

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

        })
        .catch(error => {

            showProfileBackendError(
                deleteConfirmation,
                "Something went wrong. Please try again."
            );

        });
    }

    deleteConfirmation.addEventListener("input", function () {

        if (
            deleteConfirmation.value.trim() === "DELETE"
        ) {
            removeProfileError(deleteConfirmation);
        }
    });

    deleteAccountForm.addEventListener(
        "submit",
        handleDeleteAccount
    );
}


// Phone Validation

function isValidPhone(value) {

    return /^[0-9+\-\s()]{7,20}$/.test(value);
}


// Get Error Parent

function getProfileMessageParent(input) {

    const wrapper =
        input.closest(".input-icon-wrapper");

    if (wrapper) {
        return wrapper.parentElement;
    }

    return input.parentElement;
}


// Show Validation Error

function showProfileError(input, message) {

    removeProfileError(input);

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

    const parent =
        getProfileMessageParent(input);

    parent.appendChild(error);
}


// Show Backend Error

function showProfileBackendError(input, message) {

    removeProfileError(input);

    const error = document.createElement("span");

    error.classList.add("backend-error");
    error.textContent = message;

    error.style.color = "red";
    error.style.fontSize = "12px";
    error.style.display = "block";
    error.style.marginTop = "4px";

    const parent =
        getProfileMessageParent(input);

    parent.appendChild(error);
}


// Show Success

function showProfileSuccess(input, message) {

    removeProfileError(input);

    const success = document.createElement("span");

    success.classList.add("validation-success");
    success.textContent = message;

    success.style.color = "green";
    success.style.fontSize = "12px";
    success.style.display = "block";
    success.style.marginTop = "4px";

    const parent =
        getProfileMessageParent(input);

    parent.appendChild(success);
}


// Remove Error

function removeProfileError(input) {

    input.style.removeProperty("border");

    const parent =
        getProfileMessageParent(input);

    const error =
        parent.querySelector(".validation-error");

    if (error) {
        error.remove();
    }

    const backendError =
        parent.querySelector(".backend-error");

    if (backendError) {
        backendError.remove();
    }

    const success =
        parent.querySelector(".validation-success");

    if (success) {
        success.remove();
    }
}


// JS for edit profile end here
