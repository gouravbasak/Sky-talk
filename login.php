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
        <section class="form login">
            <header><i class="fa-solid fa-user-check me-2"></i>LOG IN</header>
            <form action="#">
                <div class="error-text"></div>
                    <div class="field input">
                        <label>Email ID</label>
                        <input type="text" name="email" placeholder="email">
                    </div>
                    <div class="field input">
                        <label>Password</label>
                        <input type="password" name = "password" placeholder="enter your password">
                        <i class="fa-solid fa-eye"></i>
                    </div>
                    <div class="field button">
                        <input type="submit"value="Login">
                    </div>
            </form>
            <div class="link">Don't have an account ? <a href="index.php">Register now</a></div>
        </section>
    </div>

    <script src="javascript/pass-show-hide.js"></script>
    <script src="javascript/login.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>