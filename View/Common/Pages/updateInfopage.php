<?php include __DIR__ . '/../../Layouts/header.php'; ?>


<!-- Page Title Area -->

<div class="page-header-section">

    <p class="section-subtitle">
        MY ACCOUNT
    </p>

    <h1 class="page-title">
        Edit Profile
    </h1>

</div>



<!-- Forms Area -->

<div class="forms-container">


    <!-- ======================================================
         Personal Information
         ====================================================== -->

    <div class="card">

        <div class="card-header">

            <i class="far fa-user"></i>
            Personal Information

        </div>


        <div class="card-body">

            <form
                action="/WebTech-Summer25-26-Group-9/Controller/UpdateInfoController.php"
                method="POST"
                class="personal-info-form"
            >

                <input
                    type="hidden"
                    name="action"
                    value="update_personal_info"
                >


                <!-- First Name -->

                <div class="form-group">

                    <label for="first_name">
                        FIRST NAME
                    </label>

                    <input
                        type="text"
                        id="first_name"
                        name="first_name"
                        class="form-control"
                        value="<?= htmlspecialchars($user['first_name'] ?? '') ?>"
                    >

                </div>


                <!-- Last Name -->

                <div class="form-group">

                    <label for="last_name">
                        LAST NAME
                    </label>

                    <input
                        type="text"
                        id="last_name"
                        name="last_name"
                        class="form-control"
                        value="<?= htmlspecialchars($user['last_name'] ?? '') ?>"
                    >

                </div>


                <!-- Phone -->

                <div class="form-group">

                    <label for="phone">
                        PHONE NUMBER
                    </label>

                    <input
                        type="text"
                        id="phone"
                        name="phone"
                        class="form-control"
                        value="<?= htmlspecialchars($user['phone'] ?? '') ?>"
                    >

                </div>


                <button
                    type="submit"
                    class="btn btn-dark"
                >
                    SAVE
                </button>

            </form>

        </div>

    </div>



    <!-- ======================================================
         Change Password
         ====================================================== -->

    <div class="card">

        <div class="card-header">

            <i class="fas fa-unlock-alt"></i>
            Change Password

        </div>


        <div class="card-body">

            <form
                action="/WebTech-Summer25-26-Group-9/Controller/UpdateInfoController.php"
                method="POST"
                class="change-password-form"
            >

                <input
                    type="hidden"
                    name="action"
                    value="update_password"
                >


                <!-- Current Password -->

                <div class="form-group">

                    <label for="current_password">
                        CURRENT PASSWORD
                    </label>

                    <input
                        type="password"
                        id="current_password"
                        name="current_password"
                        class="form-control"
                    >

                </div>


                <!-- New Password -->

                <div class="form-group">

                    <label for="new_password">
                        NEW PASSWORD
                    </label>

                    <input
                        type="password"
                        id="new_password"
                        name="new_password"
                        class="form-control"
                    >

                </div>


                <!-- Confirm Password -->

                <div class="form-group">

                    <label for="confirm_password">
                        CONFIRM NEW PASSWORD
                    </label>

                    <input
                        type="password"
                        id="confirm_password"
                        name="confirm_password"
                        class="form-control"
                    >

                </div>


                <button
                    type="submit"
                    class="btn btn-dark"
                >
                    UPDATE PASSWORD
                </button>

            </form>

        </div>

    </div>



    <!-- ======================================================
         Delete Account
         ====================================================== -->

    <div class="card card-danger">

        <div class="card-header">

            <i class="far fa-trash-alt"></i>
            Delete Account

        </div>


        <div class="card-body">

            <form
                action="/WebTech-Summer25-26-Group-9/Controller/UpdateInfoController.php"
                method="POST"
                class="delete-account-form"
            >

                <input
                    type="hidden"
                    name="action"
                    value="delete_account"
                >


                <p class="danger-text">

                    Permanently remove your account
                    and all data.

                    Type
                    <strong>DELETE</strong>
                    to confirm.

                </p>


                <div class="form-group">

                    <input
                        type="text"
                        id="delete_confirmation"
                        name="delete_confirmation"
                        class="form-control"
                        placeholder="Type DELETE"
                    >

                </div>


                <button
                    type="submit"
                    class="btn btn-danger"
                >
                    DELETE MY ACCOUNT
                </button>

            </form>

        </div>

    </div>

</div>



<!-- JavaScript -->

<script src="/WebTech-Summer25-26-Group-9/View/Common/JS/infoUpdate.js"></script>