<?php include '../../Layouts/header.php'; ?>

<!-- Page Title Area -->
<div class="page-header-section">
    <p class="section-subtitle">MY ACCOUNT</p>
    <h1 class="page-title">Edit Profile</h1>
</div>

<!-- Forms Area -->
<div class="forms-container">

    <!-- 1. Personal Information -->
    <div class="card">
        <div class="card-header">
            <i class="far fa-user"></i> Personal Information
        </div>

        <div class="card-body">
            <form action="" method="">

                <div class="form-group">
                    <label for="full_name">FULL NAME</label>
                    <input
                        type="text"
                        id="full_name"
                        name="full_name"
                        class="form-control"
                        value="Ayaan Rahman"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="email">EMAIL ADDRESS</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="form-control"
                        value="ayaan@example.com"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="phone">PHONE NUMBER</label>
                    <input
                        type="text"
                        id="phone"
                        name="phone"
                        class="form-control"
                        value="+880 1711-234567"
                        required
                    >
                </div>

                <button type="submit" class="btn btn-dark">
                    SAVE
                </button>

            </form>
        </div>
    </div>


    <!-- 2. Change Password -->
    <div class="card">
        <div class="card-header">
            <i class="fas fa-unlock-alt"></i> Change Password
        </div>

        <div class="card-body">
            <form action="" method="">

                <div class="form-group">
                    <label for="current_password">CURRENT PASSWORD</label>

                    <div class="input-icon-wrapper">
                        <input
                            type="password"
                            id="current_password"
                            name="current_password"
                            class="form-control"
                            required
                        >

                        <i class="far fa-eye"></i>
                    </div>
                </div>

                <div class="form-group">
                    <label for="new_password">NEW PASSWORD</label>

                    <div class="input-icon-wrapper">
                        <input
                            type="password"
                            id="new_password"
                            name="new_password"
                            class="form-control"
                            required
                        >

                        <i class="far fa-eye"></i>
                    </div>
                </div>

                <div class="form-group">
                    <label for="confirm_password">CONFIRM NEW PASSWORD</label>

                    <div class="input-icon-wrapper">
                        <input
                            type="password"
                            id="confirm_password"
                            name="confirm_password"
                            class="form-control"
                            required
                        >

                        <i class="far fa-eye"></i>
                    </div>
                </div>

                <button type="submit" class="btn btn-dark">
                    UPDATE PASSWORD
                </button>

            </form>
        </div>
    </div>


    <!-- 3. Delivery Address -->
    <div class="card">
        <div class="card-header">
            <i class="fas fa-map-marker-alt"></i> Delivery Address
        </div>

        <div class="card-body">
            <form action="" method="">

                <div class="form-group">
                    <label for="street_address">STREET ADDRESS</label>

                    <input
                        type="text"
                        id="street_address"
                        name="street_address"
                        class="form-control"
                        value="House 12, Road 5, Dhanmondi"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="area_city">AREA / CITY</label>

                    <input
                        type="text"
                        id="area_city"
                        name="area_city"
                        class="form-control"
                        value="Dhaka 1205"
                        required
                    >
                </div>

                <button type="submit" class="btn btn-dark">
                    SAVE ADDRESS
                </button>

            </form>
        </div>
    </div>


    <!-- 4. Delete Account -->
    <div class="card card-danger">
        <div class="card-header">
            <i class="far fa-trash-alt"></i> Delete Account
        </div>

        <div class="card-body">
            <form action="" method="">

                <p class="danger-text">
                    Permanently remove your account and all data.
                    Type <strong>DELETE</strong> to confirm.
                </p>

                <div class="form-group">
                    <label for="delete_confirmation"></label>

                    <input
                        type="text"
                        id="delete_confirmation"
                        name="delete_confirmation"
                        class="form-control"
                        placeholder="Type DELETE"
                        required
                    >
                </div>

                <button type="submit" class="btn btn-danger">
                    DELETE MY ACCOUNT
                </button>

            </form>
        </div>
    </div>

</div>