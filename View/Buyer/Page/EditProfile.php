<?php
include "../../../Controller/SessionCheck.php";
include "../../../Model/Database.php";
include "../../../Controller/ProfileValidation.php";
?>

<!DOCTYPE html>
<html lang="en-US">

    <head>

        <title>MiniMart - Edit Profile</title>

        <link rel="stylesheet" href="../Design/EditProfile.css">

        <script>

            function validate_profile()
            {
                let first_name=document.getElementById("first_name").value.trim();
                let last_name=document.getElementById("last_name").value.trim();
                let phone=document.getElementById("phone").value.trim();

                let valid=true;
                let message="";

                if(first_name.length<2)
                {
                    message+="First Name Must be at least 2 Char\n";
                    valid=false;
                }

                if(last_name.length<2)
                {
                    message+="Last Name Must be at least 2 Char\n";
                    valid=false;
                }

                if(phone.length<7)
                {
                    message+="Phone Number Must be at least 7 Char";
                    valid=false;
                }

                if(!valid)
                {
                    alert(message);
                }

                return valid;
            }


            function validate_password()
            {
                let current_password=document.getElementById("current_password").value.trim();
                let new_password=document.getElementById("new_password").value.trim();
                let confirm_password=document.getElementById("confirm_password").value.trim();

                let valid=true;
                let message="";

                if(current_password.length<5)
                {
                    message+="Current Password Must be at least 5 Char\n";
                    valid=false;
                }

                if(new_password.length<5)
                {
                    message+="New Password Must be at least 5 Char\n";
                    valid=false;
                }

                if(new_password!=confirm_password)
                {
                    message+="New Password and Confirm Password Must Match";
                    valid=false;
                }

                if(!valid)
                {
                    alert(message);
                }

                return valid;
            }


            function validate_delete()
            {
                let delete_confirmation=document.getElementById("delete_confirmation").value.trim();

                if(delete_confirmation!="DELETE")
                {
                    alert("Type DELETE to Confirm");
                    return false;
                }

                return true;
            }

        </script>

    </head>


    <body>


        <div class="page-header-section">

            <p class="section-subtitle">
                MY ACCOUNT
            </p>

            <h1 class="page-title">
                Edit Profile
            </h1>

        </div>


        <div class="forms-container">


            <div class="profileBox">

                <div class="box-header">
                    Personal Information
                </div>

                <div class="box-body">

                    <form method="post" action="" onsubmit="return validate_profile()">

                        <div class="form-group">

                            <label for="first_name">
                                FIRST NAME
                            </label>

                            <input
                                type="text"
                                id="first_name"
                                name="first_name"
                                class="form-control"
                                value="<?php echo $first_name; ?>"
                            >

                        </div>


                        <div class="form-group">

                            <label for="last_name">
                                LAST NAME
                            </label>

                            <input
                                type="text"
                                id="last_name"
                                name="last_name"
                                class="form-control"
                                value="<?php echo $last_name; ?>"
                            >

                        </div>


                        <div class="form-group">

                            <label for="phone">
                                PHONE NUMBER
                            </label>

                            <input
                                type="text"
                                id="phone"
                                name="phone"
                                class="form-control"
                                value="<?php echo $phone; ?>"
                            >

                        </div>


                        <input
                            type="submit"
                            name="save_profile"
                            class="btn-dark"
                            value="SAVE"
                        >


                        <p class="validationMessage">
                            <?php echo $profile_message; ?>
                        </p>

                    </form>

                </div>

            </div>


            <div class="profileBox">

                <div class="box-header">
                    Change Password
                </div>

                <div class="box-body">

                    <form method="post" action="" onsubmit="return validate_password()">

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


                        <input
                            type="submit"
                            name="change_password"
                            class="btn-dark"
                            value="UPDATE PASSWORD"
                        >


                        <p class="validationMessage">
                            <?php echo $password_message; ?>
                        </p>

                    </form>

                </div>

            </div>


            <div class="profileBox dangerBox">

                <div class="box-header dangerHeader">
                    Delete Account
                </div>

                <div class="box-body">

                    <form method="post" action="" onsubmit="return validate_delete()">

                        <p class="danger-text">
                            Permanently remove your account and all data.
                            Type DELETE to confirm.
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


                        <input
                            type="submit"
                            name="delete_account"
                            class="btn-danger"
                            value="DELETE MY ACCOUNT"
                        >


                        <p class="validationMessage">
                            <?php echo $delete_message; ?>
                        </p>

                    </form>

                </div>

            </div>


            <p class="backText">
                <a href="BuyerDashboard.php">Back to Buyer Dashboard</a>
            </p>

        </div>

    </body>
</html>
