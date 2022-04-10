<?php
 session_start();
 if(isset($_SESSION['unique_id'])){
     header("location: users.php");
 }
?>
<?php
include_once"header.php";
?>
<body class="bodybg">
    <div class="wrapper">
        <section class="form signup">
            <header><i class="fa-solid fa-user-plus me-2"></i>Registration</header>
            <form action="#"enctype="multipart/form-data" autocomplete="off">
                <div class="error-text"></div>
                <div class="name-details">
                    <div class="field input">
                        <label>First Name</label>
                        <input type="text" name="fname" placeholder="name" required>
                    </div>
                    <div class="field input">
                        <label>Last Name</label>
                        <input type="text" name="lname" placeholder="surname" required>
                    </div>
                </div>
                    <div class="field input">
                        <label>Email ID</label>
                        <input type="text"name="email" placeholder="email" required>
                    </div>
                    <div class="field input">
                        <label>Password</label>
                        <input type="password"name="password" placeholder="enter your password" required>
                        <i class="fa-solid fa-eye"></i>
                    </div>
                    <div class="field input">
                        <label>Date of Birth</label>
                        <input type="date" name="dob" required>
                    </div>
                    <div class="field image">
                        <label>Select your Profile picture</label>
                        <input type="file" name="image" required>
                    </div>
                    <div class="field button">
                        <input type="submit"value="Register">
                    </div>
            </form>
            <div class="link">Already an User ? <a href="login.php">Login now</a></div>
        </section>
    </div>

    <script src="javascript/pass-show-hide.js"></script>
    <script src="javascript/signup.js"></script>
</body>
</html>